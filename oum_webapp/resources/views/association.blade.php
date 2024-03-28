<x-app-layout>
    <x-slot name="header">
        <div id="header">
            <link href='https://fonts.googleapis.com/css?family=Black+Ops+One|Luckiest+Guy|Sonsie+One|Shojumaru&effect=3d|3d-float|anaglyph|brick-sign|canvas-print|
                crackle|decaying|destruction|distressed|distressed-wood|emboss|fire|fire-animation|fragile|grass|ice|mitosis|neon|outline|putting-green|
                scuffed-steel|shadow-multiple|splintered|static|stonewash|vintage|wallpaper' 
                rel='stylesheet' type='text/css'>
            <span class="font-effect-vintage" style="font-size:30px; font-family:Luckiest Guy;">Verband</span><br>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100" style="display: flex; justify-content: center;">

<x-nav-link class="btn btn-1" :href="route('history')" :active="request()->routeIs('history')">
    {{ __('Geschichte') }}
</x-nav-link>
<x-nav-link class="btn btn-1" :href="route('referee')" :active="request()->routeIs('referee')">
    {{ __('Schiedsrichter') }}
</x-nav-link>
<x-nav-link class="btn btn-1" :href="route('associationmember')" :active="request()->routeIs('associationmember')">
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

</div>

            </div>
        </div>
        <footer>
    </div>
    @include('layouts.footer')
    </footer>


    <style>



.btn {
  margin: 10px;
  padding: 30px;
  text-align: center;
  text-transform: uppercase;
  transition: 0.5s;
  background-size: 200% auto;
  color: white;
  font-size: 20px;
  box-shadow: 0 0 20px #eee;
  border-radius: 25px;
  flex: 1 0 200px; /* Jeder Button bekommt eine feste Breite von 200px */
}

.btn:hover {
  background-position: right center; /* change the direction of the change here */
}

.btn-1 {
  background-image: linear-gradient(to right, #BF0404 0%,  #590202 51%, #f8514f 100%);
  width: 315px;
  padding: 40px;
  
  margin: 35px;
}
    #header {
    border-bottom: 1px solid #ddd; 
    padding-bottom: 10px; 
}
        
    </style>
</x-app-layout>
