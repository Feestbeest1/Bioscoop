let elements = document.querySelectorAll('.stoel');

let stoelenkeuzearray = []
elements.forEach((item) => {
    item.addEventListener('click', function(event){
        event.target.style.backgroundColor = '#B97D46';
        console.log(event.target.id)
        // document.getElementById("stoelenkeuze").value = event.target.id;
        stoelenkeuzearray.push(event.target.id);
 document.getElementById("stoelenkeuze").value = "";
        stoelenkeuzearray.forEach(printen);
    })
});
console.log(stoelenkeuzearray)
//  document.getElementById("stoelenkeuze").value = stoelenkeuzearray;

function printen(item, index){
   document.getElementById("stoelenkeuze").value += " rij " + item; 
}