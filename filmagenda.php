
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
        
       <label>
        <!-- <input type="radio" name="film-filter" id="categorie"> -->
        <div class="box">
            <label>
                <input type="radio" name="film-filter" id="week">
                FILMS
            </label>
</div>
</h2>
        </select>
</label>
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
            <option value="" selected>CATEGORIE</option>
            <option value="28">ACTION</option>
            <option value="12">ADVENTURE</option>
            <option value="16">ANIMATION</option>
            <option value="35">COMEDY</option>
            <option value="80">CRIME</option>
            <option value="99">DOCUMENTARY</option>
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

        const selectCategorieElement = document.querySelector('.categorie-box');

        selectCategorieElement.addEventListener("change", function(){
            const selectedValue = selectCategorieElement.value;
            console.log(selectedValue);
            getData(selectedValue);
        });
        

        function getData(genreId = ""){
        const key= "9sJ6NKPiWw3qHmr2sZZwUNmhfDjsWfsP6A9wWfn2";
        let url = `https://u240066.gluwebsite.nl/api/movies?api_key=${key}`;

        if (!isNaN(parseInt(genreId))) {
            url = url + `&genres=${genreId}`;
            console.log(url);
        }

        fetch(url)
        .then((raw) => raw.json()) 
        .then((data) => {
        console.log(data.data);

        const moviesData = data.data;
        let newMovieArray = [];
        
        if(!isNaN(parseInt(genreId))){
            let usedMovies = {};

            for(let i = 0; i < moviesData.length; i++){
                const movieId = moviesData[i].movie_id;

                if(!usedMovies[movieId]){
                    usedMovies[movieId] = true;
                    newMovieArray.push(moviesData[i]);
                }
            }
        }else{
            newMovieArray = moviesData;
        }

        console.log(newMovieArray);

        show(newMovieArray);
    });
}

        function show(data) {
        const filmBoxes = document.querySelectorAll(".film-box");
        
        for(let i = 0; i < filmBoxes.length; i++){
            const box = filmBoxes[i];
            box.innerHTML = "";
            box.style.cssText = 'display: none;';
        }

        for(let i = 0; i < filmBoxes.length && i < data.length; i++){
        
        const box = filmBoxes[i];
        box.style.cssText = '';
        
        const movieId = data[i].movie_id;
        const title = data[i].movie.title;
        const poster = data[i].movie.poster_path;
        const overview = data[i].movie.overview;
        const vote = data[i].movie.vote_average;
        const release = data[i].movie.release_date;


        //foto
        console.log(data[i].genre);
        const image= document.createElement("IMG");
        image.src = `https://image.tmdb.org/t/p/w500/${poster}`;
        image.alt = title;
        image.id = "poster-image";
        box.appendChild(image);
        
         //titel
        const titel= document.createElement("h1");
        titel.textContent = title;
        box.appendChild(titel);

         //release
        const date= document.createElement("p");
        date.textContent = "Release: " + release;
        box.appendChild(date);
        
        //overview
        const over= document.createElement("p");
        over.textContent = overview;
        box.appendChild(over);

        const infoButton = document.createElement("info-knop");
            infoButton.className = "info-knop";
            infoButton.textContent = "MEER INFO & TICKETS";

            infoButton.addEventListener("click", () => {

                window.location.href = `http://localhost/Bioscoop/filmdetailpagina.php?id=${data[i].id}`;
});
  
        box.appendChild(infoButton);

        }

};
        </script>
      </div>      
        </div>
    </div>
    <div id="button-row">
        <a href="filmspagina.php" id="bekijk-knop">BEKIJK ALLE FILMS</a>
    </div>
