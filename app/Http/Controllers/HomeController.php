<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    public function dashboardLandlord($user_id)
    {
        $aproperties = count(DB::table('properties')->where('user_id', $user_id)->get());
        $aapartments = count(DB::table('apartments')->where('user_id', $user_id)->get());
        $atenants = count(DB::table('tenants')->where('landlord_user_id', $user_id)->get());
        $nproperties = DB::table('properties')->where('user_id', $user_id)->take(5)->get();
        $napartments = DB::table('properties')
                        ->leftJoin('apartments', 'apartments.property_id', '=', 'properties.id')
                        ->where('properties.user_id', $user_id)
                        ->select('properties.house_number', 'properties.street_name', 'apartments.*')
                        ->take(5)
                        ->get();
        $ntenants = DB::table('tenants')
                        ->leftJoin('users', 'users.id', '=', 'tenants.user_id')
                        ->leftJoin('properties', 'properties.id', '=', 'tenants.property_id')
                        ->where('tenants.landlord_user_id', $user_id)
                        ->select('users.salutation', 'users.lastname', 'users.firstname', 'users.mobile_phone', 'users.email', 'tenants.*', 'properties.house_number', 'properties.street_name')
                        ->take(5)
                        ->get();
        
        return response()->json(['aproperties' => $aproperties, 'aapartments' => $aapartments, 'atenants' => $atenants, 'nproperties' => $nproperties, 'napartments' => $napartments, 'ntenants' => $ntenants]);
    }
    public function dashboardAdmin()
    {
        $aproperties = count(DB::table('properties')->get());
        $landlords = count(DB::table('users')->where('role', 2)->get());
        $atenants = count(DB::table('tenants')->get());
        $nproperties = DB::table('properties')->orderBy('id', 'desc')->take(5)->get();
        $nlandlords = DB::table('users')
                            ->leftJoin('biodatas', 'biodatas.user_id', '=', 'users.id')
                            ->leftJoin('properties', 'properties.user_id', '=', 'users.id')
                            ->where('users.role', 2)
                            ->select('users.salutation', 'users.firstname', 'users.lastname', 'users.email', 'users.mobile_phone', 'biodatas.gender', 'biodatas.phone_number_whatsapp', 'properties.house_number', 'properties.street_name')
                            ->orderBy('users.id', 'desc')
                            ->take(10)
                            ->get();
        $ntenants = DB::table('tenants')
                        ->leftJoin('users', 'users.id', '=', 'tenants.user_id')
                        ->leftJoin('properties', 'properties.id', '=', 'tenants.property_id')
                        ->orderBy('tenants.id', 'desc')
                        ->select('users.salutation', 'users.lastname', 'users.firstname', 'users.mobile_phone', 'users.email', 'tenants.*', 'properties.house_number', 'properties.street_name')
                        ->take(5)
                        ->get();
        return response()->json(['aproperties' => $aproperties, 'landlords' => $landlords, 'nlandlords' => $nlandlords ,'atenants' => $atenants, 'nproperties' => $nproperties, 'ntenants' => $ntenants]);
    }
    public function landlords()
    {
        $landlords = DB::table('users')
                            ->leftJoin('biodatas', 'biodatas.user_id', '=', 'users.id')
                            ->leftJoin('properties', 'properties.user_id', '=', 'users.id')
                            ->where('users.role', 2)
                            ->select('users.salutation', 'users.firstname', 'users.lastname', 'users.email', 'users.mobile_phone', 'users.id', 'biodatas.gender', 'biodatas.phone_number_whatsapp', 'properties.house_number', 'properties.street_name')
                            ->orderBy('users.id', 'desc')
                            ->get();
        return response()->json($landlords);
    }
    public function userDebts($user_id)
    {
        
        $months = DB::table('monthly_payments')
                        ->leftJoin('services', 'services.id', '=', 'monthly_payments.service_id')
                        ->where('user_id', $user_id)
                        ->get();
        $one_offs = DB::table('one_off_payments')
                        ->leftJoin('services', 'services.id', '=', 'one_off_payments.service_id')
                        ->select('services.amount', 'one_off_payments.*')
                        ->where('user_id', $user_id)
                        ->get();
        $debts = 0;
        function debt($month, $amount)
        {
            if ($month == false) {
               return $amount;
            }
        }
        foreach($months as $monthly){
            $month = date('m');
            if ($month == '01') {
                $debts += debt($monthly->december, $monthly->amount);
            }
            if ($month == '02') {
                $debts += debt($monthly->january, $monthly->amount);
            }
            if ($month == '03') {
                $debts += debt($monthly->january, $monthly->amount);
                $debts += debt($monthly->february, $monthly->amount);
            }
            if ($month == '04') {
                $debts += debt($monthly->january, $monthly->amount);
                $debts += debt($monthly->february, $monthly->amount);
                $debts += debt($monthly->march, $monthly->amount);
            }
            if ($month == '05') {
                $debts += debt($monthly->january, $monthly->amount);
                $debts += debt($monthly->february, $monthly->amount);
                $debts += debt($monthly->march, $monthly->amount);
                $debts += debt($monthly->april, $monthly->amount);
            }
            if ($month == '06') {
                $debts += debt($monthly->january, $monthly->amount);
                $debts += debt($monthly->february, $monthly->amount);
                $debts += debt($monthly->march, $monthly->amount);
                $debts += debt($monthly->april, $monthly->amount);
                $debts += debt($monthly->may, $monthly->amount);
            }
            if ($month == '07') {
                $debts += debt($monthly->january, $monthly->amount);
                $debts += debt($monthly->february, $monthly->amount);
                $debts += debt($monthly->march, $monthly->amount);
                $debts += debt($monthly->april, $monthly->amount);
                $debts += debt($monthly->may, $monthly->amount);
                $debts += debt($monthly->june, $monthly->amount);
            }
            if ($month == '08') {
                $debts += debt($monthly->january, $monthly->amount);
                $debts += debt($monthly->february, $monthly->amount);
                $debts += debt($monthly->march, $monthly->amount);
                $debts += debt($monthly->april, $monthly->amount);
                $debts += debt($monthly->may, $monthly->amount);
                $debts += debt($monthly->june, $monthly->amount);
                $debts += debt($monthly->july, $monthly->amount);
            }
            if ($month == '09') {
                $debts += debt($monthly->january, $monthly->amount);
                $debts += debt($monthly->february, $monthly->amount);
                $debts += debt($monthly->march, $monthly->amount);
                $debts += debt($monthly->april, $monthly->amount);
                $debts += debt($monthly->may, $monthly->amount);
                $debts += debt($monthly->june, $monthly->amount);
                $debts += debt($monthly->july, $monthly->amount);
                $debts += debt($monthly->august, $monthly->amount);
            }
            if ($month == '10') {
                $debts += debt($monthly->january, $monthly->amount);
                $debts += debt($monthly->february, $monthly->amount);
                $debts += debt($monthly->march, $monthly->amount);
                $debts += debt($monthly->april, $monthly->amount);
                $debts += debt($monthly->may, $monthly->amount);
                $debts += debt($monthly->june, $monthly->amount);
                $debts += debt($monthly->july, $monthly->amount);
                $debts += debt($monthly->august, $monthly->amount);
                $debts += debt($monthly->september, $monthly->amount);
            }
            if ($month == '11') {
                $debts += debt($monthly->january, $monthly->amount);
                $debts += debt($monthly->february, $monthly->amount);
                $debts += debt($monthly->march, $monthly->amount);
                $debts += debt($monthly->april, $monthly->amount);
                $debts += debt($monthly->may, $monthly->amount);
                $debts += debt($monthly->june, $monthly->amount);
                $debts += debt($monthly->july, $monthly->amount);
                $debts += debt($monthly->august, $monthly->amount);
                $debts += debt($monthly->september, $monthly->amount);
                $debts += debt($monthly->october, $monthly->amount);
            }
            if ($month == '12') {
                $debts += debt($monthly->january, $monthly->amount);
                $debts += debt($monthly->february, $monthly->amount);
                $debts += debt($monthly->march, $monthly->amount);
                $debts += debt($monthly->april, $monthly->amount);
                $debts += debt($monthly->may, $monthly->amount);
                $debts += debt($monthly->june, $monthly->amount);
                $debts += debt($monthly->july, $monthly->amount);
                $debts += debt($monthly->august, $monthly->amount);
                $debts += debt($monthly->september, $monthly->amount);
                $debts += debt($monthly->october, $monthly->amount);
                $debts += debt($monthly->november, $monthly->amount);
            }
        }
        
        foreach ($one_offs as $one_off) {
            $thisMonth = (int) date('m');
            $monthCreated = (int) date('m', strtotime($one_off->created_at));
            if ($monthCreated < $thisMonth) {
                $debts += $one_off->amount;
            }
        }
        return response()->json($debts);
    }
    public function allDebts()
    {
        
        $months = DB::table('monthly_payments')
                        ->leftJoin('services', 'services.id', '=', 'monthly_payments.service_id')
                        ->get();
        $one_offs = DB::table('one_off_payments')
                        ->leftJoin('services', 'services.id', '=', 'one_off_payments.service_id')
                        ->select('services.amount', 'services.name', 'one_off_payments.*')
                        ->get();
        $debts = 0;
        $debtors = 0;
        $data = [];
        function debtors($month)
        {
            if ($month == false) {
               return 1;
            }
        }
        function debt($month, $amount)
        {
            if ($month == false) {
               return $amount;
            }
        }
        function user($user_id, $service, $amount, $month = false, $mon = 'Full Year')
        {
            if ($month == false) {
                $user = DB::table('users')->where('id', $user_id)->first();
                if ($user->role == 2) {
                    $user_type = 'Landlord/Landlady';
                }else{
                    $user_type = 'Tenant';
                }
                $data = [
                    'salutation' => $user->salutation,
                    'user' =>  $user->lastname . ' ' . $user->firstname,
                    'service' => $service,
                    'amount' => $amount,
                    'month' => $mon,
                    'type' => $user_type
                ];
                return $data;
            }            
        }
        foreach($months as $monthly){
            $month = date('m');
            if ($month == '01') {
                $debts += debt($monthly->december, $monthly->amount);
                $debtors += debtors($monthly->december);
                $december = user($monthly->user_id, $monthly->name, $monthly->amount, $monthly->december, 'December');
                
                if($december != null){
                    $data[] = $december;
                } 
                
            }
            if ($month == '02') {
                $debts += debt($monthly->january, $monthly->amount);
                $debtors += debtors($monthly->january);
                $january = user($monthly->user_id, $monthly->name, $monthly->amount, $monthly->january, 'January');
                
                if($january != null){
                    $data[] = $january;
                } 
                
            }
            if ($month == '03') {
                $debts += debt($monthly->january, $monthly->amount);
                $debtors += debtors($monthly->january);
                $debts += debt($monthly->february, $monthly->amount);
                $debtors += debtors($monthly->february);
                $january = user($monthly->user_id, $monthly->name, $monthly->amount, $monthly->january, 'January');
                $february = user($monthly->user_id, $monthly->name, $monthly->amount, $monthly->february, 'February');
               
                if($january != null){
                    $data[] = $january;
                } 
                if ($february != null) {
                    $data[] = $february;
                }
                
            }
            if ($month == '04') {
                $debts += debt($monthly->january, $monthly->amount);
                $debts += debt($monthly->february, $monthly->amount);
                $debts += debt($monthly->march, $monthly->amount);
                $debtors += debtors($monthly->january);
                $debtors += debtors($monthly->february);
                $debtors += debtors($monthly->march);
                $january = user($monthly->user_id, $monthly->name, $monthly->amount, $monthly->january, 'January');
                $february = user($monthly->user_id, $monthly->name, $monthly->amount, $monthly->february, 'February');
                $march = user($monthly->user_id, $monthly->name, $monthly->amount, $monthly->march, 'March');
                
                if($january != null){
                    $data[] = $january;
                } 
                if ($february != null) {
                    $data[] = $february;
                }
                if ($march != null) {
                    $data[] = $march;
                }
                
            }
            if ($month == '05') {
                $debts += debt($monthly->january, $monthly->amount);
                $debts += debt($monthly->february, $monthly->amount);
                $debts += debt($monthly->march, $monthly->amount);
                $debts += debt($monthly->april, $monthly->amount);
                $debtors += debtors($monthly->january);
                $debtors += debtors($monthly->february);
                $debtors += debtors($monthly->march);
                $debtors += debtors($monthly->april);
                $january = user($monthly->user_id, $monthly->name, $monthly->amount, $monthly->january, 'January');
                $february = user($monthly->user_id, $monthly->name, $monthly->amount, $monthly->february, 'February');
                $march = user($monthly->user_id, $monthly->name, $monthly->amount, $monthly->march, 'March');
                $april = user($monthly->user_id, $monthly->name, $monthly->amount, $monthly->april, 'April');
                
                if($january != null){
                    $data[] = $january;
                } 
                if ($february != null) {
                    $data[] = $february;
                }
                if ($march != null) {
                    $data[] = $march;
                }
                if ($april != null) {
                    $data[] = $april;
                }
                
            }
            if ($month == '06') {
                $debts += debt($monthly->january, $monthly->amount);
                $debts += debt($monthly->february, $monthly->amount);
                $debts += debt($monthly->march, $monthly->amount);
                $debts += debt($monthly->april, $monthly->amount);
                $debts += debt($monthly->may, $monthly->amount);
                $debtors += debtors($monthly->january);
                $debtors += debtors($monthly->february);
                $debtors += debtors($monthly->march);
                $debtors += debtors($monthly->april);
                $debtors += debtors($monthly->may);
                $january = user($monthly->user_id, $monthly->name, $monthly->amount, $monthly->january, 'January');
                $february = user($monthly->user_id, $monthly->name, $monthly->amount, $monthly->february, 'February');
                $march = user($monthly->user_id, $monthly->name, $monthly->amount, $monthly->march, 'March');
                $april = user($monthly->user_id, $monthly->name, $monthly->amount, $monthly->april, 'April');
                $may = user($monthly->user_id, $monthly->name, $monthly->amount, $monthly->may, 'May');
                
                if($january != null){
                    $data[] = $january;
                } 
                if ($february != null) {
                    $data[] = $february;
                }
                if ($march != null) {
                    $data[] = $march;
                }
                if ($april != null) {
                    $data[] = $april;
                }
                if ($may != null) {
                    $data[] = $may;
                }
                
            }
            if ($month == '07') {
                $debts += debt($monthly->january, $monthly->amount);
                $debts += debt($monthly->february, $monthly->amount);
                $debts += debt($monthly->march, $monthly->amount);
                $debts += debt($monthly->april, $monthly->amount);
                $debts += debt($monthly->may, $monthly->amount);
                $debts += debt($monthly->june, $monthly->amount);
                $debtors += debtors($monthly->january);
                $debtors += debtors($monthly->february);
                $debtors += debtors($monthly->march);
                $debtors += debtors($monthly->april);
                $debtors += debtors($monthly->may);
                $debtors += debtors($monthly->june);
                $january = user($monthly->user_id, $monthly->name, $monthly->amount, $monthly->january, 'January');
                $february = user($monthly->user_id, $monthly->name, $monthly->amount, $monthly->february, 'February');
                $march = user($monthly->user_id, $monthly->name, $monthly->amount, $monthly->march, 'March');
                $april = user($monthly->user_id, $monthly->name, $monthly->amount, $monthly->april, 'April');
                $may = user($monthly->user_id, $monthly->name, $monthly->amount, $monthly->may, 'May');
                $june = user($monthly->user_id, $monthly->name, $monthly->amount, $monthly->june, 'June');
                
                if($january != null){
                    $data[] = $january;
                } 
                if ($february != null) {
                    $data[] = $february;
                }
                if ($march != null) {
                    $data[] = $march;
                }
                if ($april != null) {
                    $data[] = $april;
                }
                if ($may != null) {
                    $data[] = $may;
                }
                if ($june != null) {
                    $data[] = $june;
                }
               
            }
            if ($month == '08') {
                $debts += debt($monthly->january, $monthly->amount);
                $debts += debt($monthly->february, $monthly->amount);
                $debts += debt($monthly->march, $monthly->amount);
                $debts += debt($monthly->april, $monthly->amount);
                $debts += debt($monthly->may, $monthly->amount);
                $debts += debt($monthly->june, $monthly->amount);
                $debts += debt($monthly->july, $monthly->amount);
                $debtors += debtors($monthly->january);
                $debtors += debtors($monthly->february);
                $debtors += debtors($monthly->march);
                $debtors += debtors($monthly->april);
                $debtors += debtors($monthly->may);
                $debtors += debtors($monthly->june);
                $debtors += debtors($monthly->july);
                $january = user($monthly->user_id, $monthly->name, $monthly->amount, $monthly->january, 'January');
                $february = user($monthly->user_id, $monthly->name, $monthly->amount, $monthly->february, 'February');
                $march = user($monthly->user_id, $monthly->name, $monthly->amount, $monthly->march, 'March');
                $april = user($monthly->user_id, $monthly->name, $monthly->amount, $monthly->april, 'April');
                $may = user($monthly->user_id, $monthly->name, $monthly->amount, $monthly->may, 'May');
                $june = user($monthly->user_id, $monthly->name, $monthly->amount, $monthly->june, 'June');
                $july = user($monthly->user_id, $monthly->name, $monthly->amount, $monthly->july, 'July');
                
                if($january != null){
                    $data[] = $january;
                } 
                if ($february != null) {
                    $data[] = $february;
                }
                if ($march != null) {
                    $data[] = $march;
                }
                if ($april != null) {
                    $data[] = $april;
                }
                if ($may != null) {
                    $data[] = $may;
                }
                if ($june != null) {
                    $data[] = $june;
                }
                if ($july != null) {
                    $data[] = $july;
                }
                
            }
            if ($month == '09') {
                $debts += debt($monthly->january, $monthly->amount);
                $debts += debt($monthly->february, $monthly->amount);
                $debts += debt($monthly->march, $monthly->amount);
                $debts += debt($monthly->april, $monthly->amount);
                $debts += debt($monthly->may, $monthly->amount);
                $debts += debt($monthly->june, $monthly->amount);
                $debts += debt($monthly->july, $monthly->amount);
                $debts += debt($monthly->august, $monthly->amount);
                $debtors += debtors($monthly->january);
                $debtors += debtors($monthly->february);
                $debtors += debtors($monthly->march);
                $debtors += debtors($monthly->april);
                $debtors += debtors($monthly->may);
                $debtors += debtors($monthly->june);
                $debtors += debtors($monthly->july);
                $debtors += debtors($monthly->august);
                $january = user($monthly->user_id, $monthly->name, $monthly->amount, $monthly->january, 'January');
                $february = user($monthly->user_id, $monthly->name, $monthly->amount, $monthly->february, 'February');
                $march = user($monthly->user_id, $monthly->name, $monthly->amount, $monthly->march, 'March');
                $april = user($monthly->user_id, $monthly->name, $monthly->amount, $monthly->april, 'April');
                $may = user($monthly->user_id, $monthly->name, $monthly->amount, $monthly->may, 'May');
                $june = user($monthly->user_id, $monthly->name, $monthly->amount, $monthly->june, 'June');
                $july = user($monthly->user_id, $monthly->name, $monthly->amount, $monthly->july, 'July');
                $august = user($monthly->user_id, $monthly->name, $monthly->amount, $monthly->august, 'August');
               
                if($january != null){
                    $data[] = $january;
                } 
                if ($february != null) {
                    $data[] = $february;
                }
                if ($march != null) {
                    $data[] = $march;
                }
                if ($april != null) {
                    $data[] = $april;
                }
                if ($may != null) {
                    $data[] = $may;
                }
                if ($june != null) {
                    $data[] = $june;
                }
                if ($july != null) {
                    $data[] = $july;
                }
                if ($august != null) {
                    $data[] = $august;
                }
                
            }
            if ($month == '10') {
                $debts += debt($monthly->january, $monthly->amount);
                $debts += debt($monthly->february, $monthly->amount);
                $debts += debt($monthly->march, $monthly->amount);
                $debts += debt($monthly->april, $monthly->amount);
                $debts += debt($monthly->may, $monthly->amount);
                $debts += debt($monthly->june, $monthly->amount);
                $debts += debt($monthly->july, $monthly->amount);
                $debts += debt($monthly->august, $monthly->amount);
                $debts += debt($monthly->september, $monthly->amount);
                $debtors += debtors($monthly->january);
                $debtors += debtors($monthly->february);
                $debtors += debtors($monthly->march);
                $debtors += debtors($monthly->april);
                $debtors += debtors($monthly->may);
                $debtors += debtors($monthly->june);
                $debtors += debtors($monthly->july);
                $debtors += debtors($monthly->august);
                $debtors += debtors($monthly->september);
                $january = user($monthly->user_id, $monthly->name, $monthly->amount, $monthly->january, 'January');
                $february = user($monthly->user_id, $monthly->name, $monthly->amount, $monthly->february, 'February');
                $march = user($monthly->user_id, $monthly->name, $monthly->amount, $monthly->march, 'March');
                $april = user($monthly->user_id, $monthly->name, $monthly->amount, $monthly->april, 'April');
                $may = user($monthly->user_id, $monthly->name, $monthly->amount, $monthly->may, 'May');
                $june = user($monthly->user_id, $monthly->name, $monthly->amount, $monthly->june, 'June');
                $july = user($monthly->user_id, $monthly->name, $monthly->amount, $monthly->july, 'July');
                $august = user($monthly->user_id, $monthly->name, $monthly->amount, $monthly->august, 'August');
                $september = user($monthly->user_id, $monthly->name, $monthly->amount, $monthly->september, 'September');
                if($january != null){
                    $data[] = $january;
                } 
                if ($february != null) {
                    $data[] = $february;
                }
                if ($march != null) {
                    $data[] = $march;
                }
                if ($april != null) {
                    $data[] = $april;
                }
                if ($may != null) {
                    $data[] = $may;
                }
                if ($june != null) {
                    $data[] = $june;
                }
                if ($july != null) {
                    $data[] = $july;
                }
                if ($august != null) {
                    $data[] = $august;
                }
                if ($september != null) {
                    $data[] = $september;
                }
            }
            if ($month == '11') {
                $debts += debt($monthly->january, $monthly->amount);
                $debts += debt($monthly->february, $monthly->amount);
                $debts += debt($monthly->march, $monthly->amount);
                $debts += debt($monthly->april, $monthly->amount);
                $debts += debt($monthly->may, $monthly->amount);
                $debts += debt($monthly->june, $monthly->amount);
                $debts += debt($monthly->july, $monthly->amount);
                $debts += debt($monthly->august, $monthly->amount);
                $debts += debt($monthly->september, $monthly->amount);
                $debts += debt($monthly->october, $monthly->amount);
                $debtors += debtors($monthly->january);
                $debtors += debtors($monthly->february);
                $debtors += debtors($monthly->march);
                $debtors += debtors($monthly->april);
                $debtors += debtors($monthly->may);
                $debtors += debtors($monthly->june);
                $debtors += debtors($monthly->july);
                $debtors += debtors($monthly->august);
                $debtors += debtors($monthly->september);
                $debtors += debtors($monthly->october);
                $january = user($monthly->user_id, $monthly->name, $monthly->amount, $monthly->january, 'January');
                $february = user($monthly->user_id, $monthly->name, $monthly->amount, $monthly->february, 'February');
                $march = user($monthly->user_id, $monthly->name, $monthly->amount, $monthly->march, 'March');
                $april = user($monthly->user_id, $monthly->name, $monthly->amount, $monthly->april, 'April');
                $may = user($monthly->user_id, $monthly->name, $monthly->amount, $monthly->may, 'May');
                $june = user($monthly->user_id, $monthly->name, $monthly->amount, $monthly->june, 'June');
                $july = user($monthly->user_id, $monthly->name, $monthly->amount, $monthly->july, 'July');
                $august = user($monthly->user_id, $monthly->name, $monthly->amount, $monthly->august, 'August');
                $september = user($monthly->user_id, $monthly->name, $monthly->amount, $monthly->september, 'September');
                $october = user($monthly->user_id, $monthly->name, $monthly->amount, $monthly->october, 'October');

                if($january != null){
                    $data[] = $january;
                } 
                if ($february != null) {
                    $data[] = $february;
                }
                if ($march != null) {
                    $data[] = $march;
                }
                if ($april != null) {
                    $data[] = $april;
                }
                if ($may != null) {
                    $data[] = $may;
                }
                if ($june != null) {
                    $data[] = $june;
                }
                if ($july != null) {
                    $data[] = $july;
                }
                if ($august != null) {
                    $data[] = $august;
                }
                if ($september != null) {
                    $data[] = $september;
                }
                if ($october != null) {
                    $data[] = $october;
                }
            }
            if ($month == '12') {
                $debts += debt($monthly->january, $monthly->amount);
                $debts += debt($monthly->february, $monthly->amount);
                $debts += debt($monthly->march, $monthly->amount);
                $debts += debt($monthly->april, $monthly->amount);
                $debts += debt($monthly->may, $monthly->amount);
                $debts += debt($monthly->june, $monthly->amount);
                $debts += debt($monthly->july, $monthly->amount);
                $debts += debt($monthly->august, $monthly->amount);
                $debts += debt($monthly->september, $monthly->amount);
                $debts += debt($monthly->october, $monthly->amount);
                $debts += debt($monthly->november, $monthly->amount);
                $debtors += debtors($monthly->january);
                $debtors += debtors($monthly->february);
                $debtors += debtors($monthly->march);
                $debtors += debtors($monthly->april);
                $debtors += debtors($monthly->may);
                $debtors += debtors($monthly->june);
                $debtors += debtors($monthly->july);
                $debtors += debtors($monthly->august);
                $debtors += debtors($monthly->september);
                $debtors += debtors($monthly->october);
                $debtors += debtors($monthly->november);
                $january = user($monthly->user_id, $monthly->name, $monthly->amount, $monthly->january, 'January');
                $february = user($monthly->user_id, $monthly->name, $monthly->amount, $monthly->february, 'February');
                $march = user($monthly->user_id, $monthly->name, $monthly->amount, $monthly->march, 'March');
                $april = user($monthly->user_id, $monthly->name, $monthly->amount, $monthly->april, 'April');
                $may = user($monthly->user_id, $monthly->name, $monthly->amount, $monthly->may, 'May');
                $june = user($monthly->user_id, $monthly->name, $monthly->amount, $monthly->june, 'June');
                $july = user($monthly->user_id, $monthly->name, $monthly->amount, $monthly->july, 'July');
                $august = user($monthly->user_id, $monthly->name, $monthly->amount, $monthly->august, 'August');
                $september = user($monthly->user_id, $monthly->name, $monthly->amount, $monthly->september, 'September');
                $october = user($monthly->user_id, $monthly->name, $monthly->amount, $monthly->october, 'October');
                $november = user($monthly->user_id, $monthly->name, $monthly->amount, $monthly->november, 'November');
                if($january != null){
                    $data[] = $january;
                } 
                if ($february != null) {
                    $data[] = $february;
                }
                if ($march != null) {
                    $data[] = $march;
                }
                if ($april != null) {
                    $data[] = $april;
                }
                if ($may != null) {
                    $data[] = $may;
                }
                if ($june != null) {
                    $data[] = $june;
                }
                if ($july != null) {
                    $data[] = $july;
                }
                if ($august != null) {
                    $data[] = $august;
                }
                if ($september != null) {
                    $data[] = $september;
                }
                if ($october != null) {
                    $data[] = $october;
                }
                if ($november != null) {
                    $data[] = $november;
                }
            }
        }
        
        foreach ($one_offs as $one_off) {
            $thisMonth = (int) date('m');
            $monthCreated = (int) date('m', strtotime($one_off->created_at));
            if ($monthCreated < $thisMonth) {
                $debts += $one_off->amount;
                $debtors += 1;
                $data[] = user($one_off->user_id, $one_off->name, $one_off->amount);
            }
        }
        return response()->json(['debts' => $debts, 'debtors' => $debtors, 'data' => $data]);
    }
}
