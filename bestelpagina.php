<?php 
   include("includes/header.php");
   include("includes/topbar.php");
?>

<body>

<div id="groepbestelpagina">

   <div id="kbbestel">
      <h1>TICKETS BESTELLEN</h1>
   </div>
      
   <div id="bestelvlakken">
      <div id="witvlakbestel">
         
         <div id="filmselectie">
            <div id="filmtitel">FILMTITEL</div>

            <select class="datums">
                <option class="datum" selected hidden>DATUM</option>
                <option value="15/09">15/09</option>
                <option value="17/09">17/09</option>
                <option value="22/09">22/09</option>
                <option value="24/09">24/09</option>
            </select>

            <select class="tijdstip">
                <option class="tijdstip" selected hidden>TIJDSTIP</option>
                <option value="13:00">13:00</option>
                <option value="15:30">15:30</option>
                <option value="19:00">19:00</option>
                <option value="21:30">21:30</option>
            </select>

         </div>

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
                     <select class="aantal">
                        <option class="aantal" selected hidden>0</option>
                        <option value="aantal">1</option>
                        <option value="aantal">2</option>
                        <option value="aantal">3</option>
                        <option value="aantal">4</option>
                        <option value="aantal">5</option>
                        <option value="aantal">6</option>
                        <option value="aantal">7</option>
                        <option value="aantal">8</option>
                        <option value="aantal">9</option>
                     </select>

                     <select class="aantal">
                        <option class="aantal" selected hidden>0</option>
                        <option value="aantal">1</option>
                        <option value="aantal">2</option>
                        <option value="aantal">3</option>
                        <option value="aantal">4</option>
                        <option value="aantal">5</option>
                        <option value="aantal">6</option>
                        <option value="aantal">7</option>
                        <option value="aantal">8</option>
                        <option value="aantal">9</option>
                     </select>

                     <select class="aantal">
                        <option class="aantal" selected hidden>0</option>
                        <option value="aantal">1</option>
                        <option value="aantal">2</option>
                        <option value="aantal">3</option>
                        <option value="aantal">4</option>
                        <option value="aantal">5</option>
                        <option value="aantal">6</option>
                        <option value="aantal">7</option>
                        <option value="aantal">8</option>
                        <option value="aantal">9</option>
                     </select>
                  </div>
               </div>
            </div>
            <div id="lijn2"></div>

            <div id="vouchercode">VOUCHERCODE
            <form action="includes/InsertMovieScreening.php" method="POST">
               <input type="text" id="voucherbutton" placeholder="code">
               <input type="submit" value="Toevoegen" id="voucherknop">
            </form>
            </div>

         </div>

         <h3>STAP 2: KIES JE STOEL</h3>
         <div id="filmdoekmidden">
            <div id="lijn3"></div>
            <!-- <div id="filmdoek"></div> -->
            <h3>FILMDOEK</h3>
         </div>

         <div class="parent">
         <?php
            for($rij = 1; $rij<=10; $rij++){
               for($stoel = 1; $stoel <= 10; $stoel++){
                  echo '<div class="stoel" id="'.$rij.'-'.$stoel.'">'.$rij.'-'.$stoel.'</div>';
               }
            }
         ?>
         </div>

         <input type="text" id="stoelenkeuze" name="stoelen" value="leeg">
      </div>

      <div id="filmkeuze"></div>



   </div>
</div>
<script src="stoelselect.js"></script>
</body>


<?php 
   include("includes/footer.php");
?>