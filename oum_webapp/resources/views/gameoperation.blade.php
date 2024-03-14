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
                    <div class="flex space-x-4 mb-4">
                        @foreach($categories as $category)
                            <a href="{{ route('gameoperation', ['league' => $category]) }}" class="text-red-500 hover:text-red-700">{{ ucfirst($category) }}</a>
                        @endforeach
                    </div>
                    
                    @if(isset($teams))
                        <!-- Anzeige der Daten für die ausgewählte Liga -->
                        @if($teams->count() > 0)
                            <!-- Anzeige der Teams in einer Tabelle -->
                            <div class="overflow-x-auto">
                                <table class="w-full whitespace-nowrap rounded-lg overflow-hidden">
                                    <thead>
                                        <tr class="bg-customColor5">
                                            <th class="px-4 py-2 text-left">Rang</th>
                                            <th class="px-4 py-2 text-left">Team</th>
                                            <th class="px-4 py-2 text-left">Spiele</th>
                                            <th class="px-4 py-2 text-left">S</th>
                                            <th class="px-4 py-2 text-left">U</th>
                                            <th class="px-4 py-2 text-left">N</th>
                                            <th class="px-4 py-2 text-left">T</th>
                                            <th class="px-4 py-2 text-left">GT</th>
                                            <th class="px-4 py-2 text-left">TD</th>
                                            <th class="px-4 py-2 text-left">Punkte</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($teams as $index => $team)
                                            <tr class="bg-white dark:bg-gray-800 hover:bg-gray-200 dark:hover:bg-gray-600">
                                                <td class="px-4 py-2">{{ $index + 1 }}</td>
                                                <td class="px-4 py-2">{{ $team->name }}</td>
                                                <td class="px-4 py-2">{{ $team->games }}</td>
                                                <td class="px-4 py-2">{{ $team->wins }}</td>
                                                <td class="px-4 py-2">{{ $team->draws }}</td>
                                                <td class="px-4 py-2">{{ $team->loses }}</td>
                                                <td class="px-4 py-2">{{ $team->goals }}</td>
                                                <td class="px-4 py-2">{{ $team->goals_conceded }}</td>
                                                <td class="px-4 py-2">{{ $team->goal_difference }}</td>
                                                <td class="px-4 py-2">{{ $team->points }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <!-- Füge hier eine Nachricht ein, wenn keine Teams vorhanden sind -->
                            <p>Keine Teams gefunden.</p>
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
