<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Mail\OtpEmail;
use App\Mail\authOtpEmail;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use function Symfony\Component\Mime\Header\all;


class AuthController extends Controller
{
    public function showRegistrationForm()
    {
        return view('frontend.modules.auth.register');
    }



    public function register(Request $request)
    {
        // Validation rules
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|string|max:15|min:11|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        // Create a new instance of the Customer model
        $customer = new Customer();
        $customer->name = $validatedData['name'];
        $customer->email = $validatedData['email'];
        $customer->phone = $validatedData['phone'];
        $customer->password = Hash::make($validatedData['password']);
        $customer->otp_code = rand(1000, 9999);

        $customer->save();
        
        Mail::to($customer->email)->send(new authOtpEmail($customer->otp_code));

        $encryptedEmail = encrypt($customer->email);

        return redirect()->route('auth.otp.verify', ['email' => urlencode($encryptedEmail)])

            ->with('success', 'নিবন্ধন সফল! OTP এর জন্য আপনার ইমেইল চেক করুন।');

    }


    public function showLoginForm(Request $request)
    {
    
        return view('frontend.modules.auth.login');
    }

    public function login(Request $request)
    {
        // Validate the request inputs
        $request->validate([
            'identifier' => 'required',
            'password' => 'required',
        ]);

        // Determine if the identifier is an email or phone number
        $field = filter_var($request->identifier, FILTER_VALIDATE_EMAIL) ? 'email' : 'phone';

        // Prepare the credentials array
        $credentials = [
            $field => $request->identifier,
            'password' => $request->password,
        ];

        // Check if 'remember' checkbox was selected
        $remember = $request->has('remember');

        // Attempt to log the user in
        if (Auth::attempt($credentials, $remember)) {

            return redirect()->intended(route('home'));
        }

        // If login fails, return back with an error message
        return back()->withErrors([
           'identifier' => 'প্রদত্ত তথ্য আমাদের রেকর্ডের সাথে মেলেনি',

        ])->withInput($request->only('identifier', 'remember'));
    }



    public function logout()
    {
        Auth::logout();

        return redirect()->route('login');
    }





}
