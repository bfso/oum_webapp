<x-app-layout>
<x-slot name="header">
        <div id="header">
            <link href='https://fonts.googleapis.com/css?family=Black+Ops+One|Luckiest+Guy|Sonsie+One|Shojumaru&effect=3d|3d-float|anaglyph|brick-sign|canvas-print|
                crackle|decaying|destruction|distressed|distressed-wood|emboss|fire|fire-animation|fragile|grass|ice|mitosis|neon|outline|putting-green|
                scuffed-steel|shadow-multiple|splintered|static|stonewash|vintage|wallpaper' 
                rel='stylesheet' type='text/css'>
            <span class="font-effect-vintage" style="font-size:30px; font-family:Luckiest Guy;">Home</span><br>
        </div>
    </x-slot>
    
   
    <div class="logo-container">
        <svg class="logo" viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
          
            <circle class="letter" cx="50" cy="100" r="40"/>
           
            <rect class="letter" x="70" y="60" width="60" height="80" rx="15"/>
            
            <path class="letter" d="M140,60 L140,140 Q160,120 180,140 Q160,120 180,60"/>
        </svg>
    </div>

    
    <div class="subtitle-container">
        <h2 class="subtitle">Oberwalliser <span class="creative-font">Unihockey Meisterschaft</span></h2>
    </div>

  
  

    <div class="news-title">
        <h2>News:</h2>       
    </div>

   
    <div class="empty-fields">
        <div class="empty-field">Coming Soon</div>
        <div class="empty-field">Coming Soon</div>
        <div class="empty-field">Coming Soon</div>
     
    </div>

    <div class="empty-fields">
        <div class="empty-field">Coming Soon</div>
        <div class="empty-field">Coming Soon</div>
        <div class="empty-field">Coming Soon</div>
       
    </div>

 <br>
 <br>
 <br>

    <footer>
        <div>
            @include('layouts.footer')
        </div>
    </footer>

    <style>
      
        .logo-container {
            width: 100%;
            height: 50px; 
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 50px; 
        }

        .logo {
            width: 200px; 
            height: 200px; 
        }

        
        .letter {
            fill: transparent;
            stroke: #FF0000; 
            stroke-width: 8; 
            stroke-dasharray: 1000;
            stroke-dashoffset: 1000;
            animation: draw 2s ease-in-out forwards;
        }

        @keyframes draw {
            to {
                stroke-dashoffset: 0;
            }
        }

    
        .subtitle-container {
            text-align: center;
            margin-top: 20px;
        }

        .subtitle {
            font-size: 24px;
            font-weight: bold;
            color: #000000; 
        }

       
        .image-placeholder {
            width: 250px; 
            height: 250px; 
            background-color: #CCCCCC; /
            margin: 10px; 
            
        }

       
        .news-title {
            text-align: center;
            margin-top: 50px; 
        }

        .news-title h2 {
            font-size: 45px;
            font-weight: bold;
            color: #000000;
        }

        
        .empty-fields {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .empty-field {
            width: 250px; 
            height: 250px; 
            background-color: #CCCCCC; 
            margin: 10px; 
           
        }
       
                #header {
    border-bottom: 1px solid #ddd; 
    padding-bottom: 10px; 
}
        
    </style>
    
</x-app-layout>
