<x-app-layout>
    <x-slot name="header">
        <div id="header">
            <link href='https://fonts.googleapis.com/css?family=Black+Ops+One|Luckiest+Guy|Sonsie+One|Shojumaru&effect=3d|3d-float|anaglyph|brick-sign|canvas-print|
                crackle|decaying|destruction|distressed|distressed-wood|emboss|fire|fire-animation|fragile|grass|ice|mitosis|neon|outline|putting-green|
                scuffed-steel|shadow-multiple|splintered|static|stonewash|vintage|wallpaper' 
                rel='stylesheet' type='text/css'>
            <span class="font-effect-vintage" style="font-size:30px; font-family:Luckiest Guy;">Spielbetrieb</span><br>
        </div>
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
                                            <th class="px-4 py-2">Rang</th>
                                            <th class="px-4 py-2">Team</th>
                                            <th class="px-4 py-2">Spiele</th>
                                            <th class="px-4 py-2">S</th>
                                            <th class="px-4 py-2">U</th>
                                            <th class="px-4 py-3">N</th>
                                            <th class="px-4 py-2">T</th>
                                            <th class="px-4 py-2">GT</th>
                                            <th class="px-4 py-2">TD</th>
                                            <th class="px-4 py-2">Punkte</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($teams as $index => $team)
                                        <tr class="bg-gray-100 @if (!$loop->last) border-b border-gray-300 @endif">
                                            <td class="px-4 py-2 text-center">{{ $index + 1 }}</td>
                                            <td class="px-4 py-2 text-center">{{ $team->name }}</td>
                                            <td class="px-4 py-2 text-center">{{ $team->games }}</td>
                                            <td class="px-4 py-2 text-center">{{ $team->wins }}</td>
                                            <td class="px-4 py-2 text-center">{{ $team->draws }}</td>
                                            <td class="px-4 py-2 text-center">{{ $team->loses }}</td>
                                            <td class="px-4 py-2 text-center">{{ $team->goals }}</td>
                                            <td class="px-4 py-2 text-center">{{ $team->goals_conceded }}</td>
                                            <td class="px-4 py-2 text-center">{{ $team->goal_difference }}</td>
                                            <td class="px-4 py-2 font-semibold text-center">{{ $team->points }}</td>
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

    <style>
        .border-b {
    border-bottom-width: 1px;
    border-bottom-style: solid;
}

    </style>
</x-app-layout>
