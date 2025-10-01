const datumSelect = document.querySelector('.datums');
const tijdSelect = document.querySelector('.tijdstip');
const aantalInputs = document.querySelectorAll('.aantal'); // 0=Normaal,1=Kind,2=65+
const stoelenGrid = document.querySelector('.parent');
const stoelenInput = document.querySelector('.stoelen-keuze span');
 
const previewDatum = document.getElementById('previewDatum');
const previewTijd = document.getElementById('previewTijd');
const previewStoelen = document.getElementById('previewStoelen');
const previewTickets = document.querySelector('.ticket-aantal span');
const previewTotaal = document.querySelector('.totaal-aantal .count');
const previewPrijs = document.querySelector('.totaal-aantal .price');
 
const ticketPrices = [9,5,7]; // Normaal, Kind, 65+
 
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
    previewTickets.innerHTML = ticketDetails.join(', ');
    previewPrijs.innerHTML = totalPrice.toFixed(2);
}

aantalInputs.forEach(input => input.addEventListener('input', updateTickets));
 
// Seats
let selectedSeats = [];
stoelenGrid.addEventListener('click', e => {
    if(e.target.classList.contains('stoel')){
        const seatId = e.target.id;
        const seatSplitted = seatId.split('-');
        
        const rijNummer = seatSplitted[0];
        const stoelNummer = seatSplitted[1];

        if(Array.isArray(selectedSeats[rijNummer]) && selectedSeats[rijNummer][stoelNummer]){
            selectedSeats[rijNummer][stoelNummer] = false;
            e.target.style.backgroundColor='';
        } else {
            if(!Array.isArray(selectedSeats[rijNummer])){
                selectedSeats[rijNummer] = [];
            }
            selectedSeats[rijNummer][stoelNummer] = true;
            e.target.style.backgroundColor='orange';
        }

        let stoelText = '';
        selectedSeats.forEach((rij, rijIndex) => {
            if(rij.length > 0){
                stoelText += `Rij ${rijIndex}, `;
                rij.forEach((stoel, stoelIndex) => {
                    if(stoel){
                        stoelText += `Stoel ${stoelIndex}, `;
                    }
                });
            }
        });

        stoelText = stoelText.slice(0, -2);
        stoelenInput.textContent = stoelText;
        // previewStoelen.textContent = selectedSeats.join(', ');
    }
});