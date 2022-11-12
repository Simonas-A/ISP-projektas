<?php
    include("prekes_db_connect.php");
    $id = $_GET['id'];
    $payment_type = $_GET['ptype'];
    echo $id;
//    $q = "
//            INSERT INTO preke_pirkimai_tarpinis (fk_preke_id, kiekis) VALUES ((SELECT id from prekes where Id = $id), 1)
//    ";
//    mysqli_query($con,$q);
//	header('location:operacija1.php');
?>

<?php
if (!isset($_POST["payment_type"])) {
    ?>
<h3>Apmokėjimas</h3>
<div class="container">
    <form method='post'>
        <label for="p_type">Pasirinkite apmokėjimo būdą:</label>
        <select name="p_type" id="p_type">
        <option value="kortele">Kortele</option>
        <option value="grynais">Grynais</option>
        <option value="bankopavedimu">Banko pavedimu</option>
        </select>
        <input type='submit' name='payment_type' value='patvirtinti' class="btnbtn-default" required >
    </form>
    </div>
<?php
}
?>

<?php
if (isset($_POST["payment_type"])) {
    if ($_POST['p_type']=="kortele") {
    ?>
        <form method='post' action="payment_confirmation.php">
            <div class="form-group col-lg-4">
            <label for="adresas" class="control-label">Kortelės nr:</label>
                <input name='adresas' type='text' class="form-control input-sm" required>
                <br>
            <label for="adresas" class="control-label">Vardas Pavardė:</label>
                <input name='adresas' type='text' class="form-control input-sm" required>
                <br>
            <label for="adresas" class="control-label">CVC:</label>
                <input name='adresas' type='text' class="form-control input-sm" required>
                <br>
            <label for="adresas" class="control-label">Mėnesis:</label>
                    <select name="month" size='1'>
                        <?php
                        for ($i = 1; $i < 13; $i++) {
                            echo "<option value='$i'>$i</option>";
                        }
                        ?>
                    </select>
            <label for="adresas" class="control-label">Metai:</label>
                    <select name="month" size='1'>
                        <?php
                        for ($i = (int)date('Y'); $i < (int)date('Y')+6; $i++) {
                            echo "<option value='$i'>$i</option>";
                        }
                        ?>
                    </select>
                <br>
                <input type='submit' name='payment_info' value='patvirtinti kortelės duomenis' class="btnbtn-default" required >
            </div>
        </form>
        <form method="post" action="krepselis.php">
        <div class="col-lg-4">
            <input type="submit"
                value="Grįžti"
                name="btnkrepselis">
        </div>
        </form>
    <?php
    }
    
    if ($_POST['p_type']=="grynais") {
    ?>
        <?php header("location:payment_confirmation.php"); ?>
    <?php
    }
    
    if ($_POST['p_type']=="bankopavedimu") {
    ?>
        <form method='post' action="payment_confirmation_bank.php">
            <div class="form-group col-lg-4">
                <p> Bankas: KtuBankas </p>
                <p> Banko sąskaita: 121212121212KTU </p>
                <p> Suma: \\ </p>
                <p> Paskirtis: Užsakymas \\\ </p>
                <input type='submit' name='confirmation' value='supratau' class="btnbtn-default" required >
            </div>
        </form>
        <form method="post" action="krepselis.php">
        <div class="col-lg-4">
            <input type="submit"
                value="Grįžti"
                name="btnkrepselis">
        </div>
        </form>
    <?php
    }
}
?>
