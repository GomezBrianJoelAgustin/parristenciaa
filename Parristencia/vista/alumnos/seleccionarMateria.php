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
       require_once "../../class/Alumno.php";

       $materiasObtenidas = $materias->obtenerMaterias();
?>

<div class="page-content">
       <h3 class="text-center text-secondary">Selecciona una materia</h3>
       <form action="editarAlumno.php" method="post" class="text-center">
              <div class="form-group">
                     <select name="materia_id" id="materia" class="form-select mx-auto" style="width: 50%; border: 1px solid #ced4da;">
                            <option value="">--Selecciona una materia--</option>
                            <?php foreach($materiasObtenidas as $mate): ?>
                            <option value="<?php echo $mate->materia_id?>"><?php echo $mate->nombre_materia?></option>
                            <?php endforeach; ?>
                     </select>
              </div>
        <input type="submit" value="Seleccionar" class="btn btn-primary">
    </form>
</div>
              


<?php require_once '../layout/footer.php'; ?>