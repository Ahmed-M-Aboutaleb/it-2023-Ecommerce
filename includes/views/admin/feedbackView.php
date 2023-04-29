<main class="container d-flex justify-content-center align-items-center" style="min-height: 80vh;">
    <div class="card" style="width: 20rem;">
        <div class="card-body">
            <form method="post" action="feedback.php?id=<?= $id ?>" class="needs-validation" novalidate enctype="multipart/form-data">
                <div class="mb-3">
                    <input class="form-control" type="text" value="<?= $feedback['name'] ?>" name="name" placeholder="Name" required>
                </div>
                <div class="mb-3">
                    <input class="form-control" type="email" value="<?= $feedback['email'] ?>" name="email" placeholder="Email" required>
                </div>
                <div class="mb-3">
                    <textarea class="form-control" rows="3" name="message"  placeholder="Feedback" required><?= $feedback['feedback'] ?></textarea>
                </div>
                <div class="mb-3">
                    <input class="form-control" value="<?= $feedback['date'] ?>" type="text" name="date" placeholder="date (year-month-day)">
                </div>
                <div class="mb-3">
                    <p class="text-center"><?= $error ?></p>
                </div>
                <div class="mb-3">
                    <input class="btn btn-success" type="submit" name="update" value="Update">
                </div>
            </form>
            <a href="/admin/feedback.php?delete=<?= $id ?>" class="btn btn-danger">Delete</a>
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