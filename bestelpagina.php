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
            

            <div>Normaal</div><br>
            <div>Kind t/m 11 jaar</div><br>
            <div>65 +</div>

            

            <div id="lijn2"></div>
         </div>


      </div>

      <div id="filmkeuze"></div>

      
   </div>
   
</div>

</body>


<?php 
   include("includes/footer.php");
?>