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
                                            <th>Name</th>
                                            <th>Punkte</th>
                                            <th>Tordifferenz</th>

                                            <!-- Weitere Spalten, falls benötigt -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($teams as $team)
                                            <tr>
                                                <td>{{ $team->name }}</td>
                                                <td>{{ $team->points }}</td>
                                                <td>{{ $team->goal_difference }}</td>

                                                <!-- Weitere Spalten, falls benötigt -->
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            
                        @endif 
                    @endif


                    </div>
                    

                  
                </div>
            </div>
        </div>
    </div>
    <footer>
    <div>
    @include('layouts.footer')
    </div>
    </footer>

    <style>
        #header {
    border-bottom: 1px solid #ddd; 
    padding-bottom: 10px; 
}
    </style>
</x-app-layout>
