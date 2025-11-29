<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">Create Artist</h2>
    </x-slot>

    <x-alert-success />

    <div class="py-12 max-w-4xl mx-auto">
        <x-artist-form :action="route('artists.store')" method="POST" :artist="null" :labels="$labels" />
    </div>
</x-app-layout>
