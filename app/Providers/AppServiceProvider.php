<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Faz o registro do Componente 'alerta' (criado na pasta 'view.components.alerta')
        // Dessa forma, posso chamar o compontente 'alerta' em qualquer view derivada do blade
        Blade::component('components.alerta', 'alerta'); // "alerta" é um apelido escolhido para esse componente 
        
    }
}
