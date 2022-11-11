<?php

namespace App\Providers;

use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Fortify;

use App\Models\Docente;
use Illuminate\Support\Facades\Hash;//autenticacion manual opcional
use Laravel\Fortify\Features;
use DB;


class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
            // $prueba =    DB::table('docente')->where('email', request()->email)->exists();
            // dd($prueba);


            // if (DB::table('docente')->where('email', request()->email)->exists()) {
                
            //     $this->docenteConfig();
            // }else{
                
            //     $this->responsableConfig();
            // }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        
         if (DB::table('docente')->where('email', request()->email)->exists()) {
                
            $this->docenteSesionConfig();
            $this->docenteConfig();

        }else{
            
            $this->responsableSesionConfig();
            $this->responsableConfig();
        }
        


        

        //Fortify::createUsersUsing(CreateNewUser::class);
        Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
        Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);

        RateLimiter::for('login', function (Request $request) {
            $email = (string) $request->email;

            return Limit::perMinute(5)->by($email.$request->ip());
        });

        RateLimiter::for('two-factor', function (Request $request) {
            return Limit::perMinute(5)->by($request->session()->get('login.id'));
        });










    }






    // Register method---------------------------------------------------------------
    private function docenteConfig()
    {
        config(['fortify.features' => [
            Features::updateProfileInformation(),
            Features::resetPasswords(),
            Features::updatePasswords(),
            Features::twoFactorAuthentication([
                'confirm' => true,
                'confirmPassword' => true,
                // 'window' => 0,
            ]),


        ]]);

        //config(['fortify.prefix' => 'admin']);
        //config(['fortify.home' => '/admin/dashboard']);
        config(['fortify.redirects.login' => '/docentes/area']);
        config(['fortify.redirects.logout' => '/home']);
    }




    private function responsableConfig()
    {
        config(['fortify.features' => [
           // Features::registration(),
            //Features::emailVerification(),
            Features::updateProfileInformation(),
            Features::resetPasswords(),
            Features::updatePasswords(),
            Features::twoFactorAuthentication([
                'confirm' => true,
                'confirmPassword' => true,
                // 'window' => 0,
            ]),



        ]]);

        config(['fortify.guard' => 'acudiente']);
        //config(['fortify.prefix' => 'user']);
        //config(['fortify.home' => '/user/dashboard']);
        config(['fortify.passwords' => 'acudiente']);
        config(['fortify.redirects.login' => '/acudientes/area']);
        config(['fortify.redirects.logout' => '/home']);
    }



    //both method------------------------------------------------------------------------------------
    private function docenteSesionConfig()
    {
        //Fortify::createUsersUsing(CreateNewUser::class);
        

        Fortify::loginView('auth.login');
        Fortify::requestPasswordResetLinkView('auth.forgot-password');
        
        Fortify::resetPasswordView(function ($request) {
            return view('auth.resetPassword', ['request' => $request]);
        });




    }





    private function responsableSesionConfig()
    {
        //Fortify::createUsersUsing(CreateNewCustomer::class);
        Fortify::loginView('auth.login');
        //Fortify::registerView('customer.auth.register');
        //Fortify::verifyEmailView('customer.auth.verify-email');
        Fortify::requestPasswordResetLinkView('auth.forgot-password');
        Fortify::resetPasswordView(function ($request) {
            return view('auth.resetPassword', ['request' => $request]);
        });
    }











}
