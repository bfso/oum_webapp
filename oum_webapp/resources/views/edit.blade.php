<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Spieler hinzufügen') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!--Kategorien erstellen-->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
<<<<<<< HEAD
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
=======
   
                <br>
                    <br>
                    <br>
                    <br>
                    
                    <br>
                    <br>
                    <br>
                    <br>
                    
                    <br>
                    <br>
                    <br>
                    <br>
                    
                    <br>
                    <br>
                    <br>
                    <br>
                    
                    <br>
                    <br>
                    <br>
                    <br>
>>>>>>> feature/20-navigationVerband
                </div>
                
            </div>

            <br>

            <!--Spieler erstellen-->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="" enctype="multipart/form-data">
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
                            <input type="text" class="form-control" id="player_nr" name="player_nr" required>
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
</x-app-layout>
