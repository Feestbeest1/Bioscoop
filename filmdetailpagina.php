<?php
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

if($data['status'] !== "success") {
    exit("Er is iets misgegaan met de API");
}

$movieData = $data['data']; 

curl_close($ch);


$filledStars = round($movieData["movie"]["vote_average"] / 2);
$stars = 5 - $filledStars;
$totalStars = 5;

include("includes/header.php");
include("includes/topbar.php");
?>
<link rel="stylesheet" href="style.css">


<div class=film-info>
    <div class="Titel-film">
        <p><?php echo $movieData["movie"]["title"]; ?></p>
    </div>
    <div class="content-wrapper">
      <div class="afbeelding-film">
        <img src="https://image.tmdb.org/t/p/w500<?php echo $movieData["movie"]["poster_path"]; ?>"></img>
      </div>
        <div class="information">
            <div class="stars-container">
                <?php for ($i = 0; $i < $totalStars; $i++): ?>
                    <?php if ($i < $filledStars): ?>
                        <div class="star-filled">
                            <img src="sterretje.svg" alt="Filled Star">
                    </div>
                    <?php else: ?>
                        <div class="star-notfilled">
                            <img src="sterretje-leeg.svg" alt="Empty Star">
                    </div>
                    <?php endif; ?>
                <?php endfor; ?>
            </div>
            <div class="status">Released:&nbsp;<?php echo $movieData["movie"]["status"]; ?></div>
    </div>
</div>

    <a href="bestelpagina.php" class="buy-button">KOOP JE TICKETS</a>
    <div class="trailer">
        <iframe
            src="<?php echo preg_replace('/watch\?v=/', 'embed/', $movieData["movie"]["trailer_url"]); ?>"
            frameborder="0"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
            allowfullscreen>
        </iframe>
    </div>

<?php
   include("includes/footer.php");
?>