<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="vista/login/css/login.css">
    <title>Bienvenido</title>
</head>
<body>

    <marquee><h1>Bienvenido a Parristencia</h1></marquee>
    <h2 id="fecha"></h2>
    <form action="vista/login/login.php" method="post">
        <input type="submit" value="Ingresar">
    </form>

    <script>
        setInterval(() => {
            let fecha = new Date();
            let fechaHora = fecha.toLocaleString(); 
            document.getElementById("fecha").textContent = fechaHora;
        }, 1000);
    </script>
</body>
</html>