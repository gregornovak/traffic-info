<!doctype html>
<html lang="si">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="lib/styles.css">
    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,700" rel="stylesheet">
    <title>Razmere na cestah</title>
</head>
<body>
    <div id="wrapper">
        <main>
            <div class="traffic-heading">
                <h1>Prometni pomočnik</h1>
            </div>
            <div class="user-input-wrapper">
                <form action="index.php" method="POST">
                    <div class="input-wrapper">
                        <label for="location">Lokacija: </label>
                        <input type="text" id="location" name="location" value="<?php if(isset($_POST['location'])) { echo $_POST['location']; } ?>">
                    </div>
                    <button name="submit" type="submit">Pridobi Info</button>
                </form>
<!--                <div class="input-wrapper">-->
<!--                    <label for="from">Od: </label>-->
<!--                    <input type="text" id="from" name="from" class="user-input">-->
<!--                </div>-->
<!--                <div class="input-wrapper">-->
<!--                    <label for="from">Do: </label>-->
<!--                    <input type="text" id="from" name="from" class="user-input">-->
<!--                </div>-->
            </div>
            <ul>
                <?php
                $conditions = new Traffic();
                if(isset($_POST['location'])) {
                    if($conditions->hasRecords() > 0) {
                        foreach($conditions->getConditions() as $c):
                            ?>
                            <li>
                                <?php echo $c->category['term'] . ' ' . $c->title . ": " . $c->content . ", Osveženo: " . date('H:i - j, M Y', strtotime($c->updated)); ?>
                            </li>
                            <?php
                        endforeach;
                    } else {
                        echo "Za to mesto/kraj/cesto ni nobenih obvestil";
                    }

                } else {
                    echo 'Vtipkajte željeno cesto';
                }

                ?>
            </ul>
        </main>
    </div>
</body>
</html>