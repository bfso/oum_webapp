<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Verband') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                <x-nav-link :href="route('history')" :active="request()->routeIs('history')">
                        {{ __('Geschichte') }}
                    </x-nav-link>
                    <x-nav-link :href="route('referee')" :active="request()->routeIs('referee')">
                        {{ __('Schiedsrichter') }}
                    </x-nav-link>
                    <x-nav-link :href="route('associationmember')" :active="request()->routeIs('associationmember')">
                        {{ __('Verbandsmitglieder') }}
                    </x-nav-link>
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

                </div>
            </div>
        </div>
        <footer>
    </div>
    @include('layouts.footer')
    </footer>
</x-app-layout>
