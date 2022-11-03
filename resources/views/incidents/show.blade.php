<x-app-layout>
    <x-slot name="header">
        {{ __('Incidents') }}
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    Race: {{ $series->name }} - {{ $race->name }}<br/>
                    Date: {{ \Carbon\Carbon::parse($race->date)->setTimezone(auth()->user()->timezone)->format('F j, Y @ H:i') }}<br/>
                    Comment: {{ $incident->comment }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
