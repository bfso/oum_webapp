<x-app-layout>
<head>

        
<div class="containerMitglieder">
  <a class="btn btn-1">Blacknosesheep</a>
  <a class="btn btn-1">Fletschi Cracks</a>
  <a class="btn btn-1">KTV Glis</a>
  <a class="btn btn-1">Muskel Katers Naters</a>
  <a class="btn btn-1">Narvik Guards</a>
  <a class="btn btn-1">Piratas Valesia</a>
  <a class="btn btn-1">STV Baltschieder</a>
  <a class="btn btn-1">TSV Bitsch</a>
  <p></p>
  <p></p>
  <p></p>
  <a class="btn btn-1">UHC Bürchen</a>
  <a class="btn btn-1">UHC Embd Devils</a>
  <a class="btn btn-1">UHC Green Vipers</a>
  <a class="btn btn-1">UHC Ibex Grächen</a>
  <a class="btn btn-1">UHC Naters-Brig</a>
  <a class="btn btn-1">UHC Pfynland</a>
  <a class="btn btn-1">UHC Susten</a>
  <a class="btn btn-1">UHC Traktor Glis</a>

</div>

</head>
<footer>
    <div>
    @include('layouts.footer')
    </div>
    </footer>
    </x-app-layout>


<style>
        /* <- Demo Stuff Start */



.containerMitglieder {
  display: flex; /* Flexbox-Container */
  flex-wrap: wrap; /* Umbruch, wenn nicht genug Platz vorhanden ist */
  justify-content: center; /* Zentriert die Flex-Elemente horizontal */
  align-items: center; /* Zentriert die Flex-Elemente vertikal */
  width: 57vw; /* Breite des Containers */
  margin: 120px auto; /* oberer und unterer Abstand */
  height: 40vh;
}

.btn {
  margin: 10px;
  padding: 30px;
  text-align: center;
  text-transform: uppercase;
  transition: 0.5s;
  background-size: 200% auto;
  color: white;
  box-shadow: 0 0 20px #eee;
  border-radius: 25px;
  flex: 1 0 200px; /* Jeder Button bekommt eine feste Breite von 200px */
}

.btn:hover {
  background-position: right center; /* change the direction of the change here */
}

.btn-1 {
  background-image: linear-gradient(to right, #BF0404 0%,  #590202 51%, #f8514f 100%);
}
</style>