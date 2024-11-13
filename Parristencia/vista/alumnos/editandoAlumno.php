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
require_once "../../class/Materia.php";

$materiasObtenidas = $materias->ObtenerMaterias();
$alumno_id = $_POST['alumno_id'];
$nombre = $_POST['nombre_alumno'];
$apellido = $_POST['apellido_alumno'];
$fc = $_POST['fc_alumno'];
$dni = $_POST['dni_alumno'];

?>

<div class="page-content">
    <h3 class="text-center text-secondary">Cambia los datos</h3>
    <form action="camibarDatos.php" method="post" class="text-center">
        <input type="hidden" name="id" value="<?= $alumno_id;?>">
        
        <div class="form-group mb-3">
            <input type="text" name="nombre" class="form-control mx-auto" style="width: 50%;" value="<?= $nombre;?>" placeholder="Nombre..." required>
        </div>
        
        <div class="form-group mb-3">
            <input type="text" name="apellido" class="form-control mx-auto" style="width: 50%;" value="<?= $apellido;?>" placeholder="Apellido..." required>
        </div>
        
        <div class="form-group mb-3">
            <input type="date" name="fc" class="form-control mx-auto" style="width: 50%;" value="<?= $fc;?>" required>
        </div>
        
        <div class="form-group mb-3">
            <input type="text" name="dni" class="form-control mx-auto" style="width: 50%;" value="<?= $dni;?>" placeholder="DNI..." required>
        </div>
        
        <div class="form-group mb-3">
            <select name="materia" class="form-select mx-auto" style="width: 50%;" required>
                <option value="">--Selecciona una materia--</option>
                <?php foreach($materiasObtenidas as $m): ?>
                    <option value="<?php echo $m->materia_id;?>"><?php echo $m->nombre_materia;?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <input type="submit" value="Editar" class="btn btn-primary mt-2">
    </form>
</div>

<?php require_once '../layout/footer.php'; ?>