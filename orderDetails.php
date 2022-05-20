<?php include 'inc/header.php'?>
<?php require 'userRequired.php' ?>

<?php $od_errorMsg = [];

if(!empty($_SESSION['od_errorMsg'])){
    $od_errorMsg = $_SESSION['od_errorMsg'];
}
?>

    <div class="container w-25 mx-auto text-black">
        <?php foreach ($od_errorMsg as $msg): ?>
            <h6 class="m-1 text-danger"><?php echo $msg ?></h6>
        <?php endforeach; ?>
        <form method="post" action="checkout.php">
            <div class="form_group m-1">
                <label for="email">Ulice</label>
                <input type="text" class="form-control" name="street" id="street" placeholder="Masná">
            </div>
            <div class="form_group m-1">
                <label for="email">Číslo popisné</label>
                <input type="text" class="form-control" name="number" id="number" placeholder="100/1">
            </div>
            <div class="form_group m-1">
                <label for="email">Obec</label>
                <input type="text" class="form-control" name="city" id="city" placeholder="Praha">
            </div>
            <div class="form_group m-1">
                <label for="email">PSČ</label>
                <input type="text" class="form-control" name="zip" id="zip" placeholder="110 00">
            </div>
            <div class="form_group m-1">
                <label for="shipping">Doručení</label>
                <select class="form-select" name="shipping" id="shipping">
                    <option value="1">Osobní odběr - Praha (0 Kč)</option>
                    <option value="2">Česká pošta (75 Kč)</option>
                    <option value="3">PPL (95 Kč)</option>
                </select>
            </div>
            <div class="d-flex justify-content-end mt-3">
                <button type="submit" class="btn btn-primary">Pokračovat</button>
            </div>
        </form>
    </div>

<?php if (!empty($_SESSION['od_errorMsg'])): ?>
    <script>$("#street").val('<?php echo $_SESSION['od_values']['street'] ?>')</script>
    <script>$("#number").val('<?php echo $_SESSION['od_values']['number'] ?>')</script>
    <script>$("#city").val('<?php echo $_SESSION['od_values']['city'] ?>')</script>
    <script>$("#zip").val('<?php echo $_SESSION['od_values']['zip'] ?>')</script>
    <script>$("#shipping").val('<?php echo $_SESSION['od_values']['shipping'] ?>')</script>
<?php endif;?>

<?php if (!empty($_SESSION['od_errorValues'])): ?>
    <?php foreach ($_SESSION['od_errorValues'] as $errorValue): ?>
        <script>$('#<?php echo $errorValue?>').css("border-color","red")</script>
    <?php endforeach;?>
<?php endif;?>


<?php include 'inc/footer.php'?>