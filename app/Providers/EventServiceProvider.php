<?php

namespace App\Providers;

use App\Models\Product;
use App\Models\Order;
use App\Models\Contact;
use App\Observers\ProductObserver;
use App\Observers\OrderObserver;
use App\Observers\ContactObserver;
use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
        Order::observe(OrderObserver::class);
        Product::observe(ProductObserver::class);
        Contact::observe(ContactObserver::class);
    }
}
