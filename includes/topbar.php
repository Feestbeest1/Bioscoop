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

$movieNamesData = $data['data'];
?>

<header>
    <div class="logo">
        <a href="https://annexbiosleerdam.gluwebsite.nl/" class="overlay-button"></a>
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
        <a href="https://annexbiosleerdam.gluwebsite.nl//filmspagina.php">FILM AGENDA</a>
        <a href="https://u240066.gluwebsite.nl/">ALLE VESTIGINGEN</a>
        <a href="index.php#contactblok">CONTACT</a>
    </div>


    <div class=stroke>
        <ul>
            <li>
                <p class="text-header">KOOP JE TICKETS:</p>
            </li>
            <li> <select class="films">
                    <option value="">Kies je film</option>

                    <?php foreach ($movieNamesData as $film) {?>
                        <option value="<?php echo $film["first_upcoming_screening_id"]; ?>">
                            <?php echo htmlspecialchars($film["title"]); ?>
                        </option>
                    <?php
                    }
                    ?>
                </select></li>
            <li><a onclick="goToFilm()" class="bestel-tickets">BESTEL TICKETS</a></li>
        </ul>
    </div>
    <script>
        function goToFilm() {
            const selectMovieElement = document.querySelector('select.films');
            const movieId = selectMovieElement.value;
            if (movieId) {
                window.location.href = "https://annexbiosleerdam.gluwebsite.nl/bestelpagina.php?id=" + movieId;
            }
        }
        </script>
            <br><br>
        </header>

