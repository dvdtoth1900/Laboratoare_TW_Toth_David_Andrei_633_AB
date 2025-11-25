document.getElementById("btnAdauga").addEventListener("click", function() {
    const input = document.getElementById("inputActivitate");
    const lista = document.getElementById("listaActivitati");
    const text = input.value.trim();

    if(text !== "") {
        const li = document.createElement("li");

        const luni = [ "Ianuarie", "Februarie", "Martie", "Aprilie", "Mai", "Iunie","Iulie", "August", "Septembrie", "Octombrie", "Noiembrie", "Decembrie"];

        const data = new Date();
        const zi = data.getDate();
        const luna = luni[data.getMonth()];
        const an = data.getFullYear();

        li.textContent = `${text} – adăugată la: ${zi} ${luna} ${an}`;
        lista.appendChild(li);

        input.value = "";
    }
});
