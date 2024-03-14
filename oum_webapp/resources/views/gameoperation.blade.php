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
                        @foreach($categories as $category)
                            <a href="{{ route('gameoperation', ['league' => $category]) }}" class="text-blue-500 hover:text-blue-700">{{ ucfirst($category) }}</a>
                        @endforeach
                    </div>
                    
                    @if(isset($teams))
                        <!-- Anzeige der Daten für die ausgewählte Liga -->
                        @if($teams->count() > 0)
                            <!-- Anzeige der Teams in einer Tabelle -->
                            <div class="mt-4">
                                <table class="table-auto">
                                    <thead>
                                        <tr>
                                            <th>Rang</th>
                                            <th>Team</th>
                                            <th>Spiele</th>
                                            <th>S</th>
                                            <th>U</th>
                                            <th>N</th>
                                            <th>T</th>
                                            <th>GT</th>
                                            <th>TD</th>
                                            <th>Punkte</th>
                                            <!-- Weitere Spalten, falls benötigt -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($teams as $index => $team)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $team->name }}</td>
                                                <td>{{ $team->games }}</td>
                                                <td>{{ $team->wins }}</td>
                                                <td>{{ $team->draws }}</td>
                                                <td>{{ $team->loses }}</td>                                             
                                                <td>{{ $team->goals }}</td>
                                                <td>{{ $team->goals_conceded }}</td>
                                                <td>{{ $team->goal_difference }}</td>
                                                <td>{{ $team->points }}</td>
                                                <!-- Weitere Spalten, falls benötigt -->
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
