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
                    <!-- Liste der Links für verschiedene Ligen -->
                    <div class="flex space-x-4">
                        <a href="{{ route('gameoperation', ['league' => 'herrenA']) }}" class="text-blue-500 hover:text-blue-700">Herren A</a>
                        <a href="{{ route('gameoperation', ['league' => 'herrenB']) }}" class="text-blue-500 hover:text-blue-700">Herren B</a>
                        <!-- Weitere Links für andere Ligen hinzufügen -->
                    </div>

                    <!-- Anzeige der Daten für die ausgewählte Liga -->
                    <div class="mt-4">
                        @foreach ($data as $item)
                            <p>{{ $item->name }}</p>
                            <!-- Weitere Felder anzeigen, je nach Bedarf -->
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
