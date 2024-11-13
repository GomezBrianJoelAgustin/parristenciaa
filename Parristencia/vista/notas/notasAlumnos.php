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
    require_once "../../class/Nota.php";

    $_SESSION['materia'] = $_POST['materia'];
    $id = $_SESSION['materia'];
    $alumnosObtenidos = $alumnos->obtenerAlumnosPorMateria($id);
?>

<div class="page-content">
    <h3 class="text-center text-secondary">Alumnos</h3>

    <table class="table table-bordered table-holder col-12" id="example">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombre</th>
                <th scope="col">Apellido</th>
                <th scope="col">Nota1</th>
                <th scope="col">Nota2</th>
                <th scope="col">Nota3</th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($alumnosObtenidos as $a): 
                $alumno_id = $a["alumno_id"];
                $notasObtenidas = $notas->obtenerNotasAlumnos($alumno_id, $id);
                
                if (empty($notasObtenidas)):
            ?>
                <tr>
                    <td><?php echo $a["alumno_id"]?></td>
                    <td><?php echo $a["nombre_alumno"]?></td>
                    <td><?php echo $a["apellido_alumno"]?></td>
                    <td>
                        <input type="hidden" class="alumno-id" value="<?php echo $a['alumno_id'];?>">
                        <input type="number" class="nota1" placeholder="Nota..." required>
                    </td>
                    <td><input type="number" class="nota2" placeholder="Nota..." required></td>
                    <td><input type="number" class="nota3" placeholder="Nota..." required></td>
                    <td><button class="btn btn-success registrar">Registrar</button></td>                
                    <td></td> 
                </tr>
            <?php else: 
                foreach($notasObtenidas as $n): ?>
                    <tr>
                        <td><?php echo $a["alumno_id"]?></td>
                        <td><?php echo $a["nombre_alumno"]?></td>
                        <td><?php echo $a["apellido_alumno"]?></td>
                        <input type="hidden" class="alumno-id" value="<?php echo $a['alumno_id'];?>">
                        <td><input type="number" class="nota1" value="<?= $n['nota1']?>" required></td>
                        <td><input type="number" class="nota2" value="<?= $n['nota2']?>" required></td> 
                        <td><input type="number" class="nota3" value="<?= $n['nota3']?>" required></td>
                        <td><button class="btn btn-warning editar">Editar</button></td>                
                        <input type="hidden" name="alumno_id" value="<?php echo $a['alumno_id'];?>">
                        <td><button type="submit" class="btn btn-danger borrar">Borrar</button></td>                
                    </tr>
                <?php endforeach; 
                endif;  ?>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<script src="ajaxNota.js"></script> 
<?php require_once '../layout/footer.php';?>