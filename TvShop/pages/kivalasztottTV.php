<?php
if (filter_input(INPUT_POST, "Adatmodositas", FILTER_VALIDATE_BOOL, FILTER_NULL_ON_FAILURE)) {
    $adatok = $_POST;
    var_dump($adatok);
    $tvid = filter_input(INPUT_POST, "tvid", FILTER_SANITIZE_NUMBER_INT);
    $tv_modell = htmlspecialchars(filter_input(INPUT_POST, "tv_modell"));
    $marka = filter_input(INPUT_POST, "markaSelect");
    $gyartasd = filter_input(INPUT_POST, "gyartasdSelect");
    $kijelzom = filter_input(INPUT_POST, "kijelzomSelect");
    $allapot = filter_input(INPUT_POST, "allapot");
    $ar = filter_input(INPUT_POST, "arSelect");
    $from = null;
    $to = null;
    $megrendeles = filter_input(INPUT_POST, "megrendeles");
}
?>
<form method="POST" action="index.php?menu=home&id=<?php echo $adatok['tvid']; ?>" enctype="multipart/form-data">
     <div class="row">
        <div class="mb-3 col-6">
            <label for="vnev" class="form-label">Vezetéknév</label>
            <input type="text" class="form-control" name="vnev" id="vnev" value="">
        </div>
               <div class="mb-3 col-6">
            <label for="knev" class="form-label">Keresztnév</label>
            <input type="text" class="form-control" name="knev" id="knev" value="">
        </div>
 </div>
    <div class="row">
        <div class="mb-3 col-6">
            <label for="szallitash" class="form-label">Szállítás helye</label>
            <input type="text" class="form-control" name="szallitash" id="szallitash" value="">
        </div>
               <div class="mb-3 col-6">
            <label for="megjegyzes" class="form-label">Megjegyzés</label>
            <input type="text" class="form-control" name="megjegyzes" id="megjegyzes" value="">
        </div>
 </div>
        <div class="row">
        <div class="mb-3 col-6">
            <label for="szallitash" class="form-label">Szállítás helye</label>
            <input type="text" class="form-control" name="szallitash" id="szallitash" value="">
        </div>
               <div class="mb-3 col-6">
            <label for="megjegyzes" class="form-label">Megjegyzés</label>
            <input type="text" class="form-control" name="megjegyzes" id="megjegyzes" value="">
        </div>
 </div>
    <div class="row">
        
  <div class="mb-3 col-6">Válasszon fizetési módot:
  <input type="radio" id="kpenz" name="fizetestipus" value="kpenz">
  <label for="html">Készpénz</label></div><div class="mb-3 col-6">
  <input type="radio" id="bkartya" name="fizetestipus" value="bkartya">
  <label for="css">Bankkártya</label></div>
 </div>
 <button type="submit" class="btn btn-success" value="1" name="feltoltesTV">Feltöltés</button>
</form>
