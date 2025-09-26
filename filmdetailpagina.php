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




$movieData['movie']['warnings'] = [
    [
        'name' => '12 jaar',
        'icon' => 'https://u240066.gluwebsite.nl/public/images/warnings-icons/12-jaar.png'
    ],
    [
        'name' => 'Geweld',
        'icon' => 'https://u240066.gluwebsite.nl/public/images/warnings-icons/geweld.png'
    ],
    [
        'name' => 'Angst',
        'icon' => 'https://u240066.gluwebsite.nl/public/images/warnings-icons/angst.png'
    ],
];





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
        <div class="kijkwijzer-container">
            <?php for ($x = 0; $x < count($movieData["movie"]["warnings"]); $x++) {
                ?>
                <img src="<?php echo $movieData["movie"]["warnings"][$x]['icon'] ?>"></img>
                <?php
            }?>
        </div>


        <div class="info-film">
            <div class="status">Released:&nbsp;<?php echo $movieData["movie"]["release_date"]; ?></div>
            <div class="beschrijving"><?php echo $movieData["movie"]["overview"]; ?></div>
            <div class="genre">Genre:
                <?php
                for ($x = 0; $x < count($movieData["movie"]["genres"]); $x++) {
                    echo $movieData["movie"]["genres"][$x]['name'];
                    if ($x < count($movieData["movie"]["genres"]) - 1) {
                        echo ', ';
                    }
                }
                ?>
            </div>
            <div class="film-lengte">Filmlengte:&nbsp;<?php echo $movieData["movie"]["runtime"]; ?>minutes</div>
            <div class="land">Land:&nbsp;<?php echo $movieData["movie"]["origin_country"][0];?></div>
            <div class="ratings">
                lmbd score: <?php echo number_format($movieData["movie"]["vote_average"], 1, '.', ''); ?>/10
            </div>
            <div class="regiseur">Regisseur:
                <?php
                echo implode(
                    ', ',
                    array_column($movieData["movie"]["directors"], 'name')
                );
                ?>
            </div>
        <div class="acteurs-container">
            <p class="titel">Acteurs:</p>
            <div class="acteurs-row">
            <?php
            for ($x = 0; $x < 4 && $x < count($movieData["movie"]["actors"]); $x++) {
                $actor = $movieData["movie"]["actors"][$x];
                ?>
                <div class="acteur">
                    <img src="https://image.tmdb.org/t/p/w500<?php echo $movieData["movie"]["actors"][$x]["profile_path"];?>"></img>
                    <p><?php echo htmlspecialchars($actor['name']);?></p>
                </div>
                <?php } ?>
            </div>
        </div>
      </div>
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