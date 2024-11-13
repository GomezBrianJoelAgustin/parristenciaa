<?php  
    session_start();
    if (empty($_SESSION['nombre_profesor']) && empty($_SESSION['apellido_profesor'])) {
        header('location:../login/login.php');
        exit(); 
    }
    require_once '../layout/topbar.php'; 
    require_once '../layout/sidebar.php'; 
    require_once '../../modelo/conexion.php';
    require_once '../../class/Materia.php';
    require_once '../../class/Alumno.php';
    $materiaId = $_SESSION["materia_id"];
    $alumnosObtenidos = $alumnos->obtenerAlumnosPorMateria($materiaId);
?>
<div class="page-content">
    <h3 class="text-center text-secondary">Asistencia</h3>
    <form action="guardarInformacionAsistencia.php" method="post">
        <table class="table table-bordered table-holder col-12" id="example">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido</th>
                    <th scope="col">DNI</th>
                    <th scope="col">Fecha de nacimiento</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($alumnosObtenidos as $alu):?>
                <tr>
                    <td><?php echo $alu["alumno_id"]; ?></td>
                    <td><?php echo $alu["nombre_alumno"]; ?></td>
                    <td><?php echo $alu["apellido_alumno"]; ?></td>
                    <td><?php echo $alu["dni_alumno"]; ?></td>
                    <td><?php echo $alu["fecha_nacimiento_alumno"]; ?></td>
                    <td>
                        <input type="checkbox" name="checkAsistencia[]" value="<?php echo $alu["alumno_id"]; ?>" data-fecha="<?php echo $alu["fecha_nacimiento_alumno"]; ?>" onclick="cumple(this.dataset.fecha)">
                    </td>                
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <input class="btn btn-success" onclick="return confirm('¿Estás seguro que quieres tomar asistencia?')" type="submit" value="Registrar Asistencia">
    </form>
</div>
<script src="cumpleaños.js"></script>
<?php require_once '../layout/footer.php'; ?>