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
            <h2>
            <option>CATEGORIE</option>
            <option>ACTION</option>
            <option>ADVENTURE</option>
            <option>ANIMATION</option>
            <option>COMEDY</option>
            <option>CRIME</option>
            <option>DOCUMENTARY</option>
</h2>
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
        for (let i = 0; i < 12; i++) {
            const filmBox = document.createElement("div");
            filmBox.className = "film-box";
            container.appendChild(filmBox);

        
        }

        window.addEventListener("load", getData);

        function getData(){
        const key= "9sJ6NKPiWw3qHmr2sZZwUNmhfDjsWfsP6A9wWfn2";
        const url = `https://u240066.gluwebsite.nl/api/movies?api_key=${key}`;

        fetch(url)
        .then((raw) => raw.json()) 
        .then((data) => {
        console.log(data.data);

        show(data.data);
    });
}

        function show(data) {
        const filmBoxes = document.querySelectorAll(".film-box");
        
        for(let i = 0; i < filmBoxes.length && i < data.length; i++){
        
        const box = filmBoxes[i];
        
        const title = data[i].movie.title;
        const poster = data[i].movie.poster_path;
        const overview = data[i].movie.overview;
        const vote = data[i].movie.vote_average;
        const release = data[i].movie.release_date;

        
        //foto
        const image= document.createElement("IMG");
        image.src = `https://image.tmdb.org/t/p/w500/${poster}`;
        // image.width= 100;
        image.alt = title;
        image.id = "poster-image";
        box.appendChild(image);
        
         //titel
        const titel= document.createElement("h1");
        titel.textContent = title;
        box.appendChild(titel);


         //release
        const date= document.createElement("p");
        date.textContent = release;
        box.appendChild(date);
        
        //overview
        const over= document.createElement("p");
        over.textContent = overview;
        box.appendChild(over);

        // const infoButton = document.createElement("div");
        //     infoButton.className = "info-knop";
        //     infoButton.textContent = "MEER INFO & TICKETS";

        // box.appendChild(infoButton);

        }

};

        </script>
      </div>      
        </div>
    </div>
    <div id="button-row">
        <a href="filmspagina.php" id="bekijk-knop">BEKIJK ALLE FILMS</a>
    </div>
