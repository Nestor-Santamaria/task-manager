<!DOCTYPE html>
<html>

<head>
    <title>Task Manager</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="d-flex">

        <?php require __DIR__ . '/sidebar.php'; ?>

        <div class="flex-grow-1 p-4">

            <?php require $viewPath; ?>

        </div>

    </div>

</body>

</html>