<?php

namespace App\Http\Controllers\acudientes;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Support\Facades\Password;//se agrego para que funcione metodo broker

use Carbon\Carbon;
use Mail; 
use Hash;
use Illuminate\Support\Str;
use DB;
use App\Models\Responsable;

class AcudienteForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

   // use SendsPasswordResetEmails;//retorna la vista email Send Password Reset Link
      //use toMail;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:acudiente');
    }

    /**
     * Display the form to request a password reset link.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLinkRequestForm()
    {
        //return view('acudientepassword.passwords.email');
    }






    public function sendResetLinkEmail(Request $request)
    {

        //custom send email from tutorial on the web

        // $request->validate(['email' => 'required|email|exists:responsable',]);

        // $token = Str::random(64);

        // DB::table('password_resets')->insert([
        //     'email' => $request->email, 
        //     'token' => $token, 
        //     'created_at' => Carbon::now()
        //   ]);

        // Mail::send('acudientepassword.forgetPassword', ['token' => $token], function($message) use($request){
        //     $message->to($request->email);
        //     $message->subject('Reset Password');
        // });

        // return back()->with('messagePassword', 'Hemos enviado un correo de restablecimiento de contraseña');


        //laravel  code  from document official
        // $status = Password::sendResetLink(
        //     $request->only('email')
        // );
     
        // return $status === Password::RESET_LINK_SENT
        //             ? back()->with(['status' => __($status)])
        //             : back()->withErrors(['email' => __($status)]);






    }





    // public function showResetForm($token) { 
    //     return view('acudientepassword.passwords.reset', ['token' => $token]);
    //  }


    



    //  public function reset(Request $request)
    //   {
    //       $request->validate([
    //           'email' => 'required|email|exists:users',
    //           'password' => 'required|string|min:6|confirmed',
    //           'password_confirmation' => 'required'
    //       ]);
  
    //       $updatePassword = DB::table('password_resets')
    //                           ->where([
    //                             'email' => $request->email, 
    //                             'token' => $request->token
    //                           ])
    //                           ->first();
  
    //       if(!$updatePassword){
    //           return back()->withInput()->with('error', 'Invalid token!');
    //       }
  
    //       $user = Responsable::where('email', $request->email)
    //                   ->update(['password' => Hash::make($request->password)]);
 
    //       DB::table('password_resets')->where(['email'=> $request->email])->delete();
  
    //       return redirect('/login')->with('infoContraseña', 'Your password has been changed!');
    //   }





    /**
     * Get the broker to be used during password reset.
     *
     * @return \Illuminate\Contracts\Auth\PasswordBroker
     */
    // public function broker()
    // {
    //     return Password::broker('acudiente');
    // }

    // /**
    //  * Get the guard to be used during password reset.
    //  *
    //  * @return \Illuminate\Contracts\Auth\StatefulGuard
    //  */
    // protected function guard()
    // {
    //     return Auth::guard('acudiente');
    // }
}
