<main class="container d-flex justify-content-center align-items-center" style="min-height: 80vh;">
    <div class="card" style="width: 20rem;">
        <div class="card-body">
            <form method="post" action="feedback.php" class="needs-validation" novalidate enctype="multipart/form-data">
                <div class="mb-3">
                    <input class="form-control" type="text" name="name" placeholder="Name" required>
                </div>
                <div class="mb-3">
                    <input class="form-control" type="email" name="email" placeholder="Email" required>
                </div>
                <div class="mb-3">
                    <textarea class="form-control" rows="3" name="message" placeholder="Feedback" required></textarea>
                </div>
                <div class="mb-3">
                    <input class="form-control" type="text" name="date" placeholder="date (year-month-day)">
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