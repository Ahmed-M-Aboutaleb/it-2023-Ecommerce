<main class="container d-flex justify-content-center align-items-center" style="min-height: 80vh;">
    <div class="card" style="width: 20rem;">
        <div class="card-body">
            <form method="post" action="product.php" class="needs-validation" novalidate enctype="multipart/form-data">
                <div class="mb-3">
                    <input class="form-control" type="text" name="name" placeholder="Name" required>
                </div>
                <div class="mb-3">
                    <textarea class="form-control" rows="3" name="description" placeholder="description" required></textarea>
                </div>
                <div class="mb-3">
                    <input class="form-control" type="text" name="price" placeholder="price" required>
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
                                if($seller['id'] == $_SESSION['id']) {
                                    echo "<option value='{$_SESSION['id']}' selected>{$_SESSION['name']} - {$_SESSION['id']}</option>";
                                }else{
                                    echo "<option value='{$seller['id']}'>{$seller['name']} - {$seller['id']}</option>";
                                }
                            }
                        }
                    ?>
                </select>
                </div>
                <div class="mb-3">
                    <input class="form-control" type="text" name="date" placeholder="date (year-month-day)">
                </div>
                <div class="mb-3">
                    <input class="form-control" type="text" name="rating" placeholder="Rating (0-5)" required>
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Image</label>
                    <input class="form-control" type="file" name="image" id="formFile">
                </div>
                <div class="mb-3">
                    <p class="text-center"><?= $error ?></p>
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