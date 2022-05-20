<?php  include 'inc/header.php'; ?>

<?php
$errorMsg = [];

if(!empty($_SESSION['su_errorMsg'])){
    $errorMsg = $_SESSION['su_errorMsg'];
}

?>

<div class="container w-25 m-auto text-black">
    <?php foreach ($errorMsg as $msg): ?>
    <h6 class="m-1 text-danger"><?php echo $msg ?></h6>
    <?php endforeach; ?>
    <form method="post" action="singupController.php">
        <div class="form-group m-1">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp">
        </div>
        <div class="form-group m-1">
            <label for="f_name">Jméno</label>
            <input type="text" class="form-control" name="f_name" id="f_name" aria-describedby="name" placeholder="Jméno">
        </div>
        <div class="form-group m-1">
            <label for="s_name">Příjmení</label>
            <input type="text" class="form-control" name="s_name" id="s_name" aria-describedby="name" placeholder="Příjmení">
        </div>
        <div class="form-group m-1">
            <label for="phone">Telefon</label>
            <input type="tel" class="form-control" name="phone" id="phone" placeholder="Příjmení">
        </div>
        <div class="form-group m-1">
            <label for="password">Heslo</label>
            <input type="password" class="form-control" name="password" id="password" placeholder="Heslo">
        </div>
        <div class="form-group m-1">
            <label for="password2">Heslo znovu</label>
            <input type="password" class="form-control" name="password2" id="password2" placeholder="Heslo">
        </div>
        <button type="submit" class="btn btn-primary bg-primary border-0 m-1 ">Zaregistrovat se</button>
    </form>
</div>

<!-- Add previously entered values -->

<?php if (!empty($_SESSION['su_errorMsg'])): ?>
<script>$("#email").val('<?php echo $_SESSION['su_values']['email'] ?>')</script>
<script>$("#f_name").val('<?php echo $_SESSION['su_values']['f_name'] ?>')</script>
<script>$("#s_name").val('<?php echo $_SESSION['su_values']['s_name'] ?>')</script>
<script>$("#phone").val('<?php echo $_SESSION['su_values']['phone'] ?>')</script>
<?php endif;?>

<?php if (!empty($_SESSION['su_errorValues'])): ?>
    <?php foreach ($_SESSION['su_errorValues'] as $errorValue): ?>
        <script>$('#<?php echo $errorValue?>').css("border-color","red")</script>
    <?php endforeach;?>
<?php endif;?>



<?php include "inc/footer.php";?>
