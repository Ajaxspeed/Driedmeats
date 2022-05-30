<?php require 'inc/header.php' ?>
<?php require 'functions/adminRequired.php' ?>

<h1 class="text-center text-black mt-5">Nový produkt</h1>
<div class="d-flex w-75 justify-content-center mx-auto text-black">
    <div class="container w-25">
        <form method="post" action="#">
            <div class="form-group m-1">
                <label for="name">Název položky</label>
                <input type="text" class="form-control" name="name" id="name">
            </div>
            <div class="form-group m-1">
                <label for="description">Popis</label>
                <textarea name="description" class="form-control" id="description" style="max-height: 250px"></textarea>
            </div>
            <div class="form-group m-1">
                <label for="size">Velikost</label>
                <input type="text" class="form-control" name="size" id="size">
            </div>
            <div class="form-group m-1">
                <label for="price">Cena v Kč</label>
                <input type="text" class="form-control" name="price" id="price">
            </div>
            <div class="form-group m-1">
                <label for="image">Název obrázku</label>
                <input type="text"  class="form-control" name="image" id="image" accept="image/png, image/jpeg">
            </div>
        </form>
    </div>

    <div class="container w-25 justify-content-center">
        <h5> Náhled produktu</h5>
        <div class="card" style="width=300px;height: auto">
            <div class="container w-100 p-0">
                <img class="card-img-top" src="" alt="Náhled produktu" width="300" height="auto" id="pre_img">
            </div>
            <div class="card-body text-black">
                <h4 class="card-title" id="pre_name">Název</h4>
                <p class="card-text" style="min-height: 100px" id="pre_desc">popis</p>
                <h5 id="pre_size">množství</h5>
                <h4 id="pre_price">?? Kč</h4>
            </div>
            <div class="d-flex mt-4">
                <button class="btn btn-primary m-1" disabled>Přidat do košíku</button>
            </div>
        </div>
    </div>

</div>


<?php require 'inc/footer.php' ?>

<script>
    $('#name').change(function (){
        $('#pre_name').html($(this).val())
    })
    $('#description').change(function (){
        $('#pre_desc').html($(this).val())
    })
    $('#size').change(function (){
        $('#pre_size').html($(this).val())
    })
    $('#price').change(function (){
        $('#pre_price').html($(this).val()+" Kč")
    })
    $('#image').change(function (){
        $('#pre_img').attr('src',"res/"+$(this).val())
    })


</script>
