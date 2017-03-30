<!doctype html>
<html lang="si">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Razmere na cestah</title>
</head>
<body>
<div>
    <h1>Razmere:</h1>
    <ul>
        <?php
        $conditions = new Conditions();
        foreach($conditions->getConditions() as $c):
        ?>
            <li><?php echo $c->title . ", " . $c->updated; ?></li>
        <?php
        endforeach;
        ?>
    </ul>
</div>
</body>
</html>