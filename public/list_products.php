<?php
require_once __DIR__ . '/../src/init.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bonjour</title>
    <?php require_once __DIR__ . '/../src/partials/head_css.php'; ?>
</head>

<body>
    <?php require_once __DIR__ . '/../src/partials/menu.php'; ?>
    <?php require_once __DIR__ . '/../src/partials/show_error.php'; ?>

    <?php
        require_once __DIR__ . '/../src/partials/list_products.partial.php';
        list_products([0,0,0,0,0,0]);
    ?>

    <div class="container">
        <div class="row p-3 mx-3">
            <div class="col">

            </div>
        </div>
    </div>
</body>

</html>
