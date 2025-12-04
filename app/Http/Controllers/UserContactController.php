<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Notifications\AdminNewMessageNotification;
use Illuminate\Support\Facades\Notification;
use App\Models\User;

class UserContactController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email',
            'message' => 'required|string',
        ]);

        $contact = Contact::create([
            'name'    => $request->name,
            'email'   => $request->email,
            'message' => $request->message,
            'user_id' => auth()->id() ?? null
        ]);

        // ارسال إشعار للمدير
        $admin = User::where('role', 'admin')->get();
        Notification::send($admin, new AdminNewMessageNotification($contact));

        return back()->with('success', 'Your message has been sent successfully!');
    }
}
