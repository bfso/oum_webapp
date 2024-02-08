<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="app.css">
</head>
<body>

<div class="bg-white sticky bottom-0 shadow footer">
    <div class="container mx-auto py-4 px-5">
        <table class="mx-auto">
            <tr>
                <!-- Erste Reihe -->
                <td class="text-center">
                    <p class="font-bold mb-2">Hauptsponsor 1</p>
                    <img src="{{ asset('img/conc.jpg') }}" class="img-fluid" alt="concordia" width="700px">
                </td>
                <td class="text-center">
                    <p class="font-bold mb-2">Hauptsponsor 2</p>
                    <img src="{{ asset('img/mob.png') }}" class="img-fluid ml-20" alt="mobiliar" width="700px">
                </td>
            </tr>
            <tr>
                <!-- Zweite Reihe -->
                <td class="text-center">
                    <p class="font-bold mb-2">Arxada</p>
                    <img src="{{ asset('img/arxada.png') }}" class="img-fluid ml-0" alt="Arxada" width="500">
                </td>
                <td class="text-center">
                    <p class="font-bold mb-2">Unihockey Center.ch</p>
                    <img src="{{ asset('img/unicnt.png') }}" class="img-fluid ml-5" alt="Bild Unihockey Center.ch" width="500">
                </td>
                <td class="text-center">
                    <p class="font-bold mb-2">WKB</p>
                    <img src="{{ asset('img/wkb.png') }}" class="img-fluid ml-10" alt="Bild WKB" width="500">
                </td>
                <td class="text-center">
                    <p class="font-bold mb-2">Lettermann</p>
                    <img src="{{ asset('img/lettermann.png') }}" class="img-fluid ml-20" alt="lettermann" width="500" >
                </td>
            </tr>
        </table>
    </div>
</div>

</body>
</html>
