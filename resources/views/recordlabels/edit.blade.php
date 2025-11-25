<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Record Label') }}
        </h2>
    </x-slot>

    <x-alert-success />

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-md sm:rounded-lg p-6">
                <form action="{{ route('recordlabels.update', $recordlabel) }}" method="POST" class="space-y-4">
                    @csrf
                    @method('PUT')

                    <div>
                        <label for="name" class="block text-gray-700 font-medium mb-1">Label Name</label>
                        <input type="text" name="name" id="name" value="{{ old('name', $recordlabel->name) }}"
                               class="w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                               required>
                        @error('name')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <label for="founded" class="block text-gray-700 font-medium mb-1">Founded</label>
                        <input type="text" name="founded" id="founded" value="{{ old('founded', $recordlabel->founded) }}"
                               class="w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                        @error('founded')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <label for="headquarters" class="block text-gray-700 font-medium mb-1">Headquarters</label>
                        <input type="text" name="headquarters" id="headquarters" value="{{ old('headquarters', $recordlabel->headquarters) }}"
                               class="w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                        @error('headquarters')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <label for="phone_number" class="block text-gray-700 font-medium mb-1">Phone Number</label>
                        <input type="text" name="phone_number" id="phone_number" value="{{ old('phone_number', $recordlabel->phone_number) }}"
                               class="w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                        @error('phone_number')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <button type="submit"
                            class="bg-orange-500 hover:bg-orange-600 text-white font-semibold py-2 px-4 rounded shadow">
                        Update Label
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
