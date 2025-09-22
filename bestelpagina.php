<?php 
   include("includes/header.php");
   include("includes/topbar.php");
?>

<body>
    <div id="kopbalkbestel">TICKETS BESTELLEN</div>

    <div class="kies-je-ticket-container">

<h3 class="form-text">Stap 1: Kies je ticket</h3>

<table class="tickets">
  <thead>
    <tr>
      <th>Type</th>
      <th>Prijs</th>
      <th>Aantal</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>Normaal</td>
      <td>€9,00</td>
      <td><input type="number" min="0" value="0" /></td>
    </tr>
    <tr>
      <td>Kind t/m 11 jaar</td>
      <td>€5,00</td>
      <td><input type="number" min="0" value="0" /></td>
    </tr>
    <tr>
      <td>65 +</td>
      <td>€7,00</td>
      <td><input type="number" min="0" value="0" /></td>
    </tr>
  </tbody>
</table>

<div class="voucher">
  <label class="Voucher-text">Vouchercode</label>
  <input type="text" placeholder="Code" />
  <button>Toevoegen</button>
</div>

</div>


    <div class="bestelpagina">
    <p class="form-text">STAP 4: VUL JE GEGEVENS IN</p>

    <div id="form-input">
      <form action="bestelpagina.php" method="post">

        <div class="form-row">
          <input type="text" name="naam" placeholder="Achternaam" required class="form-half">
          <input type="text" name="voor_naam" placeholder="Voornaam" required class="form-half">
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


</body>

<?php 
   include("includes/footer.php");
?>