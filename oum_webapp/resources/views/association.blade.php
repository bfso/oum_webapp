<x-app-layout>
    <x-slot name="header">
              
<link href='https://fonts.googleapis.com/css?family=Black+Ops+One|Luckiest+Guy|Sonsie+One|Shojumaru&effect=3d|3d-float|anaglyph|brick-sign|canvas-print|
            crackle|decaying|destruction|distressed|distressed-wood|emboss|fire|fire-animation|fragile|grass|ice|mitosis|neon|outline|putting-green|
            scuffed-steel|shadow-multiple|splintered|static|stonewash|vintage|wallpaper' 
            rel='stylesheet' type='text/css'>

<span class="font-effect-vintage" style="font-size:30px; font-family:Luckiest Guy;">Verband</span><br>
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


    <style>
        
    </style>
</x-app-layout>
