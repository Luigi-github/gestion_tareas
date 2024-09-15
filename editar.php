<?php
    include 'db.php';

    $id = $_GET['id'];
    $stmt = $conn->prepare("SELECT * FROM tareas WHERE id = :id");
    $stmt->execute(['id' => $id]);
    $tarea = $stmt->fetch();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $titulo = $_POST['titulo'];
        $descripcion = $_POST['descripcion'];

        if (!empty($titulo) && !empty($descripcion)) {
            $stmt = $conn->prepare("UPDATE tareas SET titulo = :titulo, descripcion = :descripcion WHERE id = :id");
            $stmt->execute(['titulo' => $titulo, 'descripcion' => $descripcion, 'id' => $id]);
            header('Location: index.php');
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
    <title>Editar Tarea</title>
</head>
<body>
<h1>Editar Tarea</h1>
<?php if (isset($error)): ?>
    <p style="color:red;"><?= $error ?></p>
<?php endif; ?>
    <form method="post">
        <label for="titulo">Título:</label>
        <input type="text" name="titulo" id="titulo" value="<?= htmlspecialchars($tarea['titulo']) ?>" required>
        <br>
        <label for="descripcion">Descripción:</label>
        <textarea name="descripcion" id="descripcion" required><?= htmlspecialchars($tarea['descripcion']) ?></textarea>
        <br>
        <button type="submit">Guardar cambios</button>
    </form>
</body>
</html>
