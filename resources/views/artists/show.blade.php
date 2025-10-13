<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-x1 text-gray-800 leading tight">
            {{ __('All Books') }}
        </h2>
</x-slot>

    <div class="container mx-auto px-4 py-8">
        <x-artist-card 
            :name="$artist->name" 
            :genre="$artist->genre" 
            :debut_year="$artist->debut_year" 
            :social_media_handle="$artist->social_media_handle" 
            :profile_picture="$artist->profile_picture"
            :description="$artist->description"
        />
    </div>
</x-layouts.app>