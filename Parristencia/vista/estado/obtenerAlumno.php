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
    require_once '../../class/Nota.php'; 
    require_once '../../class/Asistencia.php'; 
    require_once '../../class/Ram.php'; 

    $instituto_id = $_SESSION['instituto_id_estado'];
    $materia_id = $_SESSION['materia_id_estado'];

    if (isset($_POST['dias'])) {
        $_SESSION['dias'] = $_POST['dias']; 
        $dias = $_SESSION['dias'];
    } elseif (isset($_SESSION['dias'])) {
        $dias = $_SESSION['dias']; 
    } else {
        $dias = 0; 
    }
?>

<div class="page-content">
    <h3 class="text-center text-secondary">Estado de alumnos</h3>

    <form method="post" class="text-center mb-4">
        <label for="dias" class="form-label">Ingrese la cantidad de días de clase:</label>
        <input type="number" name="dias" id="dias" class="form-control mb-2" value="<?php echo $dias; ?>" required>
        <button type="submit" class="btn btn-primary">Mostrar Estado</button>
    </form>

    <?php if ($dias > 0): ?>
        <?php 
        $alumnosObtenidos = $alumnos->obtenerAlumnosPorMateria($materia_id);
        ?>
        
        <?php if (!empty($alumnosObtenidos)): ?>
            <table class="table table-bordered table-holder col-12" id="example">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellido</th>
                        <th scope="col">Nota1</th>
                        <th scope="col">Nota2</th>
                        <th scope="col">Nota3</th>
                        <th scope="col">Asistencia</th>
                        <th scope="col">Estado asistencia</th>
                        <th scope="col">Estado nota</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($alumnosObtenidos as $a): 
                        $alumno_id = $a["alumno_id"];
                        $notasObtenidas = $notas->obtenerNotasAlumnos($alumno_id, $materia_id);
                        $porcentajeAsitencia = $asistencia->mostrarPorcentajeAsitencia($alumno_id, $materia_id, $dias);
                    ?>
                    <tr>
                        <td><?php echo ($a["alumno_id"]); ?></td>
                        <td><?php echo ($a["nombre_alumno"]); ?></td>
                        <td><?php echo ($a["apellido_alumno"]); ?></td>

                        <?php if (!empty($notasObtenidas)): ?>
                            <?php foreach ($notasObtenidas as $n): ?>
                                <?php foreach($ram->ramPorInstituto($instituto_id) as $ramObtenida):?>    
                                    <td><?= ($n['nota1']); ?></td>            
                                    <td><?= ($n['nota2']); ?></td>            
                                    <td><?= ($n['nota3']); ?></td>            
                                    <td><?= ($porcentajeAsitencia); ?>%</td>   
                                    <td><?php 
                                        if ($porcentajeAsitencia >= $ramObtenida["porcentajePromocion"])  {
                                            echo "Promocionado";
                                        } elseif ($porcentajeAsitencia >= $ramObtenida["porcentajeRegular"] && $porcentajeAsitencia < $ramObtenida["porcentajePromocion"]) {
                                            echo "Regular";
                                        } else {
                                            echo "Libre";
                                        }
                                    ?></td>                
                                    <td><?php 
                                        if ($n['nota1'] >= $ramObtenida["notaPromocion"] && $n['nota2'] >= $ramObtenida["notaPromocion"] && $n['nota3'] >= $ramObtenida["notaPromocion"])  {
                                            echo "Promocionado";
                                        } elseif ($n['nota1'] >= $ramObtenida["notaRegular"] && $n['nota2'] >= $ramObtenida["notaRegular"] && $n['nota3'] >= $ramObtenida["notaRegular"]) {
                                            echo "Regular";
                                        } else {
                                            echo "Libre";
                                        }
                                    ?></td>                
                                <?php endforeach; ?>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <?php foreach($ram->ramPorInstituto($instituto_id) as $ramObtenida):?>   
                                <td>Sin notas</td>
                                <td>Sin notas</td>
                                <td>Sin notas</td>
                                <td><?= ($porcentajeAsitencia); ?>%</td>
                                <td><?php 
                                    if ($porcentajeAsitencia >= $ramObtenida["porcentajePromocion"]) {
                                        echo "Promocionado";
                                    } elseif ($porcentajeAsitencia >= $ramObtenida["porcentajeRegular"]) {
                                        echo "Regular";
                                    } else {
                                        echo "Libre";
                                    }
                                ?></td> 
                                <td>Libre</td>
                            <?php endforeach; ?> 
                        <?php endif; ?>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <div class="alert alert-warning text-center">
                No hay alumnos registrados para esta materia.
            </div>
        <?php endif; ?>
    <?php else: ?>
        <div class="alert alert-warning text-center">
            No hubo clases.
        </div>
    <?php endif; ?>
</div>

<?php require_once '../layout/footer.php' ?>