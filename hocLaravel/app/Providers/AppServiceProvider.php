<?php

namespace App\Providers;

use App\View\Components\Alert;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Pagination\Paginator;
// use App\View\Components\Inputs\Button;
// use App\View\Components\Form\Button as FormButton;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Blade::if('env', function ($value) {
            //Trả về giá trị Boolean
            if (config('app.env') === $value) {
                return true;
            }
            return false;
        });

        Blade::component('package-alert', Alert::class);
        // Blade::component('button', Button::class);
        // Blade::component('forms.button', FormButton::class);
        Paginator::useBootstrap();
    }
}
