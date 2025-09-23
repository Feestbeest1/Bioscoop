const btn = document.getElementById("getdatabutton");
btn.addEventListener("click", getData);

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
    const div = document.createElement("div");
    div.style.width="100px";
    div.style.height="800px";
    div.style.backgroundColor="red";
    div.style.display="flex";
    div.style.flexDirection="column";
    
    

    div.className = "myCustomClass";

    for(let i = 0; i < data.length; i++) {
        
        const title = data[i].movie.title;
        const poster = data[i].movie.poster_path;
        const overview = data[i].movie.overview;
        const vote = data[i].movie.vote_average;
        const release = data[i].movie.release_date;

        //titel
        const titel= document.createElement("p");
        titel.textContent = title;
        div.appendChild(titel);


        //image
        console.log(poster);
        
        const image= document.createElement("IMG");
        image.src = `https://image.tmdb.org/t/p/w500/${poster}`;
        image.width= 200;
        image.alt = title;
        document.body.appendChild(image);
        

        //overview
        const over= document.createElement("p");
        over.textContent = overview;
        div.appendChild(over);

        //vote
        

        //release

        

        // const span = document.createElement("span");

        // span.textContent = title;
        // div.appendChild(span);
    }

    // document.body.appendChild(div);
}
