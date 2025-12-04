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
    <h2 class="text-2xl font-bold mb-6">Messages</h2>

    <table class="w-full border border-gray-300 dark:border-gray-700">
        <thead>
            <tr class="bg-gray-100 dark:bg-gray-800">
                <th class="p-3">Name</th>
                <th class="p-3">Email</th>
                <th class="p-3">Status</th>
                <th class="p-3"></th>
            </tr>
        </thead>

        <tbody>
            @foreach($messages as $msg)
                <tr class="border-t dark:border-gray-700">
                    <td class="p-3">{{ $msg->name }}</td>
                    <td class="p-3">{{ $msg->email }}</td>
                    <td class="p-3">
                        @if($msg->status == 'pending')
                            <span class="text-yellow-600">Pending</span>
                        @else
                            <span class="text-green-600">Replied</span>
                        @endif
                    </td>
                    <td class="p-3">
                        <a href="{{ route('admin.messages.show', $msg) }}"
                           class="text-sky-600 dark:text-sky-400">View</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-4">
        {{ $messages->links() }}
    </div>

</div>
@endsection
