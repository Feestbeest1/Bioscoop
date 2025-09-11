<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Bioscoop</title>
</head>
<body>
    <header>

        <div class="logo">
            <img src="assets/logo/logo_hoofd.png" alt="Logo" width="200px">
        <div class="streep">
            <p>|</p>
        </div>
        <div class="bioscoop-naam">
            <p>Hellevoetsluis</p>
        </div>
        </div>

    <div class="button-container">
        <button>FILM AGENDA</button>
        <button>ALLE VESTIGINGEN</button>
        <button>CONTACT</button>
    </div> 


    <div class=stroke>
            <ul>
            <li><a href="#" class="text-header">KOOP JE TICKETS</a></li>
            <li></li>

            <select class="films">
                <option class="kies-je-film" selected hidden>Kies je film</option>
                <option value="volvo">Volvo</option>
                <option value="saab">Saab</option>
                <option value="opel">Opel</option>
                <option value="audi">Audi</option>
            </select>

            <li><a href="#" class="bestel-tickets">BESTEL TICKETS</a></li>

        </ul>
        </div>
        <br><br>
    </header>

    <div id="film-agendaContainer">

    <div class="row">
        <div class="column">
            <div id="Film-agenda-box">
        <div id="film-text">FILM AGENDA</div>
    </div>
    <div id="film-filter">
    <div class="row">
        <i class="material-icons">icon</i>
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
        <div class="box">
            <label>
                <input type="radio" name="film-filter" id="categorie">
                CATEGORIE
                <img src="assets/icons/arrow_dropdown.svg" id="arrow">
            </label>
        </div>
    </div>
        </div>
        <div class="column"></div>
    </div>
</div>
</div>
            
        </div>
    </div>

</body>
</html>