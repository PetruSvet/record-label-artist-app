<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Record Labels') }}
        </h2>
    </x-slot>

    <x-alert-success>
        {{ session('success') }}
    </x-alert-success>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">

                <h3 class="font-semibold text-lg mb-4">List of Record Labels</h3>

                <table class="w-full border-collapse">
                    <thead>
                        <tr class="border-b">
                            <th class="text-left p-3">Name</th>
                            <th class="text-left p-3">Founded</th>
                            <th class="p-3">Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($recordlabels as $label)
                            <tr class="border-b">
                                <td class="p-3">{{ $label->name }}</td>
                                <td class="p-3">{{ $label->founded }}</td>

                                <td class="p-3 flex gap-2">
                                    <a href="{{ route('recordlabels.edit', $label) }}"
                                       class="bg-orange-300 hover:bg-orange-500 text-gray-700 py-1 px-3 rounded">
                                        Edit
                                    </a>

                                    <form action="{{ route('recordlabels.destroy', $label) }}" method="POST"
                                          onsubmit="return confirm('Delete this record label?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="bg-red-500 hover:bg-red-700 text-white py-1 px-3 rounded">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>

            </div>
        </div>
    </div>
</x-app-layout>
