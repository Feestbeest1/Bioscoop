let elements = document.querySelectorAll('.stoel');

let stoelenkeuzearray = []
elements.forEach((item) => {
    item.addEventListener('click', function(event){
        event.target.style.backgroundColor = 'green';
        console.log(event.target.id)
        // document.getElementById("stoelenkeuze").value = event.target.id;
        stoelenkeuzearray.push(event.target.id)
    })
});
console.log(stoelenkeuzearray)
 document.getElementById("stoelenkeuze").value = stoelenkeuzearray;
