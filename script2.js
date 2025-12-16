const detalii = document.getElementById("detalii");
const buton = document.getElementById("btnDetalii");
const dataSpan = document.getElementById("dataProdus");

detalii.classList.add("ascuns");

const luni = ["Ianuarie", "Februarie", "Martie", "Aprilie", "Mai", "Iunie","Iulie", "August", "Septembrie", "Octombrie", "Noiembrie", "Decembrie"];

const data = new Date();
const zi = data.getDate();
const luna = luni[data.getMonth()];
const an = data.getFullYear();
dataSpan.textContent = `${zi} ${luna} ${an}`;

buton.addEventListener("click", function() {
    detalii.classList.toggle("ascuns");

    if(detalii.classList.contains("ascuns")) {
        buton.textContent = "Afișează detalii";
    } else {
        buton.textContent = "Ascunde detalii";
    }
});
