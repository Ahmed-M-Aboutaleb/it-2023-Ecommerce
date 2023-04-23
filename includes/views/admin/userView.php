<main class="container d-flex justify-content-center align-items-center" style="height: 80vh;">
    <div class="card" style="width: 20rem;">
        <div class="card-body">
            <form method="post" class="needs-validation" novalidate action="user.php?id=<?php echo $user['id'] ?>">
                <div class="mb-3">
                    <input class="form-control" type="text" name="name" value="<?php echo $user['name'] ?>" placeholder="Name" required>
                </div>
                <div class="mb-3">
                    <input class="form-control" type="email" name="email" value="<?php echo $user['email'] ?>" placeholder="Email" required>
                </div>
                <div class="mb-3">
                    <input class="form-control" type="text" name="password" placeholder="Password" required autocomplete="off">
                </div>
                <div class="mb-3">
                    <input class="form-control" type="text" name="date" value="<?php echo $user['date'] ?>" placeholder="date (year-month-day)">
                </div>
                <div class="mb-3 text-center">
                    <input type="checkbox" class="btn-check" name="admin" <?php $user['isAdmin'] == 1 ? print "checked": "" ?> id="btn-check-outlined" autocomplete="off">
                    <label class="btn btn-outline-success" for="btn-check-outlined">Admin</label>
                </div>
                <div class="mb-3">
                    <p class="text-center"><?php echo $error ?></p>
                </div>
                <div class="mb-3">
                    <input class="btn btn-success" type="submit" name="update" value="Update">
                </div>
            </form>
            <a href="/admin/user.php?delete=<?php echo $user['id'] ?>" class="btn btn-danger">Delete</a>
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