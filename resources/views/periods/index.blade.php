<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('My Tracker') }}</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                <a href="{{ route('periods.create') }}"
                    class="bg-pink-600 hover:bg-pink-700 text-white px-4 py-2 rounded mb-6 inline-block transition">Log
                    New Cycle</a>

                @if (session('status'))
                    <div class="bg-green-100 text-green-800 p-3 rounded mb-4">{{ session('status') }}</div>
                @endif

                <table class="w-full text-left border-collapse mt-4">
                    <thead>
                        <tr class="bg-gray-50">
                            <th class="border-b p-3">Start Date</th>
                            <th class="border-b p-3">End Date</th>
                            <th class="border-b p-3">Symptoms</th>
                            <th class="border-b p-3">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($periods as $period)
                            <tr class="hover:bg-gray-50">
                                <td class="border-b p-3">{{ $period->start_date->format('M d, Y') }}</td>
                                <td class="border-b p-3">
                                    {{ $period->end_date ? $period->end_date->format('M d, Y') : 'Ongoing' }}</td>
                                <td class="border-b p-3">{{ $period->symptoms }}</td>
                                <td class="border-b p-3 flex space-x-3">
                                    <a href="{{ route('periods.edit', $period) }}"
                                        class="text-blue-600 hover:underline">Edit</a>
                                    <form action="{{ route('periods.destroy', $period) }}" method="POST"
                                        onsubmit="return confirm('Delete this cycle log?');">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:underline">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center p-4 text-gray-500">No cycles logged yet. Click above to
                                    start tracking!</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>