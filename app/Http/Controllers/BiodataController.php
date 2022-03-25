<?php

namespace App\Http\Controllers;
use DB;
use App\User;
use App\Biodata;
use App\Tenant;
use Illuminate\Http\Request;

class BiodataController extends Controller
{
    public function profile($token)
    {
        $profile = DB::table('users')
                    ->leftJoin('biodatas', 'biodatas.user_id', '=', 'users.id')
                    ->where('users.token', $token)
                    ->select('users.salutation', 'users.lastname', 'users.middlename', 'users.firstname', 'users.role', 'users.mobile_phone', 'users.email', 'biodatas.*')
                    ->first();
        return response()->json($profile);
    }
    public function getProfile($id)
    {
        $profile = DB::table('users')
                    ->leftJoin('biodatas', 'biodatas.user_id', '=', 'users.id')
                    ->where('users.id', $id)
                    ->select('users.salutation', 'users.lastname', 'users.middlename', 'users.firstname', 'users.role', 'users.mobile_phone', 'users.email', 'biodatas.*')
                    ->first();
        return response()->json($profile);
    }
    public function tenantProfile($token)
    {
        $user = User::where('token', $token)->first();
        $profile = DB::table('users')
                    ->leftJoin('biodatas', 'biodatas.user_id', '=', 'users.id')
                    ->leftJoin('tenants', 'tenants.user_id', '=', 'users.id')
                    ->where('users.id', $user->id)
                    ->select('users.salutation', 'users.lastname', 'users.middlename', 'users.firstname', 'users.mobile_phone', 'users.email', 'biodatas.*', 
                    'tenants.third_party_name', 'third_party_phone', 'third_party_email', 'third_party_whatsapp')
                    ->first();
        return response()->json($profile);
    }
    public function tenantLandlord($id)
    {
        $profile = DB::table('users')
                    ->leftJoin('tenants', 'tenants.user_id', '=', 'users.id')
                    ->where('users.id', $id)
                    ->select('tenants.landlord_user_id')
                    ->first();
        $landlord = DB::table('users')
                        ->leftJoin('properties', 'properties.user_id', '=', 'users.id')
                        ->where('users.id', $profile->landlord_user_id)
                        ->select('users.salutation', 'users.lastname', 'users.middlename', 'users.firstname', 'users.mobile_phone', 'users.email', 'properties.*')
                        ->first();
        return response()->json($landlord);
    }
    public function updateProfile(Request $request, $token)
    {
        $this->validate($request, [
            'date_of_birth' => 'required|date',
            'firstname' => 'required|string',
            'gender' => 'required',
            'lastname' => 'required|string',
            'marital_status' =>  'required',
            'middlename' => 'required|string',
            'mobile_phone' => 'required|string|max:11',
            'nationality' => 'required|string',
            'occupation' => 'required|string',
            'phone_number_whatsapp' => 'required|string',
            'religion' => 'required|string',
            'salutation' => 'required',
            'date_moved_in' => 'required|date',
            'are_you_a_resident' => 'required',
            'next_of_kin' => 'required|string',
            'relationship_with_next_of_kin' => 'required|string',
            'next_of_kin_phone_number' => 'required|string|max:11',
        ]);
        
        $user = User::where('token', $token)->first();
        if ($user->role == 2) {
            User::where('token', $token)->update([
                'status' => true
            ]);
        }
        $data = [
            'lastname' => $request->lastname,
            'middlename' => $request->middlename,
            'firstname' => $request->firstname,
            'mobile_phone' => $request->mobile_phone,
            'salutation' => $request->salutation,
        ];
        User::where('token', $token)->update($data);
        if (isset($request->password)) {
            User::where('token', $token)->update([
                'password' => bcrypt($request->password),
                'status' => true
            ]);
        }
        $data = [
            'date_of_birth' => $request->date_of_birth,
            'gender' => $request->gender,
            'marital_status' => $request->marital_status,
            'nationality' => $request->nationality,
            'occupation' => $request->occupation,
            'phone_number_home' => $request->phone_number_home,
            'phone_number_whatsapp' => $request->phone_number_whatsapp,
            'religion' => $request->religion,
            'date_moved_in' => $request->date_moved_in,
            'are_you_a_resident' => $request->are_you_a_resident,
            'next_of_kin' => $request->next_of_kin,
            'relationship_with_next_of_kin' => $request->relationship_with_next_of_kin,
            'next_of_kin_phone_number' => $request->next_of_kin_phone_number
        ];
        Biodata::where('user_id', $user->id)->update($data);
        if (isset($request->third_party_name) || isset($request->third_party_email) || isset($request->third_party_phone) || isset($request->third_party_whatsapp)) {
            $data = [
                'third_party_name' => $request->third_party_name,
                'third_party_email' => $request->third_party_email,
                'third_party_phone' => $request->third_party_phone,
                'third_party_whatsapp' => $request->third_party_whatsapp
            ];
            Tenant::where('user_id', $user->id)->update($data);
        }
    }
}
