<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="app.css">
</head>
<body>

<div class="bg-white sticky bottom-0 shadow footer">
    <div class="container mx-auto py-4 px-5">
        <table class="mx-auto">
            <tr>
                <!-- Erste Reihe -->
                <td class="text-center" style="padding-bottom: 20px;">
                    <img src="{{ asset('img/conc.jpg') }}" class="img-fluid mb-2" alt="concordia" style="width: 400px; height: auto; margin-right: 100px;">
                </td>
                <td class="text-center" style="padding-bottom: 20px;">
                    <img src="{{ asset('img/mob.png') }}" class="img-fluid mb-2" alt="mobiliar" style="width: 400px; height: auto;">
                </td>
            </tr>
            <tr>
                <!-- Zweite Reihe -->
                <td class="text-center" style="padding-top: 10px;">
                    <img src="{{ asset('img/arxada.png') }}" class="img-fluid mb-2" alt="Arxada" style="width: 250px; height: auto; margin-right: 0px;">
                </td>
                <td class="text-center" style="padding-top: 10px;">
                    <img src="{{ asset('img/unicnt.png') }}" class="img-fluid mb-2" alt="Bild Unihockey Center.ch" style="width: 250px; height: auto; margin-right: 100px;">
                </td>
                <td class="text-center" style="padding-top: 10px;">
                    <img src="{{ asset('img/wkb.png') }}" class="img-fluid mb-2" alt="Bild WKB" style="width: 250px; height: auto; margin-right: 20px; margin-right: 100px;">
                </td>
                <td class="text-center" style="padding-top: 10px;">
                    <img src="{{ asset('img/lettermann.png') }}" class="img-fluid mb-2" alt="Bild 7" style="width: 250px; height: auto; margin-right: 0px; ">
                </td>
            </tr>
        </table>
    </div>
</div>

</body>
</html>
