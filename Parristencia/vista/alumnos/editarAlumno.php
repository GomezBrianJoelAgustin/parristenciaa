<?php
    session_start();
    if (empty($_SESSION['nombre_profesor']) && empty($_SESSION['apellido_profesor'])) {
        header('location:../login/login.php');
        exit(); 
    }
    require_once '../layout/topbar.php'; 
    require_once '../layout/sidebar.php'; 
    require_once "../../modelo/conexion.php";
    require_once "../../class/Alumno.php";
    
    $materia_id = $_POST['materia_id'];
    $alumnosObtenidos = $alumnos->obtenerAlumnosPorMateria($materia_id);
?>

<div class="page-content">
    <h3 class="text-center text-secondary">Alumnos</h3>
    <form action="crearAlumno.php" method="post" class="text-center mb-4">
        <input type="submit" value="Crear Alumno" class="btn btn-primary">
    </form>
    <table class="table table-bordered table-holder col-12" id="example">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Fecha de nacimiento</th>
                <th>DNI</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($alumnosObtenidos as $alu): ?>
            <tr>
                <td><?php echo $alu["alumno_id"]?></td>
                <td><?php echo $alu["nombre_alumno"]?></td>
                <td><?php echo $alu["apellido_alumno"]?></td>
                <td><?php echo $alu["fecha_nacimiento_alumno"]?></td>
                <td><?php echo $alu["dni_alumno"]?></td>
                <td>
                    <form action="editandoAlumno.php" method="post">
                        <input type="hidden" name="alumno_id" value="<?php echo $alu["alumno_id"]?>">
                        <input type="hidden" name="nombre_alumno" value="<?php echo $alu["nombre_alumno"]?>">
                        <input type="hidden" name="apellido_alumno" value="<?php echo $alu["apellido_alumno"]?>">
                        <input type="hidden" name="fc_alumno" value="<?php echo $alu["fecha_nacimiento_alumno"]?>">
                        <input type="hidden" name="dni_alumno" value="<?php echo $alu["dni_alumno"]?>">
                        <input type="submit" onclick="return confirm('¿Estás seguro que quieres editar?')" value="Editar" class="btn btn-warning">
                    </form>
                </td>
                <td>
                    <input type="hidden" class="alumno-id" value="<?php echo $alu["alumno_id"]?>">
                    <button type="button" class="btn btn-danger borrar">Borrar</button>                
                </td>                
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>

<script src="ajaxAlumno.js"></script>
<?php require_once '../layout/footer.php'; ?>