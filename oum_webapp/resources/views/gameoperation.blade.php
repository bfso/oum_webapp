<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Spielbetrieb') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                <a href="{{ route('gameoperation', ['league' => 'herrenA']) }}">Herren A</a>
                <a href="{{ route('gameoperation', ['league' => 'herrenB']) }}">Herren B</a>
                <a href="{{ route('gameoperation', ['league' => 'damen']) }}">Damen</a>
                <a href="{{ route('gameoperation', ['league' => 'junioren']) }}">Junioren</a>
                <a href="{{ route('gameoperation', ['league' => 'juniorenA']) }}">Junioren A</a>
                <a href="{{ route('gameoperation', ['league' => 'juniorenB']) }}">Junioren B</a>
                <a href="{{ route('gameoperation', ['league' => 'playoffs']) }}">Playoffs</a>
                <a href="{{ route('gameoperation', ['league' => 'cup']) }}">Cup</a>



    <!-- Weitere Liga-Links hier -->
</div>

@foreach ($data as $item)
    <!-- Hier zeigst du die Daten entsprechend an -->
@endforeach


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
