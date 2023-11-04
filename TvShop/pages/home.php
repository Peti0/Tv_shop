<div class="row">
    <?php
    foreach ($db->osszesTV() as $row) {
        $image = null;
        if (file_exists("./tvkepek/" . $row['tv_modell'] . ".jpg")) {
            $image = "./tvkepek/" . $row['tv_modell'] . ".jpg";
        } else if (file_exists("./tvkepek/" . $row['tv_modell'] . ".jpeg")) {
            $image = "./tvkepek/" . $row['tv_modell'] . ".jpeg";
        } else if (file_exists("./tvkepek/" . $row['tv_modell'] . ".png")) {
            $image = "./tvkepek/" . $row['tv_modell'] . ".png";
        } else if (file_exists("./tvkepek/" . $row['tv_modell'] . ".jfif")) {
            $image = "./tvkepek/" . $row['tv_modell'] . ".jfif";
        } else {
            $image = "./images/noimage.jpg";
        }
        $card = '<div class="card" style="width: 18rem;">
                    <img src="'.$image.'" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">' . $row['tv_modell'] . '</h5>' .
                '<p class="card-text">Gyártás dátuma: ' . $row['gyartasd'] . '</p>' .
                '<p class="card-text">Kijelző(Col): ' . $row['kijelzom'] . '</p>' .
                '<p class="card-text">Állapota: ' . $row['allapot'] . '</p>' .
                '<p class="card-text">Ár: ' . $row['ar'] . '</p>' .
                '<a href="index.php?menu=home&id=' . $row['tvid'] . '" class="btn btn-primary">Megrendel</a>
                    </div>
                </div>
            ';
        echo $card;
    }
    ?>

</div>