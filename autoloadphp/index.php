<?php
    include "autoload.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AutoLoad</title>
</head>
<body>
    <?php
        $p =  new person("Rifqi","36");
        echo $p->getPerson();
    ?>
</body>
</html>