<?php require 'cartBuilder.php'?>

<?php include 'inc/header.php' ?>

<?php
    $total = 0;
    $results = cartBuilder();
?>

    <div class="container w-75 mx-auto text-black">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Položka</th>
                <th scope="col">ID</th>
                <th scope="col">Velikost</th>
                <th scope="col">Množství</th>
                <th scope="col">Cena za ks</th>
                <th scope="col">Cena celkem</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($results as $result): ?>
            <tr>
                <th scope="row"><?php echo $result['name']; ?></th>
                <td><?php echo $result['id']; ?></td>
                <td><?php echo $result['size']; ?></td>
                <td class="d-flex flex-row">
                    <form class="d-flex flex-row gap-3" method="post" action="editCartItemCount.php">
                            <input type="hidden" name="id" value="<?php echo $result['id']; ?>">
                            <input type="number"  min="1" max="100" class="form-control-custom" id="<?php echo $result['id']; ?>" name="count" value="<?php echo $result['count']; ?>">
                            <button type="submit" class="btn btn-primary">Změnit množství</button>
                    </form>
                    <form method="post" action="removeFromCart.php">
                        <input type="hidden" name="id" value="<?php echo $result['id']; ?>">
                        <button type="submit" class="btn btn-primary">Odstranit</button>
                    </form>
                </td>
                <td><?php echo $result['price']; ?> Kč</td>
                <td><?php echo ($result['price']*$result['count']); ?> Kč</td>
            </tr>
            <?php $total += ($result['price']*$result['count']); // Count total price?>
            <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <th></th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><h5>Celkem:</h5></td>
                    <td><h5><?php echo $total ?> Kč</h5></td>
                </tr>
            </tfoot>
        </table>
        <div class="d-flex justify-content-end">
            <a href="#"><button class="btn btn-primary">Vytvořit objednávku</button></a>
        </div>
    </div>

<?php include 'inc/footer.php' ?>


