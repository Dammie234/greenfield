<?php

namespace App\Http\Controllers;
use DB;
use App\User;
use App\Biodata;
use App\Tenant;
use App\MonthlyPayment;
use App\OneOffPayment;
use App\Apartment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TenantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($token)
    {
        $user = User::where('token', $token)->first();
        $tenants = DB::table('tenants')
                    ->leftJoin('users', 'users.id', '=', 'tenants.user_id')
                    ->where('tenants.landlord_user_id', $user->id)
                    ->select('users.salutation', 'users.lastname', 'users.firstname', 'users.mobile_phone', 'users.email', 'tenants.*')
                    ->get();
        return response()->json($tenants);
    }
    public function tenants($id)
    {
        $tenants = DB::table('tenants')
                    ->leftJoin('users', 'users.id', '=', 'tenants.user_id')
                    ->where('tenants.landlord_user_id', $id)
                    ->select('users.salutation', 'users.lastname', 'users.firstname', 'users.mobile_phone', 'users.email', 'tenants.*')
                    ->get();
        return response()->json($tenants);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'salutation' =>'required',
            'lastname' => 'required|string',
            'firstname' => 'required|string',
            'mobile_phone' => 'required|string',
            'gender' => 'required',
            'email' => 'required|string|email|unique:users',
            'property' => 'required',
            'apartment_type' => 'required'
        ]);
        date_default_timezone_set('Africa/Lagos');
        User::create([
            'salutation' => $request->salutation,
            'lastname' => $request->lastname,
            'firstname' => $request->firstname,
            'mobile_phone' => $request->mobile_phone,
            'role' => 3,
            'email' => $request->email,
            'password' => Hash::make('password')
        ]);
        $apartment = Apartment::where('property_id', $request->property)->first();
        $user = User::where('email', $request->email)->first();
        Tenant::create([
            'landlord_user_id' => $request->landlord_user_id,
            'user_id' => $user->id,
            'apartment_id' => $apartment->id,
            'property_id' => $request->property,
            'apartment_type' => $request->apartment_type,
            'third_party_name' => $request->third_party_name,
            'third_party_email' => $request->third_party_email,
            'third_party_phone' => $request->third_party_phone,
            'third_party_whatsapp' => $request->third_party_whatsapp
        ]);
        Biodata::create([
            'user_id' => $user->id,
            'gender' => $request->gender
        ]);
        // Add service
        function payment($user, $payment_type, $service)
        {
            $year = date('Y');
            if ($payment_type == 'Monthly') {
                $month = date('m');
                if ($month == '01') {
                    MonthlyPayment::create([
                        'user_id' => $user->id,
                        'service_id' => $service->id,
                        'year' => $year
                    ]);
                }elseif($month == '02'){
                    MonthlyPayment::create([
                        'user_id' => $user->id,
                        'service_id' => $service->id,
                        'year' => $year,
                        'january' => true
                    ]);
                }elseif ($month == '03') {
                    MonthlyPayment::create([
                        'user_id' => $user->id,
                        'service_id' => $service->id,
                        'year' => $year,
                        'january' => true,
                        'february' => true
                    ]);
                }elseif ($month == '04') {
                    MonthlyPayment::create([
                        'user_id' => $user->id,
                        'service_id' => $service->id,
                        'year' => $year,
                        'january' => true,
                        'february' => true,
                        'march' => true
                    ]);
                }elseif($month == '05'){
                    MonthlyPayment::create([
                        'user_id' => $user->id,
                        'service_id' => $service->id,
                        'year' => $year,
                        'january' => true,
                        'february' => true,
                        'march' => true,
                        'april' => true
                    ]);
                }elseif ($month == '06') {
                    MonthlyPayment::create([
                        'user_id' => $user->id,
                        'service_id' => $service->id,
                        'year' => $year,
                        'january' => true,
                        'february' => true,
                        'march' => true,
                        'april' => true,
                        'may' => true
                    ]);
                }elseif ($month == '07') {
                    MonthlyPayment::create([
                        'user_id' => $user->id,
                        'service_id' => $service->id,
                        'year' => $year,
                        'january' => true,
                        'february' => true,
                        'march' => true,
                        'april' => true,
                        'may' => true,
                        'june' => true
                    ]);
                }elseif ($month == '08') {
                    MonthlyPayment::create([
                        'user_id' => $user->id,
                        'service_id' => $service->id,
                        'year' => $year,
                        'january' => true,
                        'february' => true,
                        'march' => true,
                        'april' => true,
                        'may' => true,
                        'june' => true,
                        'july' => true
                    ]);
                }elseif ($month == '09') {
                    MonthlyPayment::create([
                        'user_id' => $user->id,
                        'service_id' => $service->id,
                        'year' => $year,
                        'january' => true,
                        'february' => true,
                        'march' => true,
                        'april' => true,
                        'may' => true,
                        'june' => true,
                        'july' => true,
                        'august' => true
                    ]);
                }elseif ($month == '10') {
                    MonthlyPayment::create([
                        'user_id' => $user->id,
                        'service_id' => $service->id,
                        'year' => $year,
                        'january' => true,
                        'february' => true,
                        'march' => true,
                        'april' => true,
                        'may' => true,
                        'june' => true,
                        'july' => true,
                        'august' => true,
                        'september' => true
                    ]);
                }elseif ($month == '11') {
                    MonthlyPayment::create([
                        'user_id' => $user->id,
                        'service_id' => $service->id,
                        'year' => $year,
                        'january' => true,
                        'february' => true,
                        'march' => true,
                        'april' => true,
                        'may' => true,
                        'june' => true,
                        'july' => true,
                        'august' => true,
                        'september' => true,
                        'october' => true
                    ]);
                }else{
                    MonthlyPayment::create([
                        'user_id' => $user->id,
                        'service_id' => $service->id,
                        'year' => $year,
                        'january' => true,
                        'february' => true,
                        'march' => true,
                        'april' => true,
                        'may' => true,
                        'june' => true,
                        'july' => true,
                        'august' => true,
                        'september' => true,
                        'october' => true,
                        'november' => true
                    ]);
                }
                
             } else {
                OneOffPayment::create([
                    'user_id' => $user->id,
                    'service_id' => $service->id,
                    'year' => $year
                ]);
             }
        }
        // fetch all services
        $services = DB::table('services')->get();
        foreach($services as $service){
            if ($service->audience == 'Both' || $service->audience == 'Tenants') {
                payment($user, $service->payment_type, $service);
            }
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tenant  $tenant
     * @return \Illuminate\Http\Response
     */
    public function show($user_id)
    {
        $tenant = DB::table('users')
                    ->leftJoin('tenants', 'tenants.user_id', '=', 'users.id')
                    ->leftJoin('biodatas', 'biodatas.user_id', '=', 'users.id')
                    ->where('users.id', $user_id)
                    ->select('users.salutation', 'users.lastname', 'users.middlename', 'users.firstname', 'users.mobile_phone', 'users.email', 'biodatas.gender', 'tenants.*')
                    ->first();
        return response()->json($tenant);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tenant  $tenant
     * @return \Illuminate\Http\Response
     */
    public function edit(Tenant $tenant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tenant  $tenant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $user_id)
    {
        $this->validate($request, [
            'salutation' =>'required',
            'lastname' => 'required|string',
            'firstname' => 'required|string',
            'mobile_phone' => 'required|string',
            'gender' => 'required',
            'email' => 'required|string|email',
            'property' => 'required',
            'apartment_type' => 'required'
        ]);
        
        date_default_timezone_set('Africa/Lagos');
        User::where('id', $user_id)->update([
            'salutation' => $request->salutation,
            'lastname' => $request->lastname,
            'firstname' => $request->firstname,
            'mobile_phone' => $request->mobile_phone,
            'role' => 3,
            'email' => $request->email,
            'password' => Hash::make('password')
        ]);
        $apartment = Apartment::where('property_id', $request->property)->first();
        
        Tenant::where('user_id', $user_id)->update([
            'apartment_id' => $apartment->id,
            'property_id' => $request->property,
            'apartment_type' => $request->apartment_type,
            'third_party_name' => $request->third_party_name,
            'third_party_email' => $request->third_party_email,
            'third_party_phone' => $request->third_party_phone,
            'third_party_whatsapp' => $request->third_party_whatsapp
        ]);
        Biodata::where('user_id', $user_id)->update([
            'gender' => $request->gender
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tenant  $tenant
     * @return \Illuminate\Http\Response
     */
    public function destroy($user_id)
    {
        User::where('id', $user_id)->delete();
    }
    
}
