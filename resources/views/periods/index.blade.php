<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">My Tracker</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            {{-- Stats row --}}
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                <div class="bg-white rounded-xl shadow-sm p-5 border-l-4 border-pink-500">
                    <p class="text-xs font-semibold text-gray-400 uppercase tracking-wide">Total Cycles</p>
                    <p class="text-3xl font-bold text-pink-600 mt-1">{{ $periods->count() }}</p>
                </div>
                <div class="bg-white rounded-xl shadow-sm p-5 border-l-4 border-purple-400">
                    <p class="text-xs font-semibold text-gray-400 uppercase tracking-wide">Last Start</p>
                    <p class="text-3xl font-bold text-purple-600 mt-1">
                        {{ $periods->first() ? $periods->first()->start_date->format('M d') : '—' }}
                    </p>
                </div>
                <div class="bg-white rounded-xl shadow-sm p-5 border-l-4 border-rose-400">
                    <p class="text-xs font-semibold text-gray-400 uppercase tracking-wide">Status</p>
                    <p class="text-3xl font-bold text-rose-500 mt-1">
                        {{ ($periods->first() && !$periods->first()->end_date) ? 'Active' : 'Inactive' }}
                    </p>
                </div>
            </div>

            {{-- Table card --}}
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-xl">
                <div class="p-6">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-lg font-semibold text-gray-700">Cycle History</h3>
                        <a href="{{ route('periods.create') }}"
                            class="bg-pink-600 hover:bg-pink-700 text-white text-sm font-medium px-4 py-2 rounded-lg shadow-sm transition">
                            + Log New Cycle
                        </a>
                    </div>

                    @if (session('status'))
                        <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg mb-5 text-sm">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="overflow-x-auto">
                        <table class="w-full text-sm text-left">
                            <thead>
                                <tr class="bg-gray-50 text-gray-500 uppercase text-xs tracking-wider">
                                    <th class="px-4 py-3 rounded-tl-lg">Start Date</th>
                                    <th class="px-4 py-3">End Date</th>
                                    <th class="px-4 py-3">Duration</th>
                                    <th class="px-4 py-3">Symptoms</th>
                                    <th class="px-4 py-3 rounded-tr-lg">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100">
                                @forelse ($periods as $period)
                                    <tr class="hover:bg-pink-50 transition-colors">
                                        <td class="px-4 py-3 font-medium text-gray-800">
                                            {{ $period->start_date->format('M d, Y') }}
                                        </td>
                                        <td class="px-4 py-3 text-gray-600">
                                            @if ($period->end_date)
                                                {{ $period->end_date->format('M d, Y') }}
                                            @else
                                                <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-rose-100 text-rose-700">
                                                    Ongoing
                                                </span>
                                            @endif
                                        </td>
                                        <td class="px-4 py-3 text-gray-600">
                                            @if ($period->end_date)
                                                {{ $period->start_date->diffInDays($period->end_date) + 1 }} days
                                            @else
                                                —
                                            @endif
                                        </td>
                                        <td class="px-4 py-3 text-gray-600">
                                            {{ $period->symptoms ?? '—' }}
                                        </td>
                                        <td class="px-4 py-3">
                                            <div class="flex items-center space-x-3">
                                                <a href="{{ route('periods.edit', $period) }}"
                                                    class="text-pink-600 hover:text-pink-800 font-medium hover:underline">Edit</a>
                                                <form action="{{ route('periods.destroy', $period) }}" method="POST"
                                                    onsubmit="return confirm('Delete this cycle log?');">
                                                    @csrf @method('DELETE')
                                                    <button type="submit"
                                                        class="text-red-500 hover:text-red-700 font-medium hover:underline">Delete</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="px-4 py-10 text-center text-gray-400">
                                            <p class="text-4xl mb-2">🌸</p>
                                            <p class="font-medium">No cycles logged yet.</p>
                                            <p class="text-sm mt-1">Click "Log New Cycle" to start tracking.</p>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
