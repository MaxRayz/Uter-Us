<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Edit Cycle</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-xl p-8">

                <form action="{{ route('periods.update', $period) }}" method="POST" class="space-y-6">
                    @csrf @method('PUT')

                    <div>
                        <label for="start_date" class="block text-sm font-medium text-gray-700 mb-1">Start Date <span class="text-rose-500">*</span></label>
                        <input type="date" id="start_date" name="start_date" required
                            value="{{ old('start_date', $period->start_date->format('Y-m-d')) }}"
                            class="w-full rounded-lg border-gray-300 shadow-sm focus:border-pink-500 focus:ring-pink-500 text-sm">
                        @error('start_date')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="end_date" class="block text-sm font-medium text-gray-700 mb-1">End Date <span class="text-gray-400 font-normal">(optional)</span></label>
                        <input type="date" id="end_date" name="end_date"
                            value="{{ old('end_date', $period->end_date ? $period->end_date->format('Y-m-d') : '') }}"
                            class="w-full rounded-lg border-gray-300 shadow-sm focus:border-pink-500 focus:ring-pink-500 text-sm">
                        @error('end_date')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="symptoms" class="block text-sm font-medium text-gray-700 mb-1">Symptoms</label>
                        <input type="text" id="symptoms" name="symptoms"
                            value="{{ old('symptoms', $period->symptoms) }}"
                            class="w-full rounded-lg border-gray-300 shadow-sm focus:border-pink-500 focus:ring-pink-500 text-sm">
                    </div>

                    <div>
                        <label for="notes" class="block text-sm font-medium text-gray-700 mb-1">Notes</label>
                        <textarea id="notes" name="notes" rows="4"
                            class="w-full rounded-lg border-gray-300 shadow-sm focus:border-pink-500 focus:ring-pink-500 text-sm">{{ old('notes', $period->notes) }}</textarea>
                    </div>

                    <div class="flex items-center gap-4 pt-2">
                        <button type="submit"
                            class="bg-pink-600 hover:bg-pink-700 text-white font-medium px-6 py-2.5 rounded-lg shadow-sm transition text-sm">
                            Update Log
                        </button>
                        <a href="{{ route('periods.index') }}"
                            class="text-sm text-gray-500 hover:text-gray-700 hover:underline">Cancel</a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
