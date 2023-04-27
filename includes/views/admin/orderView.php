<main class="container d-flex justify-content-center align-items-center" style="min-height: 80vh;">
    <div class="card" style="width: 20rem;">
        <div class="card-body">
            <form method="post" class="needs-validation" novalidate action="order.php?id=<?php echo $order['id'] ?>">
                <div class="mb-3">
                    <select class="form-select" name="user" aria-label="Users" required>
                        <?php
                            if($users) {
                                while($user = $users->fetch_assoc()) {
                                    if($user['id'] == $order['user']) {
                                        echo "<option value='{$user['id']}' selected>{$user['name']} - {$user['id']}</option>";
                                    }else{
                                        echo "<option value='{$user['id']}'>{$user['name']} - {$user['id']}</option>";
                                    }
                                }
                            }
                        ?>
                    </select>
                </div>
                <div class="mb-3">
                <select class="form-select" name="product" aria-label="Products" required>
                    <?php
                        if($products) {
                            while($product = $products->fetch_assoc()) {
                                if($product['id'] == $order['product']) {
                                    echo "<option value='{$product['id']}' selected>{$product['name']} - {$product['id']}</option>";
                                }else{
                                    echo "<option value='{$product['id']}'>{$product['name']} - {$product['id']}</option>";
                                }
                            }
                        }
                    ?>
                </select>
                </div>
                <div class="mb-3">
                    <input class="form-control" type="text" name="date" value="<?php echo $order['date'] ?>" placeholder="date (year-month-day)">
                </div>
                <div class="mb-3">
                    <input class="form-control" type="text" name="totalPrice" value="<?php echo $order['totalPrice'] ?>" placeholder="total price">
                </div>
                <div class="mb-3 text-center">
                    <input type="checkbox" class="btn-check" name="status" <?php $order['status'] == 1 ? print "checked": "" ?> id="btn-check-outlined" autocomplete="off">
                    <label class="btn btn-outline-success" for="btn-check-outlined">Approved</label>
                </div>
                <div class="mb-3">
                    <p class="text-center"><?php echo $error ?></p>
                </div>
                <div class="mb-3">
                    <input class="btn btn-success" type="submit" name="update" value="Update">
                </div>
            </form>
            <a href="/admin/order.php?delete=<?php echo $id ?>" class="btn btn-danger">Delete</a>
        </div>
    </div>
</main>


<script>
(() => {
    'use strict'
    $('.needs-validation').submit(function(event) {
        if (!this.checkValidity()) {
            event.preventDefault()
            event.stopPropagation()
        }
        this.classList.add('was-validated')
    })
})()

</script>