<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\User;
use App\Models\ConversationMessage;
use App\Notifications\AdminNewMessageNotification;
use Illuminate\Support\Facades\Notification;
class UserConversationController extends Controller
{
    public function index(Contact $contact)
    {
      
        $contact->messages()->where('sender_type', 'admin')->update(['is_read' => true]);

        $messages = $contact->messages()->latest()->get();

        return view('messages.chat', compact('contact', 'messages'));
    }

   
    public function sendMessage(Request $request, Contact $contact)
    {
        $request->validate([
            'message' => 'required|string',
        ]);

        $contact->messages()->create([
            'sender_type' => 'user',
            'message' => $request->message,
            'is_read' => false,
        ]);
  
        $admin = User::where('role', 'admin')->get();
        Notification::send($admin, new AdminNewMessageNotification($contact));


        return back()->with('success', 'Message sent successfully!');
    }

    
    public function chat(Contact $contact)
    {
        
        $messages = $contact->messages()->latest()->get();

        
        $contact->messages()->where('sender_type', 'admin')->update(['is_read' => true]);

        return view('messages.chat', compact('contact', 'messages'));
    }

}