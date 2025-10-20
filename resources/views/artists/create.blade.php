<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create New Artist') }}
        </h2>
    </x-slot>

    <div class="container mx-auto px-4 py-8">
        <x-artist-form :action="route('artists.store')" method="POST" />
    </div>
</x-app-layout>
