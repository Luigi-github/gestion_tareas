<?php
include 'db.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $titulo = $_POST['titulo'];
        $descripcion = $_POST['descripcion'];

        if (!empty($titulo) && !empty($descripcion)) {
            $stmt = $conn->prepare("INSERT INTO tareas (titulo, descripcion) VALUES (:titulo, :descripcion)");
            $stmt->execute(['titulo' => $titulo, 'descripcion' => $descripcion]);
            header('Location: index.php');  // Redirigir al listado de tareas
            exit();
        } else {
            $error = "Ambos campos son obligatorios.";
        }
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Tarea</title>
</head>
<body>
<h1>Agregar Tarea</h1>
<?php if (isset($error)): ?>
    <p style="color:red;"><?= $error ?></p>
<?php endif; ?>
    <form method="post">
        <label for="titulo">Título:</label>
        <input type="text" name="titulo" id="titulo" required>
        <br>
        <label for="descripcion">Descripción:</label>
        <textarea name="descripcion" id="descripcion" required></textarea>
        <br>
        <button type="submit">Agregar</button>
    </form>
</body>
</html>
