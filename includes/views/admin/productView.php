<main class="container d-flex justify-content-center align-items-center" style="height: 80vh;">
    <div class="card" style="width: 20rem;">
        <div class="card-body">
            <form method="post" class="needs-validation" novalidate action="product.php?id=<?php echo $product['id'] ?>" enctype="multipart/form-data">
                <div class="mb-3">
                    <input class="form-control" type="text" name="name" value="<?php echo $product['name'] ?>" placeholder="Name" required>
                </div>
                <div class="mb-3">
                <textarea class="form-control" rows="3" name="description" placeholder="description" required><?php echo $product['description'] ?></textarea>
                </div>
                <div class="mb-3">
                    <input class="form-control" type="text" name="price" value="<?php echo $product['price'] ?>" placeholder="price" required>
                </div>
                <div class="mb-3">
                    <select class="form-select" name="categories" aria-label="Categories" required>
                        <?php
                            if($categories) {
                                while($category = $categories->fetch_assoc()) {
                                    if($category['id'] == $product['category']) {
                                        echo "<option value='{$category['id']}' selected>{$category['name']} - {$category['id']}</option>";
                                    }else{
                                        echo "<option value='{$category['id']}'>{$category['name']} - {$category['id']}</option>";
                                    }
                                }
                            }
                        ?>
                    </select>
                </div>
                <div class="mb-3">
                <select class="form-select" name="seller" aria-label="Sellers" required>
                    <?php
                        if($sellers) {
                            while($seller = $sellers->fetch_assoc()) {
                                if($seller['id'] == $product['seller']) {
                                    echo "<option value='{$seller['id']}' selected>{$seller['name']} - {$seller['id']}</option>";
                                }else{
                                    echo "<option value='{$seller['id']}'>{$seller['name']} - {$seller['id']}</option>";
                                }
                            }
                        }
                    ?>
                </select>
                </div>
                <div class="mb-3">
                    <input class="form-control" type="text" name="date" value="<?php echo $product['date'] ?>" placeholder="date (year-month-day)">
                </div>
                <div class="mb-3">
                    <input class="form-control" type="text" name="rating" value="<?php echo $product['rating'] ?>" placeholder="Rating (0-5)" required>
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Image</label>
                    <input class="form-control" type="file" name="image" id="formFile">
                </div>
                <div class="mb-3">
                    <p class="text-center"><?php echo $error ?></p>
                </div>
                <div class="mb-3">
                    <input class="btn btn-success" type="submit" name="update" value="Update">
                </div>
            </form>
            <a href="/admin/product.php?delete=<?php echo $id ?>" class="btn btn-danger">Delete</a>
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