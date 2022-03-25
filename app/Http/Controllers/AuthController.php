<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\User;
use App\Biodata;
use App\MonthlyPayment;
use App\OneOffPayment;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Mail;
use DB;

class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('JWT', ['except' => ['login', 'signup', 'postEmail', 'getPassword', 'updatePassword']]);
    // }

    /**
     * Get a JWT token via given credentials.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $validateData = $request->validate([
            'email' => 'required',
            'password' => 'required',    
        ]);
        $credentials = $request->only('email', 'password');

        if ($token = $this->guard()->attempt($credentials)) {
            User::where('email', $request->email)->update([
                'token' => $token
            ]);
            return $this->respondWithToken($token);
        }

        return response()->json(['error' => 'Email or Password Invalid'], 401);
    }

    public function signup(Request $request)
    {
        $validateData = $request->validate([
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'mobile_phone' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|min:6|confirmed'
        ]);
        $data = [
            'lastname' => $request->lastname,
            'firstname' => $request->firstname,
            'mobile_phone' => $request->mobile_phone,
            'role' => 2,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ];
        
        User::create($data);
        $user = User::where('email', $request->email)->first();
        Biodata::create([
            'user_id' => $user->id
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
            if ($service->audience == 'Both' || $service->audience == 'Landlords/Landladies') {
                payment($user, $service->payment_type, $service);
            }
        }
        return $this->login($request);
    }

    /**
     * Get the authenticated User
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json($this->guard()->user());
    }

    /**
     * Log the user out (Invalidate the token)
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        $this->guard()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken($this->guard()->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => $this->guard()->factory()->getTTL() * 60,
            'user' => auth()->user(),
            
        ]);
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\Guard
     */
    public function guard()
    {
        return Auth::guard();
    }

    public function postEmail(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|exists:users',
        ]);
        
        
        $token = Str::random(60);

        DB::table('password_resets')->insert(
            ['email' => $request->email, 'token' => $token, 'created_at' => Carbon::now()]
        );

        Mail::send('emails.reset_password',['token' => $token], function($message) use ($request) {
                  $message->from('non-reply@greenfield.org');
                  $message->to($request->email);
                  $message->subject('Reset Password Notification');
               });
        return response()->json(['success' => 'We have e-mailed your password reset link!'], 200);
        
    }
    public function getPassword($token)
    {
        return view('reset-password', compact('token'));
    }
    public function updatePassword(Request $request)
    {
        $this->validate($request, [
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required'
        ]);
        $token = $request->token;
        $password_reset = DB::table('password_resets')->where('token', $token)->first();
        $email = $password_reset->email;
        
        User::where('email', $email)->update([
            'password' => bcrypt($request->password)
        ]);

        DB::table('password_resets')->where('token', $token)->delete();
        return redirect('/property-owner/password-updated');
    }
}
