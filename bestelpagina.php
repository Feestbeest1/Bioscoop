<?php

include("includes/header.php");
include("includes/topbar.php");

if (!isset($_GET['id'])) {
   exit("not a valid id");
}

// Haal filmdata op uit API
$ch = curl_init("https://u240066.gluwebsite.nl/api/movie/" . $_GET['id']);
curl_setopt($ch, CURLOPT_HTTPHEADER, ["X-API-KEY: 9sJ6NKPiWw3qHmr2sZZwUNmhfDjsWfsP6A9wWfn2", "Content-Type: application/json"]);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);

if (curl_errno($ch)) {
   exit("Er is iets misgegaan met de API");
}

$data = json_decode($response, true);
$movieData = $data['data'];
curl_close($ch);

$movieId = $movieData['cinema']['movie_id'];

// Haal dates op uit API
$ch = curl_init("https://u240066.gluwebsite.nl/api/movie/" . $movieId . "/dates");
curl_setopt($ch, CURLOPT_HTTPHEADER, ["X-API-KEY: 9sJ6NKPiWw3qHmr2sZZwUNmhfDjsWfsP6A9wWfn2", "Content-Type: application/json"]);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);

if (curl_errno($ch)) {
   exit("Er is iets misgegaan met de API");
}

$data = json_decode($response, true);
$movieDates = $data['data'];

// echo "<pre>";
// print_r($movieDates);
// echo "</pre>";

// $start_time = $movieData['cinema']['start_time'];
// $temp = explode(" ", $start_time);
// $date = $temp[0];
// $time = substr($temp[1],0,5);
// //echo $time;

curl_close($ch);


$ch = curl_init("https://u240066.gluwebsite.nl/api/movie/" . $_GET['id']);

curl_setopt($ch, CURLOPT_HTTPHEADER, [
   "X-API-KEY: 9sJ6NKPiWw3qHmr2sZZwUNmhfDjsWfsP6A9wWfn2",
   "Content-Type: application/json"
]);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);

if (curl_errno($ch)) {
   exit("Er is iets misgegaan met de API");
}

$data = json_decode($response, true);

if ($data['status'] !== "success") {
   exit("Er is iets misgegaan met de API");
}

$movieData = $data['data'];

curl_close($ch);

$filledStars = round($movieData["movie"]["vote_average"] / 2);
$stars = 5 - $filledStars;
$totalStars = 5;



?>

<body>


   <div id="groepbestelpagina">


      <div id="kbbestel">
         <h1>TICKETS BESTELLEN</h1>
      </div>

      <div id="bestelvlakken">
         <div id="witvlakbestel">

            <div id="filmselectie">


               <div id="titelbox">
                  <h2><?php echo $movieData["movie"]["title"]; ?></h2>
               </div>

               <!-- </div> -->

               <select class="datums">
                  <option value="" class="datum" selected hidden>DATUM</option>
                  <?php
                  for ($i = 0; $i < count($movieDates); $i++) {
                     $date = $movieDates[$i]['date'];
                     echo "<option value=" . $date . ">" . $date . "</option>";
                  }
                  ?>
               </select>

               <select class="tijdstip">
                  <option value="" class="tijdstip" selected hidden>TIJDSTIP</option>
               </select>
            </div>



            <!-- </div> -->

            <h3>STAP 1: KIES JE TICKET</h3>


            <div id="ticketinfolinks">

               <div id="ticketinforechts">
                  <div>TYPE</div>
                  <div id="tekstenTicket">
                     <p>PRIJS</p>
                     <div>AANTAL</div>
                  </div>
               </div>



               <div id="lijn1"></div>


               <div id="ticketBox">

                  <div id=TicketOpties>
                     <div>Normaal</div><br>
                     <div>Kind t/m 11 jaar</div><br>
                     <div>65 +</div>
                  </div>

                  <div id="ticketoptiebox">
                     <div id="ticketprijzen">
                        <div>€9,00</div>
                        <div>€5,00</div>
                        <div>€7,00</div>
                     </div>


                     <div id="ticketboxaantallen">
                        <input type="number" class="aantal" name="aantal">
                        <input type="number" class="aantal" name="aantal">
                        <input type="number" class="aantal" name="aantal">
                     </div>

                  </div>
               </div>
            </div>

            <div id="lijn2">h</div>
            <!-- </div> -->

            <div id="vouchercode">
               <p>VOUCHERCODE</p>
               <form action="includes/InsertMovieScreening.php" method="POST">

                  <input type="text" id="voucherbutton" placeholder="code">

                  <input type="submit" value="Toevoegen" id="voucherknop">
               </form>
            </div>



            <h3>STAP 2: KIES JE STOEL</h3>
            <div id="filmdoekmidden">
               <div id="lijn3"></div>
               <!-- <div id="filmdoek"></div> -->
               <h3>FILMDOEK</h3>
            </div>

            <div class="parent">
               <?php
               for ($rij = 1; $rij <= 10; $rij++) {
                  for ($stoel = 1; $stoel <= 10; $stoel++) {
                     echo '<div class="stoel" id="' . $rij . '-' . $stoel . '">' . $rij . '-' . $stoel . '</div>';
                  }
               }
               ?>
            </div>


            <!-- </div> -->



            <div id="stoelmogelijkheden">
               <div id="vrijstoel">VRIJ</div>
               <div id="bezetstoel">BEZET</div>
               <div id="joustoel">JOUW SELECTIE</div>
            </div>


         <script>


         </script>

         <div id="kopbalkbestel">TICKETS BESTELLEN</div>



         <h3>STAP 3: CONTROLEER JE BESTELLING</h3>
         <div class="container-controle">
            <div class="posterding">
               <img src="https://image.tmdb.org/t/p/w500<?php echo $movieData["movie"]["poster_path"]; ?>">
            </div>
            <div class="tekstding">
               <p><?php echo $movieData["movie"]["title"]; ?></p>
               <div class="kijkwijzer-container">
                  <?php for ($x = 0; $x < count($movieData["movie"]["warnings"]); $x++) {
                  ?>
                     <img src="<?php echo $movieData["movie"]["warnings"][$x]['icon'] ?>"></img>
                  <?php
                  } ?>
                  <div class="controle-bestelling-container">
                     <div class="zaal-info">Bioscoop: Leerdam (Zaal<?php echo $movieData['cinema']['auditorium_number']; ?>)</div>
                     <div class="start-time">Wanneer:<?php echo $movieData['cinema']['start_time']; ?></div>
                     <div class="stoelen-keuze">Stoelen: <span></span></div>
                     <div class="ticket-aantal">Tickets: <span></span></div>
                     <div class="totaal-aantal">Totaal <span class="count"></span> ticket: &#8364;<span class="price"></span></div>
                     <?php

                     // foreach ($movieData['cinema']['prices'] as $p) {
                     //    $slug = strtolower(strtok($p['name'], ' '));
                     //    $aantal = $tickets[$slug] ?? 0;
                     //    $totaal += $aantal * (float)$p['amount'];
                     // }
                     ?>
                  </div>
               </div>
            </div>
         </div>
      </div>


      <div id="filmkeuze">
         <div class="kleine-image-container">
            <img class="kleine_image" src="https://image.tmdb.org/t/p/w500<?php echo $movieData["movie"]["poster_path"]; ?>">
            <div id="filmkeuze">


                  <div class="informatie-film-bestelpagina">
                     <p class="kleine-image-titel"><?php echo $movieData["movie"]["title"]; ?></p>

                     <div class="kleine-image-stars">
                        <?php for ($i = 0; $i < $totalStars; $i++): ?>
                           <?php if ($i < $filledStars): ?>
                              <div class="star-filled">
                                 <img src="img/sterretje.svg" alt="Filled Star">
                              </div>
                           <?php else: ?>
                              <div class="star-notfilled">
                                 <img src="img/sterretje-leeg.svg" alt="Empty Star">
                              </div>
                           <?php endif; ?>
                        <?php endfor; ?>
                     </div>

                     <div class="kleine-image-release">Released:&nbsp;<?php echo $movieData["movie"]["release_date"]; ?></div>


                     <div class="kleine-image-text"><?php echo $movieData["movie"]["overview"]; ?></div>



                  </div>
               </div>
            </div>
                           </div>





         </div>

                           </div>



      <div class="bestelpagina">
         <p class="form-text">STAP 4: VUL JE GEGEVENS IN</p>

         <div id="form-input">
            <form action="bestelpagina.php" method="post">
               <div class="naam-grid-container">
                  <div class="naam-grid">
                     <input type="text" name="naam" placeholder="Achternaam" required>
                     <input type="text" name="voor_naam" placeholder="Voornaam" required>
                  </div>
               </div>
               <div class="form-row">
                  <input type="email" name="email" placeholder="E-mail" required class="form-full">
               </div>

               <div class="form-row">
                  <input type="email" name="email_2" placeholder="E-mail" required class="form-full">
               </div>

               <p class="form-text">STAP 5: KIES JE BETAALWIJZE</p>

               <!-- payment options -->
               <div class="card-select-row">
                  <label class="card-option">
                     <input type="radio" name="card_type" value="visa" required>
                     <img src="img/nationale_bioscoop_bon.png" alt="Visa" class="card-img">
                  </label>
                  <label class="card-option">
                     <input type="radio" name="card_type" value="mastercard">
                     <img src="img/maestro.png" alt="Mastercard" class="card-img">
                  </label>
                  <label class="card-option">
                     <input type="radio" name="card_type" value="amex">
                     <img src="img/ideal.png" alt="Amex" class="card-img">
                  </label>
               </div>
               <!-- end payment options -->

               <!-- voorwaarden block now separate -->
               <div class="voorwaarden-container">
                  <div class="form-row checkbox-row" style="align-items:center;">
                     <input type="checkbox" id="voorwaarden" name="voorwaarden" required style="margin-right:8px;">
                     <label for="voorwaarden" style="margin:0;">
                        Ik accepteer de <a href="#" target="_blank">algemene voorwaarden</a>
                     </label>
                  </div>

                  <div class="form-row">

                  </div>
               </div>

            </form>
         </div>
      </div>




      <input type="submit" value="AFREKENEN" class="afrekenen-button">





   </div>

</body>
<script>
   const movieId = <?php echo $movieId ?>;
   const datumsElement = document.querySelector('select.datums');
   const tijdElement = document.querySelector('select.tijdstip');

   datumsElement.addEventListener('change', changeTimes);

   function changeTimes() {
      const selectedDatum = datumsElement.value;

      if (selectedDatum === "") {
         return;
      }

      fetch(`https://u240066.gluwebsite.nl/api/movie/${movieId}/${selectedDatum}/times?api_key=9sJ6NKPiWw3qHmr2sZZwUNmhfDjsWfsP6A9wWfn2`)
         .then((response) => response.json())
         .then((data) => {
            tijdElement.innerHTML = '';

            if (data.status != 'success') {
               console.log('Er is een fout opgetreden');
               return;
            }

            const times = data.data;

            times.forEach(timeData => {
               const optionElement = document.createElement('option');
               const splittedTime = timeData.time.split(':');
               optionElement.value = timeData.movie_screening_id;
               optionElement.innerHTML = splittedTime[0] + ':' + splittedTime[1];

               tijdElement.appendChild(optionElement);
            });
         });
   }


   changeTimes();
</script>

<script src="script.js"></script>

<?php
include("includes/footer.php");
?>