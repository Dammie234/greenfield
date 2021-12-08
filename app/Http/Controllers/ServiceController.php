<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Service;
use App\OneOffPayment;
use App\MonthlyPayment;

class ServiceController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|unique:services',
            'audience' => 'required',
            'amount'=> 'required|integer',
            'payment_type' => 'required'
        ]);
        date_default_timezone_set('Africa/Lagos');
        $data = [
            'name' => $request->name,
            'audience' => $request->audience,
            'amount' => $request->amount,
            'payment_type' => $request->payment_type
        ];
        Service::create($data);
        $service = DB::table('services')->latest()->first();
        $audience = $request->audience;
        $payment_type = $request->payment_type;
        function payment($users, $payment_type, $service)
        {
            $year = date('Y');
            if ($payment_type == 'Monthly') {
                foreach($users as $user){
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
                    
                }
             } else {
                 foreach($users as $user){
                     OneOffPayment::create([
                         'user_id' => $user->id,
                         'service_id' => $service->id,
                         'year' => $year
                     ]);
                 }
             }
        }
        if ($audience == 'Landlords/Landladies') {
            $users = DB::table('users')->where('role', 2)->get();
            payment($users, $payment_type, $service);
        } elseif($audience == 'Tenants'){
            $users = DB::table('users')->where('role', 3)->get();
            payment($users, $payment_type, $service);
        }else {
            $users = DB::table('users')->get();
            payment($users, $payment_type, $service);
        }
    }
    public function index()
    {
        $services = Service::orderBy('id', 'desc')->get();
        return response()->json($services);
    }
    public function unpaidServices($user_id)
    {
        $monthly = DB::table('services')
                    ->leftJoin('monthly_payments', 'monthly_payments.service_id', '=', 'services.id')
                    ->where('monthly_payments.user_id', $user_id)
                    ->select('services.name', 'services.amount', 'services.payment_type', 'monthly_payments.*')
                    ->get();
        $one_off = DB::table('services')
                    ->leftJoin('one_off_payments', 'one_off_payments.service_id', '=', 'services.id')
                    ->where('one_off_payments.user_id', $user_id)
                    ->select('services.name', 'services.amount', 'services.payment_type', 'one_off_payments.*')
                    ->get();
        return response()->json(['monthly' => $monthly, 'one_off_payments' => $one_off]);
        
    }
    public function fewUnpaidServices($user_id)
    {
        $monthly = DB::table('services')
                    ->leftJoin('monthly_payments', 'monthly_payments.service_id', '=', 'services.id')
                    ->where('monthly_payments.user_id', $user_id)
                    ->select('services.name', 'services.amount', 'services.payment_type', 'monthly_payments.*')
                    ->take(5)
                    ->get();
        $one_off = DB::table('services')
                    ->leftJoin('one_off_payments', 'one_off_payments.service_id', '=', 'services.id')
                    ->where('one_off_payments.user_id', $user_id)
                    ->select('services.name', 'services.amount', 'services.payment_type', 'one_off_payments.*')
                    ->take(5)
                    ->get();
        return response()->json(['monthly' => $monthly, 'one_off_payments' => $one_off]);
        
    }
    public function monthlyServices($id)
    {
        $service = DB::table('services')
                    ->leftJoin('monthly_payments', 'monthly_payments.service_id', '=', 'services.id')
                    ->where('monthly_payments.id', $id)
                    ->select('services.name', 'services.amount', 'services.payment_type', 'monthly_payments.*')
                    ->first();
        return response()->json($service);
    }
    public function oneOffServices($id)
    {
        $service = DB::table('services')
                    ->leftJoin('one_off_payments', 'one_off_payments.service_id', '=', 'services.id')
                    ->where('one_off_payments.id', $id)
                    ->select('services.name', 'services.amount', 'services.payment_type', 'one_off_payments.*')
                    ->first();
        return response()->json($service);
    }
}
