<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Log New Cycle') }}</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('periods.store') }}" method="POST" class="space-y-4">
                    @csrf
                    <div>
                        <label class="block text-gray-700 font-bold mb-2">Start Date *</label>
                        <input type="date" name="start_date" required
                            class="w-full border-gray-300 rounded-md shadow-sm" value="{{ old('start_date') }}">
                        @error('start_date') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label class="block text-gray-700 font-bold mb-2">End Date (Optional)</label>
                        <input type="date" name="end_date" class="w-full border-gray-300 rounded-md shadow-sm"
                            value="{{ old('end_date') }}">
                        @error('end_date') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label class="block text-gray-700 font-bold mb-2">Symptoms</label>
                        <input type="text" name="symptoms" placeholder="e.g. Cramps, Headache"
                            class="w-full border-gray-300 rounded-md shadow-sm" value="{{ old('symptoms') }}">
                    </div>
                    <div>
                        <label class="block text-gray-700 font-bold mb-2">Notes</label>
                        <textarea name="notes" rows="4"
                            class="w-full border-gray-300 rounded-md shadow-sm">{{ old('notes') }}</textarea>
                    </div>
                    <div class="flex items-center space-x-4">
                        <button type="submit"
                            class="bg-pink-600 text-white px-4 py-2 rounded shadow hover:bg-pink-700">Save Log</button>
                        <a href="{{ route('periods.index') }}" class="text-gray-600 hover:underline">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>