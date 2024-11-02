<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\Accommodation;
use App\Models\Company;
use App\Models\Product;
use App\Models\ProductType;
use App\Policies\AccommodationPolicy;
use App\Policies\CompanyPolicy;
use App\Policies\ProductPolicy;
use App\Policies\ProductTypePolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Product::class => ProductPolicy::class,
        Accommodation::class => AccommodationPolicy::class,
        Company::class => CompanyPolicy::class,
        ProductType::class => ProductTypePolicy::class,


    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
    }
}
