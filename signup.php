<?php  include 'inc/header.php'; ?>

<div class="container w-25 m-auto text-black">
    <form method="post" action="singupController.php">
        <div class="form-group m-1">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="Email">
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
            <label for="password">Heslo znovu</label>
            <input type="password" class="form-control" name="password2" id="password2" placeholder="Heslo">
        </div>
        <button type="submit" class="btn btn-primary bg-primary border-0 m-1 ">Zaregistrovat se</button>
    </form>
</div>
<?php include "inc/footer.php";?>
