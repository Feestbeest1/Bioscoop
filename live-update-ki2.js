const datumSelect = document.querySelector('.datums');
const tijdSelect = document.querySelector('.tijdstip');
const aantalInputs = document.querySelectorAll('.aantal'); // 0=Normaal,1=Kind,2=65+
const stoelenGrid = document.querySelector('.parent');
const stoelenInput = document.getElementById('stoelenkeuze');

const previewDatum = document.getElementById('previewDatum');
const previewTijd = document.getElementById('previewTijd');
const previewStoelen = document.getElementById('previewStoelen');
const previewTickets = document.getElementById('previewTickets');
const previewTotaal = document.getElementById('previewTotaal');
const previewPrijs = document.getElementById('previewPrijs');

const ticketPrices = [9,5,7]; // Normaal, Kind, 65+

datumSelect.addEventListener('change', () => previewDatum.textContent = datumSelect.value);
tijdSelect.addEventListener('change', () => previewTijd.textContent = tijdSelect.value);

function updateTickets() {
    let totalTickets = 0;
    let totalPrice = 0;
    let ticketDetails = [];

    aantalInputs.forEach((input,index) => {
        const qty = parseInt(input.value) || 0;
        totalTickets += qty;
        totalPrice += qty * ticketPrices[index];
        if(qty>0){
            const type = index===0?'Normaal': index===1?'Kind':'65+';
            ticketDetails.push(qty + 'x ' + type);
        }
    });

    previewTotaal.textContent = totalTickets;
    previewTickets.textContent = ticketDetails.join(', ');
    previewPrijs.textContent = totalPrice.toFixed(2);
}

aantalInputs.forEach(input => input.addEventListener('input', updateTickets));

// Seats
let selectedSeats = [];
stoelenGrid.addEventListener('click', e => {
    if(e.target.classList.contains('stoel')){
        const seatId = e.target.id;
        if(selectedSeats.includes(seatId)){
            selectedSeats = selectedSeats.filter(s=>s!==seatId);
            e.target.style.backgroundColor='';
        } else {
            selectedSeats.push(seatId);
            e.target.style.backgroundColor='orange';
        }
        stoelenInput.value = selectedSeats.join(', ');
        previewStoelen.textContent = selectedSeats.join(', ');
    }
});
