<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Contact;
use App\Models\ConversationMessage;
use Illuminate\Support\Facades\Auth;

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
         view()->composer('*', function ($view) {
        if (Auth::check()) {
            $contact = Contact::where('user_id', Auth::id())->first();
            $unreadCount = 0;

            if ($contact) {
                $unreadCount = ConversationMessage::where('contact_id', $contact->id)
                    ->where('sender_type', 'admin')
                    ->where('is_read', false)
                    ->count();
            }

            $view->with('unreadMessages', $unreadCount);
        }
    });
    }
}
