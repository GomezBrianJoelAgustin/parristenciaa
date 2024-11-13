<?php
    session_start();
    if (empty($_SESSION['nombre_profesor']) && empty($_SESSION['apellido_profesor'])) {
        header('location:../login/login.php');
        exit();
    }

    require_once '../layout/topbar.php'; 
    require_once '../layout/sidebar.php'; 
    require_once '../../modelo/conexion.php'; 
    require_once '../../class/Alumno.php'; 
    require_once '../../class/Asistencia.php'; 

    $idAlumnos = $_SESSION['checkAsistencia'];
    $alumnosObtenidos = $alumnos->obtenerAlumnos();

?>

<div class="page-content">
    <h3 class="text-center text-secondary">Alumnos presentes</h3>
    <table class="table table-bordered table-holder col-12" id="example">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombre</th>
                <th scope="col">Apellido</th>
                <th scope="col">Fecha hoy</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($asistencia->mostrarAlumnosPresentes($idAlumnos) as $aluPre):?>
            <tr>
                <td><?php echo htmlspecialchars($aluPre["alumno_id"]); ?></td>
                <td><?php echo htmlspecialchars($aluPre["nombre_alumno"]); ?></td>
                <td><?php echo htmlspecialchars($aluPre["apellido_alumno"]); ?></td>
                <td><?php echo htmlspecialchars($_SESSION["fecha"]); ?></td>
                <td><button class="btn btn-danger delete-btn" data-id="<?php echo htmlspecialchars($aluPre['alumno_id']); ?>">Borrar</button></td>                
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<div class="page-content">
    <h3 class="text-center text-secondary">Alumnos ausentes</h3>
    <table class="table table-bordered table-holder col-12" id="ausentes">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombre</th>
                <th scope="col">Apellido</th>
                <th scope="col">Fecha hoy</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($alumnosObtenidos as $ta): ?>
                <?php 
                    $isPresent = false;
                    foreach ($asistencia->mostrarAlumnosPresentes($idAlumnos) as $aluPre) {
                        if ($ta->alumno_id == $aluPre['alumno_id']) {
                            $isPresent = true;
                            break;
                        }
                    }
                    if (!$isPresent): 
                ?>
                <tr>
                    <td><?php echo htmlspecialchars($ta->alumno_id); ?></td>
                    <td><?php echo htmlspecialchars($ta->nombre_alumno); ?></td>
                    <td><?php echo htmlspecialchars($ta->apellido_alumno); ?></td>
                    <td><?php echo htmlspecialchars($_SESSION["fecha"]); ?></td>             
                </tr>
                <?php endif; ?>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<script src="borrarAsistencia.js"></script>

<?php 
require_once '../layout/footer.php'; 
exit();
?>