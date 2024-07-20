<!DOCTYPE html>
<html>
<head>
    <title>Formulario de Inserción de Datos</title>
</head>
<body>
    <h2>Insertar Datos en la Base de Datos</h2>
    <form action="insert.php" method="post">
        Nombre: <input type="text" name="name"><br>
        <input type="submit">
    </form>
    <h2>Datos en la Base de Datos</h2>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "testdb";

    // Crear conexión
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Recuperar datos
    $sql = "SELECT id, name FROM test_table";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Mostrar datos en una tabla HTML
        echo "<table border='1'><tr><th>ID</th><th>Nombre</th></tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["id"]. "</td><td>" . $row["name"]. "</td></tr>";
        }
        echo "</table>";
    } else {
        echo "0 resultados";
    }
    $conn->close();
    ?>
</body>
</html>
