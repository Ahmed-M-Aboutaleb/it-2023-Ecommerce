<main class="container login">
    <h1 class="text-center display-4 title">Signup</h1>
    <p class="text-center text-body-secondary subTitle">Hey enter your details to sign up your account </p>
    <form class="needs-validation" action="/signup.php" method="POST" novalidate>
        <div class="mb-4" style="position: relative;">
            <input type="text" class="form-control" name="name" placeholder="Enter your name" required>
            <div class="icon"><i class="fa-light fa-user"></i></div>
        </div>
        <div class="mb-4" style="position: relative;">
            <input type="email" class="form-control" name="email" placeholder="Enter your email" required>
            <div class="icon"><i class="fa-light fa-envelope"></i></div>
        </div>
        <div class="mb-4" style="position: relative;">
            <input type="password" autocomplete="off" class="form-control" name="password" placeholder="Enter your password" required>
            <div class="icon"><i class="fa-light fa-fingerprint"></i></div>
        </div>
        <?php if($error != '') { echo '<div class="alert alert-danger" role="alert">' . $error . '</div>'; }; ?>
        <button type="submit" name="signup" class="btn btn-primary">Submit</button>
        <div class="signup">
            <a href="/login.php">Have an account? login!</a>
        </div>
    </form>
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