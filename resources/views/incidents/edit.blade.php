<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Request Incident Review') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <x-incident-form :incident="$incident" :races="$races" :drivers="$drivers" />
                </div>
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('incidents.destroy', $incident) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <input type="submit" value="Delete" onClick="return confirm('Delete record?');" />
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
