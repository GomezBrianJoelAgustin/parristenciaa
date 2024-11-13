<?php
    session_start();
    if (empty($_SESSION['nombre_profesor']) && empty($_SESSION['apellido_profesor'])) {
        header('location:../login/login.php');
        exit(); 
    }
    require_once '../layout/topbar.php'; 
    require_once '../layout/sidebar.php'; 
    require_once "../../modelo/conexion.php";
    require_once "../../class/Materia.php";

    $materiasObtenidas = $materias->obtenerMaterias();
?>
<div class="page-content">
    <h3 class="text-center text-secondary">Crear Nuevo Alumno</h3>
    <form action="alumnoCreado.php" method="post" id="crearAlumno" class="text-center">
        <div class="form-group mb-3">
            <input type="text" name="nombre_alumno" class="form-control mx-auto" style="width: 50%;" placeholder="Nombre..." required>
        </div>
        <div class="form-group mb-3">
            <input type="text" name="apellido_alumno" class="form-control mx-auto" style="width: 50%;" placeholder="Apellido..." required>
        </div>
        <div class="form-group mb-3">
            <input type="date" name="fecha_nacimiento_alumno" class="form-control mx-auto" style="width: 50%;" required>
        </div>
        <div class="form-group mb-3">
            <input type="text" name="dni_alumno" class="form-control mx-auto" style="width: 50%;" placeholder="DNI..." required>
        </div>
        <div class="form-group mb-3">
            <select name="materia_id" id="materia_id" class="form-select mx-auto" style="width: 50%;" required>
                <option value="">--Selecciona una materia--</option>
                <?php foreach($materiasObtenidas as $mate): ?>
                    <option value="<?php echo $mate->materia_id ?>"><?php echo $mate->nombre_materia?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <input type="submit" value="Crear" class="btn btn-primary mt-2">
    </form>
</div>

<?php require_once '../layout/footer.php'; ?>