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

include("includes/header.php");
include("includes/topbar.php");
?>
<link rel="stylesheet" href="style.css">


<div class=film-info>
    <div class="Titel-film">
        <p><?php echo $movieData["movie"]["title"]; ?></p>
    </div>
    <div class="content-wrapper">
        <div class="afbeelding-film"></div>
        <div class="information">
            <!-- <img src="img/ster.svg" alt="Film Poster" class="film-poster">
            <img src="img/ster_open.svg" alt="Film Poster" class="film-poster"> -->
            <div class="stars-container">
                <?php for ($i = 0; $i < $filledStars; $i++): ?>
                    <div class="star filled">
                        <svg viewBox="0 0 1920 1080" xmlns="http://www.w3.org/2000/svg">
                            <polygon class="star-shape" points="974.7,524.7 1007.4,530.4 983,552.9 987.6,585.8 958.7,569.5 928.9,584.1 935.4,551.5 912.3,527.7 
                            945.3,523.9 960.8,494.5"/>
                        </svg>
                    </div>
                <?php endfor; ?>

                <?php for ($i = 0; $i < $stars; $i++): ?>
                    <div class="star">
                        <svg viewBox="0 0 1920 1080" xmlns="http://www.w3.org/2000/svg">
                            <polygon class="star-shape" points="1101.7,524.7 1134.4,530.4 1110,552.9 1114.6,585.8 1085.7,569.5 1055.9,584.1 1062.4,551.5 
                            1039.3,527.7 1072.3,523.9 1087.8,494.5"/>
                        </svg>
                    </div>
                <?php endfor; ?>


            </div>
            <?php echo $movieData["movie"]["vote_average"]; ?> 
            <div class="status"><?php echo $movieData["movie"]["status"]; ?></div>
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