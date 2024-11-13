$(document).ready(function() {
    $(document).on('click', '.registrar', function() {
        var row = $(this).closest('tr'); 
        var alumnoId = row.find('.alumno-id').val();
        var nota1 = row.find('.nota1').val();
        var nota2 = row.find('.nota2').val();
        var nota3 = row.find('.nota3').val();

        $.ajax({
            url: 'cargarNota.php', 
            type: 'POST',
            data: { alumno_id: alumnoId, nota1: nota1, nota2: nota2, nota3: nota3 },
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    alert("Nota registrada con éxito.");
                    location.reload(); 
                } else {
                    alert("Error al registrar la nota: " + response.message);
                }
            },
            error: function() {
                alert("Hubo un error en la solicitud.");
            }
        });
    });

    $(document).on('click', '.editar', function() {
        var row = $(this).closest('tr'); 
        var alumnoId = row.find('.alumno-id').val();
        var nota1 = row.find('.nota1').val();
        var nota2 = row.find('.nota2').val();
        var nota3 = row.find('.nota3').val();

        $.ajax({
            url: 'cargarNota.php', 
            type: 'POST',
            data: { alumno_id: alumnoId, nota1: nota1, nota2: nota2, nota3: nota3 },
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    alert("Nota editada con éxito.");
                    location.reload();
                } else {
                    alert("Error al editar la nota: " + response.message);
                }
            },
            error: function() {
                alert("Hubo un error en la solicitud.");
            }
        });
    });

    $(document).on('click', '.borrar', function() {
        var row = $(this).closest('tr'); 
        var alumnoId = row.find('.alumno-id').val();
        $.ajax({
            url: 'borrarNota.php', 
            type: 'POST',
            data: { alumno_id: alumnoId },
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    alert("Nota eliminada con éxito.");
                    location.reload(); 
                } else {
                    alert("Error al eliminar la nota: " + response.message);
                }
            },
            error: function() {
                alert("Hubo un error en la solicitud.");
            }
        });
    });
});