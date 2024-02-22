<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Spieler hinzufügen') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('players.store') }}" method="post">
                        @csrf

                        <div>
                            <label for="first_name" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Vorname:</label>
                            <input type="text" id="first_name" name="first_name" class="form-input rounded-md shadow-sm mt-1 block w-full" required>
                        </div>

                        <div class="mt-4">
                            <label for="last_name" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Nachname:</label>
                            <input type="text" id="last_name" name="last_name" class="form-input rounded-md shadow-sm mt-1 block w-full" required>
                        </div>

                        <div class="mt-4">
                            <label for="player_nr" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Spieler-Nr:</label>
                            <input type="text" id="player_nr" name="player_nr" class="form-input rounded-md shadow-sm mt-1 block w-full" required>
                        </div>

                        <div class="mt-4">
                            <label for="license_nr" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Lizenz-Nr:</label>
                            <input type="text" id="license_nr" name="license_nr" class="form-input rounded-md shadow-sm mt-1 block w-full" required>
                        </div>

                        <div class="mt-4">
                            <label for="img" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Bild (optional):</label>
                            <input type="file" id="img" name="img" class="form-input rounded-md shadow-sm mt-1 block w-full">
                        </div>

                        <div class="mt-4">
                            <label for="playing_for" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Spielt für:</label>
                            <select id="playing_for" name="playing_for" class="form-select rounded-md shadow-sm mt-1 block w-full" required>
                                <option value="">Bitte wählen</option>
                                <!-- Hier könntest du Teams aus deiner Datenbank abrufen und als Optionen anzeigen -->
                                @foreach ($teams as $team)
                                    <option value="{{ $team->id }}">{{ $team->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mt-4">
                            <input type="checkbox" id="presence" name="presence" class="form-checkbox rounded-md shadow-sm mt-1 block">
                            <label for="presence" class="font-medium text-sm text-gray-700 dark:text-gray-300">Anwesenheit</label>
                        </div>

                        <div class="mt-4">
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest shadow-sm hover:bg-blue-600 focus:outline-none focus:border-blue-700 focus:ring focus:ring-blue-200 disabled:opacity-25 transition">Spieler hinzufügen</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
