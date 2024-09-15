<?php
    include 'db.php';  // archivo donde se conecta a la base de datos

    $stmt = $conn->prepare("SELECT * FROM tareas ORDER BY fecha_creacion DESC");
    $stmt->execute();
    $tareas = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Tareas</title>
</head>
<body>
    <h1>Listado de Tareas</h1>
    <a href="agregar.php">Agregar Tarea</a>
    <ul>
        <?php foreach ($tareas as $tarea): ?>
            <li>
                <strong><?= htmlspecialchars($tarea['titulo']) ?></strong> -
                <?= htmlspecialchars($tarea['descripcion']) ?>
                <a href="editar.php?id=<?= $tarea['id'] ?>">Editar</a>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
