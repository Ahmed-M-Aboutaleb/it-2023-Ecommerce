<main class="container d-flex justify-content-center align-items-center" style="min-height: 80vh;">
    <div class="card" style="width: 20rem;">
        <div class="card-body">
            <form method="post" class="needs-validation" novalidate action="user.php">
                <div class="mb-3">
                    <input class="form-control" required type="text" name="name" placeholder="Name">
                </div>
                <div class="mb-3">
                    <input class="form-control" required type="email" name="email" placeholder="Email">
                </div>
                <div class="mb-3">
                    <input class="form-control" autocomplete="off" type="text" name="password" placeholder="Password">
                </div>
                <div class="mb-3">
                    <input class="form-control" type="text" name="date" placeholder="date (year-month-day)">
                </div>
                <div class="mb-3 text-center">
                    <input type="checkbox" class="btn-check" name="admin" id="btn-check-outlined" autocomplete="off">
                    <label class="btn btn-outline-success" for="btn-check-outlined">Admin</label>
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