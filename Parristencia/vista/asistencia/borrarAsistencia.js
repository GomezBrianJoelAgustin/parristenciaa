$(document).ready(function() {
    $('.delete-btn').click(function() {
        var alumnoId = $(this).data('id'); 

        if (confirm("¿Estás seguro de que deseas borrar la asistencia?")) {
            $.ajax({
                url: 'borrarAsistencia.php',
                type: 'POST',
                data: { alumno_id: alumnoId },
                success: function(response) {
                    if (response.success) {
                        alert("Asistencia borrada con éxito.");
                        location.reload();
                    } else {
                        alert("Error al borrar la asistencia: " + response.message);
                    }
                },
                error: function() {
                    alert("Hubo un error en la solicitud.");
                }
            });
        }
    });
});