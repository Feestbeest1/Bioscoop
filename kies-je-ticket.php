<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Document</title>
</head>
<body>

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

  
</body>
</html>