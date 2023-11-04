<?php
if (filter_input(INPUT_POST, "feltoltesTV", FILTER_VALIDATE_BOOL, FILTER_NULL_ON_FAILURE)) {
    $adatok = "feltoltesTV";
    var_dump($adatok);
    $tvid = filter_input(INPUT_POST, "tvid", FILTER_SANITIZE_NUMBER_INT);
    $tv_modell = htmlspecialchars(filter_input(INPUT_POST, "tv_modell"));
    $marka = filter_input(INPUT_POST, "marka");
    $gyartasd = filter_input(INPUT_POST, "gyartasd");
    $kijelzom = filter_input(INPUT_POST, "kijelzom");
    $allapot = filter_input(INPUT_POST, "allapot");
    $ar = filter_input(INPUT_POST, "ar");
    $from = null;
    $to = null;
    if ($_FILES['kepfajl']['error'] == 0) {
        $kiterjesztes = null;
        switch ($_FILES['kepfajl']['type']) {
            case 'image/png':
                $kiterjesztes = ".png";
                break;
            case 'image/jpeg':
                $kiterjesztes = ".jpg";
                break;
            case 'image/jfif':
                $kiterjesztes = ".jfif";
                break;
            default:
                break;
        }
        $from = $_FILES['kepfajl']['tmp_name'];
        $to = dir(getcwd());
        $to = $to->path . DIRECTORY_SEPARATOR . "tvkepek" . DIRECTORY_SEPARATOR . $tv_modell . $kiterjesztes;
        if (copy($from, $to)) {
            echo '<p>A kép feltöltés sikeres</p>';
        } else {
            echo '<p>A kép feltöltés sikertelen!</p>';
        }
    }
    if ($db->feltoltesTV($tvid, $tv_modell, $gyartasd, $kijelzom, $allapot, $ar)) {
        echo '<p>Az adatok módosítása sikeres</p>';
        header("Location: index.php?menu=home");
    } else {
        echo '<p>Az adatok módosítása sikertelen!</p>';
    }
}
?>
<form method="post" action="index.php?menu=home&id=<?php echo $adatok['tvid']; ?>" enctype="multipart/form-data">
    <input type="hidden" name="tvid" value="">
    <div class="mb-3">
        <label for="tv_modell" class="form-label">TV modell</label>
        <input type="text" class="form-control" name="tv_modell" id="tv_modell" value="">
    </div>
    <div class="row">
        <div class="mb-3 col-6">
            <label for="marka" class="form-label">Márka</label>
            <input type="text" class="form-control" name="marka" id="marka" value="">
        </div>
        <div class="mb-3 col-6">
            <label for="gyartasd" class="form-label">Gyártás dátuma</label>
            <input type="date" class="form-control" name="gyartasd" id="gyartasd" value="">
        </div>
 </div>
    <div class="row">
        <div class="mb-3 col-6">
            <label for="kijelzom" class="form-label">Kijelző mérete</label>
            <input type="text" class="form-control" name="kijelzom" id="kijelzom" max="<?php echo date("Y-m-d"); ?>" value="">
        </div>
        <div class="mb-3 col-6">
            <label for="allapot" class="form-label">Állapot</label>
            <input type="text" class="form-control" name="allapot" id="allapot" value="">
        </div>
    </div>
    <div class="row">
            <label for="ar" class="form-label">Ár</label>
            <input type="text" class="form-control" name="ar" id="ar" value="">
    </div>
    <div class="row">
        <div class="mb-3 col-4">
            <label for="kepfajl" class="form-label">Képfájl</label>
            <input type="file" class="form-control" name="kepfajl" id="kepfajl" value="">
        </div>

    </div>
    <button type="submit" class="btn btn-success" value="1" name="feltoltesTV">Feltöltés</button>
</form>
<?php ?>