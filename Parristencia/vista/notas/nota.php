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

    <h3 class="text-center text-secondary">Selecciona una materia</h3>

    <form action="notasAlumnos.php" method="post" class="text-center">
        <div class="form-group">
            <select name="materia" id="materia" class="form-select mx-auto" style="width: 50%; border: 1px solid #ced4da;">
                <option value="">--Seleccione una materia--</option>
                <?php foreach($materiasObtenidas as $m): ?> 
                    <option value="<?= $m->materia_id;?>"><?= $m->nombre_materia?></option>
                <?php endforeach;?>
            </select>
        </div>
        <input type="submit" value="Seleccionar" class="btn btn-primary mt-2">
    </form> 

</div>


<?php require_once '../layout/footer.php'; ?>