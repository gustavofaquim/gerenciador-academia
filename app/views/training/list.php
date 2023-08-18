<!DOCTYPE html>
<html>
<head>
    <title>Lista de Treinos</title>
</head>
<body>
    <h2>Lista de Treinos</h2>
    <ul>
        <?php foreach ($trainings as $training): ?>
            <li><strong><?php echo $training->name; ?></strong><br><?php echo $training->description; ?></li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
