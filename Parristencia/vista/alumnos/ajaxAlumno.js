$(document).on('click', '.borrar', function() {
    var row = $(this).closest('tr'); 
    var alumnoId = row.find('.alumno-id').val();
    $.ajax({
        url: 'eliminandoAlumnos.php', 
        type: 'POST',
        data: { alumno_id: alumnoId },
        dataType: 'json',
        success: function(response) {
            if (response.success) {
                alert("Alumno eliminado con éxito.");
                location.reload();
            } else {
                alert("Error al eliminar al alumno: " + response.message);
            }
        },
        error: function() {
            alert("Hubo un error en la solicitud.");
        }
    });
});

      