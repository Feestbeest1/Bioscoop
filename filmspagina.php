<body>
    <?php 
   include("includes/header.php");
   include("includes/topbar.php");
?>

<div id="film-agendaContainer">

    <div class="row">
        <div class="column">
            <div id="Film-agenda-box">
        <div id="film-text">FILM AGENDA</div>
    </div>
    <div id="film-filter">
    <div class="row">
        <div id="icon">
            <div id="line"></div>
            <div id="line"></div>
            <div id="line"></div>
        </div>
        <div class="box">
            <label>
                <input type="radio" name="film-filter" id="week">
                FILMS
            </label>
        </div>
        <div class="box">
            <label>
                <input type="radio" name="film-filter" id="week">
                DEZE WEEK
            </label>
        </div>
        <div class="box">
            <label>
                <input type="radio" name="film-filter" id="vandaag">
                VANDAAG
            </label>
        </div>
        <label>
        <!-- <input type="radio" name="film-filter" id="categorie"> -->
        <select class="categorie-box">
            <option>CATEGORIE</option>
            <option>ACTIE</option>
            <option>AVONTUUR</option>
            <option>KOMEDIE</option>
            <option>FANTASIE</option>
            <option>DRAMA</option>
            <option>HORROR</option>
            <option>ROMANTIEK</option>
            <option>THRILLER</option>
        </select>
</label>
    </div>
        </div>
        <div class="column">
           
    </div>
</div>
</div>
    <div id="filmsContainer"></div>

    <script>
        const container = document.getElementById("filmsContainer");
        for (let i = 0; i < 24; i++) {
            const filmBox = document.createElement("div");
            filmBox.className = "film-box";
            container.appendChild(filmBox);
        }
        </script>
      </div>      
        </div>
    </div>

<?php 
   include 'footer.php';
?>
</body>
</html>

