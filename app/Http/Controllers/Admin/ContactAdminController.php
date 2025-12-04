<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Notifications\NewMessageReplyNotification;
use Illuminate\Support\Facades\Notification;
class ContactAdminController extends Controller
{
    public function index()
    {
        $messages = Contact::latest()->paginate(10);
        return view('admin.messages.index', compact('messages'));
    }

    public function show(Contact $contact)
    {
        return view('admin.messages.show', compact('contact'));
    }

public function reply(Request $request, Contact $contact)
{
    $request->validate([
        'reply' => 'required|string',
    ]);

   
    $contact->messages()->create([
        'sender_type' => 'admin',
        'message' => $request->reply,
        'is_read' => false, 
    ]);

   
    $contact->update([
        'status' => 'replied',
    ]);

   
    if ($contact->user) {
        Notification::send($contact->user, new NewMessageReplyNotification($contact));
    }

    return back()->with('success', 'Reply sent successfully!');
}


}