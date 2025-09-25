<?php 
   include("includes/header.php");
   include("includes/topbar.php");
?>

<body>

    <div id="welkomsblokBox">
        <div id="welkomsblok">
            <h1>WELKOM BIJ ANNEXBIOS LEERDAM</h1>
            <h4>Lorem ipsum dolor sit amet, consecteueradipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient</h4>
            <button type="button">BEKIJK DE DRAAIENDE FILMS</button>
        </div>
    </div>

    <div id="contactblok">
        <div id="kaartblok">
            <div class="google-maps">
                <div id="googlemap"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2073.1366509940767!2d4.131755198645905!3d51.835593723766245!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c451c6f4434d53%3A0x20bb4b6bcdd57904!2sRijksstraatweg%2042%2C%203223%20KA%20Hellevoetsluis!5e0!3m2!1sen!2snl!4v1757590274827!5m2!1sen!2snl"
                    width="100%" height="220px" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>

                <div id="infoblok">
                <p><strong>📍 Techniekweg 6<br>4143 HV Leerdam</strong></p>
                <a href="tel:0345 - 637987"><p>📞 0345 - 637987</p></a>
                <a class="mail"href="mailto:bioscoopleerdam@gmail.com">Klanten service: biscoopleerdam@gmail.com</a>
                <p><strong>BEREIKBAARHEID</strong><br>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean commodo ligula eget dolor.</p>
                </div>
            </div>
            
            <div id="fotoblok">
                <img src="fonts/bioscoopfoto.png" alt="Bioscoop"/>
            </div>
        </div>
    </div>

   <?php 
   include 'filmagenda.php';
   ?>
</body>
</html>

<?php 
   include("includes/footer.php");
?>