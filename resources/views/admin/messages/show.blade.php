@extends('layouts.admin')

@section('content')
<div class="p-6">

    {{-- SUCCESS MESSAGE --}}
    @if(session('success'))
        <div class="mb-6 p-4 rounded-xl bg-green-100 text-green-800 border border-green-300
                    dark:bg-green-800 dark:text-green-100 dark:border-green-700 flex items-center gap-3">
            <i data-lucide="check-circle" class="w-6 h-6"></i>
            <span>{{ session('success') }}</span>
        </div>
    @endif

    <h2 class="text-2xl font-bold mb-6">Message Details</h2>

    {{-- Message Details --}}
    <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow">
        <p><strong>Name:</strong> {{ $contact->name }}</p>
        <p><strong>Email:</strong> {{ $contact->email }}</p>
        <p class="mt-4"><strong>Message:</strong></p>
        <p class="text-gray-700 dark:text-gray-300">{{ $contact->message }}</p>
    </div>

    <hr class="my-6">

    {{-- Conversation Box --}}
    <h3 class="text-xl font-semibold mb-4">Conversation with {{ $contact->name ?? 'Guest' }}</h3>

    <div class="max-w-3xl mx-auto bg-gray-50 dark:bg-gray-800 p-6 rounded-xl shadow flex flex-col gap-4">

        {{-- Messages Container --}}
        <div class="flex flex-col gap-4 max-h-[500px] overflow-y-auto p-2">
            @foreach($contact->messages()->latest()->get()->reverse() as $msg)
                @if($msg->sender_type == 'admin')
                    <div class="flex justify-end">
                        <div class="bg-sky-600 text-white px-4 py-2 rounded-xl max-w-xs break-words">
                            {{ $msg->message }}
                        </div>
                        <span class="ml-2 self-end text-xs text-gray-400">{{ $msg->created_at->format('d M, H:i') }}</span>
                    </div>
                @else
                    <div class="flex justify-start">
                        <div class="bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-white px-4 py-2 rounded-xl max-w-xs break-words">
                            {{ $msg->message }}
                        </div>
                        <span class="ml-2 self-end text-xs text-gray-400">{{ $msg->created_at->format('d M, H:i') }}</span>
                    </div>
                @endif
            @endforeach
        </div>

        {{-- Send Reply Form --}}
        <form action="{{ route('admin.messages.reply', $contact) }}" method="POST" class="mt-4 flex gap-2">
            @csrf
            <textarea name="reply" rows="2"
                class="flex-1 p-3 border rounded-xl bg-gray-100 dark:bg-gray-700 dark:text-white resize-none"
                placeholder="Type your reply..." required></textarea>
            <button type="submit" class="px-4 py-2 bg-sky-600 text-white rounded-xl hover:bg-sky-700">
                Send
            </button>
        </form>

    </div>
</div>

@endsection
