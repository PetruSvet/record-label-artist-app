@props(['action', 'method', 'artist', 'labels'])

<form action="{{ $action }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if($method === 'PUT' || $method === 'PATCH')
        @method($method)
    @endif

    {{-- Artist Name --}}
    <div class="mb-4">
        <label for="name" class="block text-sm font-medium text-gray-700">Artist Name</label>
        <input type="text" name="name" id="name"
               value="{{ old('name', $artist->name ?? '') }}" required
               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"/>
        @error('name')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    {{-- Genre --}}
    <div class="mb-4">
        <label for="genre" class="block text-sm font-medium text-gray-700">Genre</label>
        <input type="text" name="genre" id="genre"
               value="{{ old('genre', $artist->genre ?? '') }}" required
               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"/>
        @error('genre')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    {{-- Debut Year --}}
    <div class="mb-4">
        <label for="debut_year" class="block text-sm font-medium text-gray-700">Debut Year</label>
        <input type="number" name="debut_year" id="debut_year"
               value="{{ old('debut_year', $artist->debut_year ?? '') }}" required
               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"/>
        @error('debut_year')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    {{-- Social Media Handle --}}
    <div class="mb-4">
        <label for="social_media_handle" class="block text-sm font-medium text-gray-700">Social Media Handle</label>
        <input type="text" name="social_media_handle" id="social_media_handle"
               value="{{ old('social_media_handle', $artist->social_media_handle ?? '') }}"
               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"/>
        @error('social_media_handle')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    {{-- Description --}}
    <div class="mb-4">
        <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
        <textarea name="description" id="description" rows="4"
                  class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">{{ old('description', $artist->description ?? '') }}</textarea>
        @error('description')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    {{-- Embed Video --}}
    <div class="mb-4">
        <label for="embed" class="block text-sm font-medium text-gray-700">
            YouTube Embed URL <br>
            <span class="text-xs text-gray-500">
                Must include <strong>embed</strong> instead of watch.<br>
                Example: https://www.youtube.com/embed?v=czLQoG01PFs
            </span>
        </label>
        <input type="text" name="embed" id="embed"
               value="{{ old('embed', $artist->embed ?? '') }}"
               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"/>
        @error('embed')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    {{-- Profile Picture --}}
    <div class="mb-4">
        <label for="profile_picture" class="block text-sm font-medium text-gray-700">Profile Picture</label>
        <input type="file" name="profile_picture" id="profile_picture"
               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"/>
        @error('profile_picture')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    {{-- Existing Image --}}
    @isset($artist->profile_picture)
        <div class="mb-4">
            <img src="{{ asset('images/artists/' . $artist->profile_picture) }}"
                 alt="{{ $artist->name }}" class="w-24 h-24 object-cover rounded-full">
        </div>
    @endisset

    {{-- Record Label --}}
    <div class="mb-4">
    <label for="recordlabels" class="block text-sm font-medium text-gray-700">Record Labels</label>
    <select name="recordlabels[]" id="recordlabels" multiple
            class="border p-2 w-full rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
        @foreach($labels as $label)
            <option value="{{ $label->id }}"
                @if(isset($artist) && $artist->recordlabels->contains($label->id)) selected @endif>
                {{ $label->name }}
            </option>
        @endforeach
    </select>
    @error('recordlabels')
        <p class="text-sm text-red-600">{{ $message }}</p>
    @enderror
</div>


    {{-- Submit --}}
    <div>
        <x-primary-button>
            {{ isset($artist) ? 'Update Artist' : 'Add Artist' }}
        </x-primary-button>
    </div>

</form>
