<main class="container d-flex justify-content-center align-items-center" style="min-height: 80vh;">
    <div class="card" style="width: 20rem;">
        <div class="card-body">
            <form method="post" class="needs-validation" novalidate action="category.php?id=<?= $id; ?>">
                <div class="mb-3">
                    <input class="form-control" required type="text" name="name" placeholder="Name" value="<?= $category['name'] ?>">
                </div>
                <div class="mb-3">
                    <input class="form-control" type="text" name="date" value="<?= $category['date'] ?>" placeholder="date (year-month-day)">
                </div>
                <select class="form-select" name="admin" aria-label="Admins" required>
                    <?php
                        if($admins) {
                            while($admin = $admins->fetch_assoc()) {
                                if($admin['id'] == $category['user']) {
                                    echo "<option value='{$admin['id']}' selected>{$admin['name']} - {$admin['id']}</option>";
                                }else{
                                    echo "<option value='{$admin['id']}'>{$admin['name']} - {$admin['id']}</option>";
                                }
                            }
                        }
                    ?>
                </select>
                <div class="mb-3">
                    <p class="text-center"><?= $error ?></p>
                </div>
                <div class="mb-3">
                    <input class="btn btn-success" type="submit" name="update" value="Update">
                </div>
            </form>
            <a href="/admin/category.php?delete=<?= $id ?>" class="btn btn-danger">Delete</a>
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