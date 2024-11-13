function cumple(fecha) {
    var fechaSeparada = fecha.split("-");
    var dia = parseInt(fechaSeparada[2], 10); 
    var mes = parseInt(fechaSeparada[1], 10);

    var hoy = new Date();
    var mesActual = hoy.getMonth() + 1; 
    var diaActual = hoy.getDate();

    if (mesActual === mes && diaActual === dia) {
        alert("Hoy es el cumpleaños");
    }
}