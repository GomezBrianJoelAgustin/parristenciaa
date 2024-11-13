<?php
    session_start();
    if (empty($_SESSION['nombre_profesor']) && empty($_SESSION['apellido_profesor'])) {
        header('location:../login/login.php');
        exit();
    }
    require_once '../layout/topbar.php'; 
    require_once '../layout/sidebar.php'; 
    require_once '../../modelo/conexion.php';
    require_once '../../class/Instituto.php';
    require_once '../../class/Materia.php';

    $institutosObtenidos = $instituto->obtenerInstitutos();
?>

<div class="container d-flex align-items-center justify-content-center vh-100">
    <div class="card" style="width: 100%; max-width: 500px;">
        <div class="card-body">
            <h3 class="text-center text-secondary">Seleccione instituto y materia</h3>
            <form action="guardarInfoInicio.php" method="post">
                <div class="mb-3">
                    <label for="instituto" class="form-label">Institutos:</label>
                    <select id="instituto" name="instituto_id" class="form-select" onchange="cargarMaterias()">
                        <option value="">--Seleccione--</option>
                        <?php foreach ($institutosObtenidos as $inst): ?>
                            <option value="<?php echo htmlspecialchars($inst->instituto_id); ?>"><?php echo htmlspecialchars($inst->nombre_instituto); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                
                <div class="mb-3">
                    <label for="materia" class="form-label">Materias:</label>
                    <select id="materia" name="materia_id" class="form-select">
                        <option value="">--Seleccione una materia--</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Seleccionar</button>
            </form>
        </div>
    </div>
</div>

<script src="obtenerMaterias.js"></script>
<?php require_once '../layout/footer.php'; ?>