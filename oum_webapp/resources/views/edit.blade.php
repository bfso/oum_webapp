<x-app-layout>
    <x-slot name="header">
        
    <link href='https://fonts.googleapis.com/css?family=Black+Ops+One|Luckiest+Guy|Sonsie+One|Shojumaru&effect=3d|3d-float|anaglyph|brick-sign|canvas-print|
            crackle|decaying|destruction|distressed|distressed-wood|emboss|fire|fire-animation|fragile|grass|ice|mitosis|neon|outline|putting-green|
            scuffed-steel|shadow-multiple|splintered|static|stonewash|vintage|wallpaper' 
            rel='stylesheet' type='text/css'>

<span class="font-effect-vintage" style="font-size:30px; font-family:Luckiest Guy;">Spieler hinzufügen</span><br>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!--Kategorien erstellen-->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <form method="POST" action="{{ route('admin.categories.store') }}">
                            @csrf

                            <div class="mb-3">
                                <label for="name" class="form-label">Kategorie Name</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Kategorie erstellen</button>

                            @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                            @endif

                            @if (session('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                            @endif

                        </form>

                    </div>
                </div>

            </div>

            <br>

            <!--Spieler erstellen-->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('admin.players.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="first_name" class="form-label">Vorname</label>
                            <input type="text" class="form-control" id="first_name" name="first_name" required>
                        </div>

                        <div class="mb-3">
                            <label for="last_name" class="form-label">Nachname</label>
                            <input type="text" class="form-control" id="last_name" name="last_name" required>
                        </div>

                        <div class="mb-3">
                            <label for="player_nr" class="form-label">Spieler Nr.</label>
                            <input type="number" class="form-control" id="player_nr" name="player_nr" required>
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">Bild</label>
                            <input type="file" class="form-control" id="image" name="image">
                        </div>

                        <div class="mb-3">
                            <label for="playing_for" class="form-label">Spielt für</label>
                            <select class="form-select" id="playing_for" name="playing_for" required>
                                <option value="">Bitte wählen</option>
                                @foreach($teams as $team)
                                    <option value="{{ $team->id }}">{{ $team->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Spieler erstellen</button>
                    </form>

                    </div>
                </div>

            </div>

            <br>

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <form method="POST" action="{{ route('admin.teams.store') }}">
                            @csrf

                            <div class="mb-3">
                                <label for="name" class="form-label">Teamname</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>

                            <div class="mb-3">
                                <label for="category_id" class="form-label">Kategorie</label>
                                <select class="form-select" id="category_id" name="category_id" required>
                                    <option value="">Bitte wählen</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary">Team hinzufügen</button>
                        </form>

                    </div>
                </div>

            </div>

            <br>


            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="p-6 text-gray-900 dark:text-gray-100">

                    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                            Teams verwalten
                            </h2>
                            <div class="mt-4">
                                <ul>
                                    @foreach($teams as $team)
                                    <li>{{ $team->name }} - Kategorie: {{ $team->category->name }}
                                        <form method="POST" action="{{ route('admin.teams.destroy', $team->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn2">Löschen</button>
                                        </form>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>

                    </div>
                </div>

            </div>

            <br>

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="p-6 text-gray-900 dark:text-gray-100">

                    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                            Kategorien verwalten
                        </h2>
                        <div class="mt-4">
                            <ul>
                                @foreach($categories as $category)
                                <li>{{ $category->name }}
                                    <form method="POST" action="{{ route('admin.categories.destroy', $category->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn2">Löschen</button>
                                    </form>
                                </li>
                                @endforeach
                            </ul>
                        </div>

                    </div>
                </div>

            </div>

            <br>

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="p-6 text-gray-900 dark:text-gray-100">

                    </div>
                </div>

            </div>

            <br>

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="p-6 text-gray-900 dark:text-gray-100">

                    </div>
                </div>

            </div>

        </div>
        <br>
                    <br>
                    <br>
                    <br>
                    <br>
  
                 

                </div>
                <footer>
        @include('layouts.footer')
    </footer>
            </div>
    
        </div>
 
    </div>
  
    </div>

    <style>
/* Füge diese Styles zum Anpassen des Formulars hinzu */
form {
    max-width: 400px;
    margin: 0;
}

/* Füge abgerundete Ecken zu den Buttons hinzu */
.btn {
    border-radius: 0.375rem;
    transition: background-color 0.3s, border-color 0.3s, transform 0.5s;
    background-color: #BF0404; 
    border-color: #ff3d00;
    color: #fff;
    padding: 0.5rem 1rem; /* Anpassung der Breite des Buttons */
}

/* Füge eine leichte Hervorhebungsanimation zu den Buttons hinzu */
.btn:hover {
    background-color: #A60303; 
    border-color: #590202;
    transform: scale(1.05);
}

.btn:active {
    background-color: #b71c1c; 
    border-color: #b71c1c;
    transform: scale(0.95); 
}

/* Füge eine leichte Eingabeanimation zu den Formularelementen hinzu */
.form-control,
.form-select {
    transition: border-color 0.3s, box-shadow 0.3s;
}

.form-control:focus,
.form-select:focus {
    border-color: #ff3d00; 
    box-shadow: 0 0 0 0.2rem rgba(255, 61, 0, 0.25); 
}

/* Style für Formular-Labels */
.form-label {
    display: block;
    margin-bottom: 0.5rem;
    color: #333; /* Textfarbe für Labels */
}

/* Style für Formular-Textfelder */
.form-control {
    width: 100%;
    padding: 0.5rem;
    border: 1px solid #ddd; /* Rahmfarbe für Textfelder */
    border-radius: 0.25rem;
    background-color: #fff; /* Hintergrundfarbe für Textfelder */
    color: #555; /* Textfarbe für Textfelder */
}

/* Style für Formular-Textfelder im Fokus */
.form-control:focus {
    border-color: #ff3d00; /* Rahmfarbe für Textfelder im Fokus */
    box-shadow: 0 0 0 0.2rem rgba(255, 61, 0, 0.25); /* Leichter Schatten für Textfelder im Fokus */
}

/* Positioniere die Formularelemente am linken Rand */
.mb-3 {
    margin-bottom: 1.5rem;
}

/* Stilisiere die Erfolgs- und Fehlermeldungen */
.alert {
    padding: 0.75rem 1.25rem;
    margin-bottom: 1rem;
    border-radius: 0.25rem;
}

.alert-success {
    color: #155724;
    background-color: #d4edda;
    border-color: #c3e6cb;
}

.alert-danger {
    color: #721c24;
    background-color: #f8d7da;
    border-color: #f5c6cb;
}

.btn2{
    border-radius: 0.375rem;
    transition: background-color 0.3s, border-color 0.3s, transform 0.5s;
    background-color: #BF0404; 
    border-color: #ff3d00;
    color: #fff;
    padding: 1px 1px; 
}




    </style>
</x-app-layout>
