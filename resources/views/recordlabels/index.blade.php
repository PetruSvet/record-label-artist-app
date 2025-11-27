<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Record Labels') }}
        </h2>
    </x-slot>

```
<x-alert-success />

<div class="py-12">
    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white shadow-md sm:rounded-lg p-6">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-2xl font-semibold text-gray-800">Record Labels</h3>
                @if(auth()->user()?->role === 'admin')
                    <a href="{{ route('recordlabels.create') }}"
                       class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded shadow">
                        Add New Label
                    </a>
                @endif
            </div>

            <div class="overflow-x-auto">
                <table class="min-w-full bg-white divide-y divide-gray-200">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Founded</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Headquarters</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Contact Number</th>
                            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>

                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse ($recordlabels as $label)
                            <tr class="hover:bg-gray-50 transition duration-150">
                                <td class="px-6 py-4 whitespace-nowrap text-gray-800 font-medium">{{ $label->name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-gray-600">{{ $label->founded ?? '-' }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-gray-600">{{ $label->headquarters ?? '-' }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-gray-600">{{ $label->phone_number ?? '-' }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-right flex gap-2 justify-end">
                                    <a href="{{ route('recordlabels.edit', $label) }}"
                                       class="bg-orange-300 hover:bg-orange-500 text-gray-800 py-1 px-3 rounded transition duration-150">
                                        Edit
                                    </a>

                                    <form action="{{ route('recordlabels.destroy', $label) }}" method="POST"
                                          onsubmit="return confirm('Are you sure you want to delete this record label?');">
                                        @csrf
                                        @method('DELETE')
                                        <button class="bg-red-500 hover:bg-red-700 text-white py-1 px-3 rounded transition duration-150">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="px-6 py-4 text-center text-gray-500">
                                    No record labels found.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
```

</x-app-layout>
