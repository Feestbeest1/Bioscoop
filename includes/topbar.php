<?php
$ch = curl_init("https://u240066.gluwebsite.nl/api/movies/names");

curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "X-API-KEY: 9sJ6NKPiWw3qHmr2sZZwUNmhfDjsWfsP6A9wWfn2",
    "Content-Type: application/json"
]);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);

if (curl_errno($ch)) {
    exit("Er is iets misgegaan met de API: " . curl_error($ch));
}

curl_close($ch);

$data = json_decode($response, true);

if ($data === null) {
    exit("JSON kon niet worden gedecodeerd: " . json_last_error_msg());
}

if ($data['status'] !== "success") {
    exit("Er is iets misgegaan met de API");
}

$movieData = $data['data'];
?>

<header>
    <div class="logo">
        <a href="http://localhost/Bioscoop" class="overlay-button"></a>
        <img src="img/logo.jpeg" alt="logo">
        <div class="logonaam">
            <p>AnnexBios</p>
            <img src="img/filmrol.jpeg" alt="filmrol">
        </div>
        <div class="streep">
            <p>|</p>
        </div>
        <div class="bioscoop-naam">
            <p>Leerdam</p>
        </div>
    </div>

    <div class="button-container">
        <a href="http://localhost/Bioscoop/bestelpagina.php">FILM AGENDA</a>
        <a>ALLE VESTIGINGEN</a>
        <a>CONTACT</a>
    </div>


    <div class=stroke>
        <ul>
            <li>
                <p class="text-header">KOOP JE TICKETS:</p>
            </li>
            <li> <select class="films" onchange="goToFilm(this)">
                    <option value="">Kies je film</option>

                    <?php foreach ($movieData as $film) {?>
                        <option value="<?php echo $film["first_upcoming_screening_id"]; ?>">
                            <?php echo htmlspecialchars($film["title"]); ?>
                        </option>
                    <?php
                    }
                    ?>
                </select></li>
            <li><a href="http://localhost/Bioscoop/bestelpagina.php" class="bestel-tickets">BESTEL TICKETS</a></li>
        </ul>
    </div>
    <script>
        function goToFilm(selectElement) {
            const movieId = selectElement.value;
            if (movieId) {
                window.location.href = "http://localhost/Bioscoop/filmdetailpagina.php?id=" + encodeURIComponent(movieId);
            }
        }
        </script>
            <br><br>
        </header>

