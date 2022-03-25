<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Str;
use Mail;
use Session;
use App\User;
use App\Service;
use App\Invoice;
use App\OneOffPayment;
use App\MonthlyPayment;
use App\UserMonthlyPayment;
use App\Mail\UserMonthlyPaymentMail;
use Illuminate\Http\Response;
//use Symfony\Component\HttpFoundation\Session\Session;

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
    public function unpaidServices($token)
    {
        $user = User::where('token', $token)->first();
        $monthly = DB::table('services')
                    ->leftJoin('monthly_payments', 'monthly_payments.service_id', '=', 'services.id')
                    ->where('monthly_payments.user_id', $user->id)
                    ->select('services.name', 'services.amount', 'services.payment_type', 'monthly_payments.*')
                    ->get();
        $one_off = DB::table('services')
                    ->leftJoin('one_off_payments', 'one_off_payments.service_id', '=', 'services.id')
                    ->where('one_off_payments.user_id', $user->id)
                    ->select('services.name', 'services.amount', 'services.payment_type', 'one_off_payments.*')
                    ->get();
        return response()->json(['monthly' => $monthly, 'one_off_payments' => $one_off]);
        
    }
    public function fewUnpaidServices($token)
    {
        $user = User::where('token', $token)->first();
        $monthly = DB::table('services')
                    ->leftJoin('monthly_payments', 'monthly_payments.service_id', '=', 'services.id')
                    ->where('monthly_payments.user_id', $user->id)
                    ->select('services.name', 'services.amount', 'services.payment_type', 'monthly_payments.*')
                    ->take(5)
                    ->get();
        $one_off = DB::table('services')
                    ->leftJoin('one_off_payments', 'one_off_payments.service_id', '=', 'services.id')
                    ->where('one_off_payments.user_id', $user->id)
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
    public function processMonthlyPayment(Request $request, $id)
    {
        $service = DB::table('services')
                ->leftJoin('monthly_payments', 'monthly_payments.service_id', '=', 'services.id')
                ->where('monthly_payments.id', $id)
                ->select('services.name', 'services.amount', 'services.payment_type', 'monthly_payments.*')
                ->first();
        $data = [
            'user_id' => $service->user_id,
            'service_id' => $service->service_id,
            'year' => $service->year,
            'january' => $request->january, 
            'february' => $request->february, 
            'march' => $request->march, 
            'april' => $request->april, 
            'may' => $request->may, 
            'june' => $request->june, 
            'july' => $request->july, 
            'august' => $request->august, 
            'september' => $request->september, 
            'october' => $request->october, 
            'november' => $request->november, 
            'december' =>$request->december,
            'confirmed' => false,
            'amount' => $service->amount,
            'total' => $request->total,
            'token' => Str::random(30)
        ];
        //$request->session()->put('cart', $data);
        //Session::put('cart', $data);
        $payments = UserMonthlyPayment::where(['user_id' => $service->user_id, 'confirmed' => false])->get();
        if (count($payments) == 0) {
            UserMonthlyPayment::create($data);
            $month_count = 0;
            $months = [];
            if ($request->january) {
                $month_count++;
                $months[] = 'January';
            }
            if ($request->february) {
                $month_count++;
                $months[] = 'February';
            }
            if ($request->march) {
                $month_count++;
                $months[] = 'March';
            }
            if ($request->april) {
                $month_count++;
                $months[] = 'April';
            }
            if ($request->may) {
                $month_count++;
                $months[] = 'May';
            }
            if ($request->june) {
                $month_count++;
                $months[] = 'June';
            }
            if ($request->july) {
                $month_count++;
                $months[] = 'July';
            }
            if ($request->august) {
                $month_count++;
                $months[] = 'August';
            }
            if ($request->september) {
                $month_count++;
                $months[] = 'September';
            }
            if ($request->october) {
                $month_count++;
                $months[] = 'October';
            }
            if ($request->november) {
                $month_count++;
                $months[] = 'November';
            }
            if ($request->december) {
                $month_count++;
                $months[] = 'December';
            }
            // get user
            $user = DB::table('users')->where('id', $service->user_id)->first();
            
            $payment = UserMonthlyPayment::where(['user_id' => $service->user_id, 'confirmed' => false])->first();
            $mail = [
                'months' => $months,
                'month_count' => $month_count,
                'year' => $service->year,
                'name' => $service->name,
                'amount' => $service->amount,
                'total' => $request->total,
                'payment_type' => $service->payment_type,
                'user' => $user->salutation . " " . $user->lastname . " " . $user->firstname,
                'email' => $user->email,
                'phone' => $user->mobile_phone,
                'token' => $payment->token
            ];
            Session::put('cart', $mail);
            Mail::to($user->email)->send(new UserMonthlyPaymentMail($mail));
            $invoices = Invoice::all();
            if(count($invoices) == 0){
                $invoice_number = 183230;
            }else{
                $invoice = Invoice::orderBy('id', 'desc')->first();
                $invoice_number = $invoice->invoice_number + 1;
            }
            Invoice::create([
                'user_id' => $service->user_id,
                'service_id' => $service->service_id,
                'invoice_number' => $invoice_number,
                'name' => $user->salutation . " " . $user->lastname . " " . $user->firstname,
                'email' => $user->email,
                'phone' => $user->mobile_phone,
                'payment_type' => $service->payment_type,
                'year' => $service->year,
                'token' => $payment->token
            ]);
        } else {
            return response()->json(['error' => 'You have an unprocessed cart'], 401);
        }
        
        

    }
    public function cart()
    {
        //$cart = $request->session()->get('cart');
        $cart = Session::get('cart');
        // $session = new Session();
        // $cart = $session->get('cart');
        return response()->json($cart);
    }
    public function viewInvoice()
    {
        // $session = new Session();
        // $cart = $session->get('cart');
        $cart = Session::get('cart');
        if ($cart) {
            $invoice = Invoice::where('token', $cart['token'])->first();
            return view('invoice', compact('cart', 'invoice'));
        }else{
            return redirect("/home");
        }
       
    }
    public function invoicePaid()
    {
        // $session = new Session();
        // $cart = $session->get('cart');
        $cart = Session::get('cart');
        return view('invoice_paid', compact('cart'));
    }
    public function emptyCart($token)
    {
        $user = User::where('token', $token)->first();
        $cart = Session::get('cart');
        UserMonthlyPayment::where(['user_id' => $user->id, 'confirmed' => false])->delete();  
        Invoice::where(['user_id' => $user->id, 'token' => $cart['token']])->delete();
        Session::forget('cart');
    }
    public function monthlyCart($token)
    {
        $cart = Session::get('cart');
        if (!isset($cart)) {
            $user = User::where('token', $token)->first();
            $payment = UserMonthlyPayment::where(['user_id' => $user->id, 'confirmed' => false])->first();
            if (isset($payment)) {
                $service = DB::table('services')
                    ->leftJoin('monthly_payments', 'monthly_payments.service_id', '=', 'services.id')
                    ->where('services.id', $payment->service_id)
                    ->select('services.name', 'services.amount', 'services.payment_type', 'monthly_payments.*')
                    ->first();
                $month_count = 0;
                $months = [];
                if (isset($payment->january) && $payment->january == 1) {
                    $month_count++;
                    $months[] = 'January';
                }
                if (isset($payment->february) && $payment->february == 1) {
                    $month_count++;
                    $months[] = 'February';
                }
                if (isset($payment->march) && $payment->march == 1) {
                    $month_count++;
                    $months[] = 'March';
                }
                if (isset($payment->april) && $payment->january == 1) {
                    $month_count++;
                    $months[] = 'April';
                }
                if (isset($payment->may) && $payment->may == 1) {
                    $month_count++;
                    $months[] = 'May';
                }
                if (isset($payment->june) && $payment->june == 1) {
                    $month_count++;
                    $months[] = 'June';
                }
                if (isset($payment->july) && $payment->july == 1) {
                    $month_count++;
                    $months[] = 'July';
                }
                if (isset($payment->august) && $payment->august == 1) {
                    $month_count++;
                    $months[] = 'August';
                }
                if (isset($payment->september) && $payment->september == 1) {
                    $month_count++;
                    $months[] = 'September';
                }
                if (isset($payment->october) && $payment->october == 1) {
                    $month_count++;
                    $months[] = 'October';
                }
                if (isset($payment->november) && $payment->november == 1) {
                    $month_count++;
                    $months[] = 'November';
                }
                if (isset($payment->december) && $payment->december == 1) {
                    $month_count++;
                    $months[] = 'December';
                }
                $mail = [
                    'months' => $months,
                    'month_count' => $month_count,
                    'year' => $payment->year,
                    'name' => $service->name,
                    'amount' => $service->amount,
                    'total' => $payment->total,
                    'payment_type' => $service->payment_type,
                    'user' => $user->salutation . " " . $user->lastname . " " . $user->firstname,
                    'email' => $user->email,
                    'phone' => $user->mobile_phone,
                    'token' => $payment->token
                ];
                // $session = new Session();
                // $session->set('cart', $mail);
                Session::put('cart', $mail);
                return response()->json($mail);
            }
            
        }else{
            $cart = Session::get('cart');
            return response()->json($cart);
        }
    }
    public function response()
    {
        return view('response');
    }

}
