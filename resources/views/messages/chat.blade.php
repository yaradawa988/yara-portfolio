@extends('layouts.app')

@section('title', 'Conversation')

@section('content')
<div class="max-w-3xl mx-auto py-8">

    <h1 class="text-2xl font-bold mb-6 text-slate-800 dark:text-white">
        Conversation with Eng-Yara
    </h1>

  
    <div id="chatBox"
         class="flex flex-col space-y-4 max-h-96 overflow-y-auto p-4 
                bg-gray-100 dark:bg-gray-900 rounded-xl border border-gray-300 dark:border-gray-700">

        @foreach($messages->reverse() as $msg) 
      
        
            @if($msg->sender_type == 'admin')
                {{-- Admin message --}}
                <div class="flex items-start gap-3">
                    <div class="w-10 h-10 flex items-center justify-center rounded-full bg-sky-600 text-white">
                        <i data-lucide="shield"></i>
                    </div>

                    <div>
                        <div class="px-4 py-2 rounded-xl bg-sky-200 dark:bg-sky-700 text-slate-900 dark:text-white">
                            {{ $msg->message }}
                        </div>
                        <span class="text-xs text-gray-500 dark:text-gray-400">
                            {{ $msg->created_at->format('d M, H:i') }}
                        </span>
                    </div>
                </div>

            @else
                {{-- User message --}}
                <div class="flex items-start gap-3 justify-end text-right">
                    
                    <div>
                        <div class="px-4 py-2 rounded-xl bg-gray-300 dark:bg-gray-800 text-slate-900 dark:text-white">
                            {{ $msg->message }}
                        </div>
                        <span class="text-xs text-gray-500 dark:text-gray-400 block">
                            {{ $msg->created_at->format('d M, H:i') }}
                        </span>
                    </div>

                    <div class="w-10 h-10 flex items-center justify-center rounded-full bg-gray-400 dark:bg-gray-600 text-white">
                        <i data-lucide="user"></i>
                    </div>
                </div>
            @endif

        @endforeach
    </div>

    {{-- Send Message --}}
    <form action="{{ route('messages.chat.send', $contact->id) }}" 
          method="POST" 
          class="mt-4 flex gap-2">

        @csrf
        <input type="text" name="message" required
               class="flex-1 rounded-xl px-4 py-2 border border-gray-300 dark:border-gray-700 
                      dark:bg-gray-800 dark:text-white focus:outline-none focus:ring-2 focus:ring-sky-500"
               placeholder="Type your message...">

        <button type="submit" 
                class="px-4 py-2 bg-sky-600 text-white rounded-xl hover:bg-sky-700 flex items-center gap-1">
            <i data-lucide="send"></i> Send
        </button>
    </form>
</div>

{{-- Auto scroll to bottom --}}
<script>
    const chatBox = document.getElementById('chatBox');
    chatBox.scrollTop = chatBox.scrollHeight;
</script>

@endsection
