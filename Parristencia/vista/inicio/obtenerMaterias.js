function cargarMaterias() {
    var institutoId = document.getElementById("instituto").value;
    
    if (institutoId) {
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "obtenerMaterias.php");
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        
        xhr.onload = function() {
            if (xhr.status === 200) {
                var materias = JSON.parse(xhr.responseText);
                var materiaSelect = document.getElementById("materia");
                materiaSelect.innerHTML = '<option>--Seleccione una materia--</option>'; 

                materias.forEach(function(materia) {
                    var option = document.createElement("option");
                    option.value = materia.materia_id; 
                    option.textContent = materia.nombre_materia;
                    materiaSelect.appendChild(option);
                });
            }
        };
        
        xhr.send("instituto_id=" + institutoId);
    } else {
        document.getElementById("materia").innerHTML = '<option value="">--Seleccione una materia--</option>';
    }
}