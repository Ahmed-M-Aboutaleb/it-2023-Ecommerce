<main class="container d-flex justify-content-center align-items-center" style="min-height: 80vh;">
    <div class="card" style="width: 20rem;">
        <div class="card-body">
            <form method="post" class="needs-validation" novalidate action="order.php">
                <div class="mb-3">
                    <select class="form-select" name="user" aria-label="Users" required>
                        <?php
                            if($users) {
                                while($user = $users->fetch_assoc()) {
                                    if($user['id'] == $_SESSION['id']) {
                                        echo "<option value='{$_SESSION['id']}' selected>{$_SESSION['name']} - {$_SESSION['id']}</option>";
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
                                echo "<option value='{$product['id']}'>{$product['name']} - {$product['id']}</option>";
                            }
                        }
                    ?>
                </select>
                </div>
                <div class="mb-3">
                    <input class="form-control" type="text" name="date" placeholder="date (year-month-day)">
                </div>
                <div class="mb-3">
                    <input class="form-control" type="text" name="totalPrice" value="<?php echo $order['totalPrice'] ?>" placeholder="total price">
                </div>
                <div class="mb-3 text-center">
                    <input type="checkbox" class="btn-check" name="status" id="btn-check-outlined" autocomplete="off">
                    <label class="btn btn-outline-success" for="btn-check-outlined">Approved</label>
                </div>
                <div class="mb-3">
                    <p class="text-center"><?php echo $error ?></p>
                </div>
                <div class="mb-3">
                    <input class="btn btn-success" type="submit" name="add" value="Add">
                </div>
            </form>
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