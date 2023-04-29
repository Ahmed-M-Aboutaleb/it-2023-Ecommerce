<main class="container login">
    <h1 class="text-center display-4 title">FeedBack</h1>
    <p class="text-center text-body-secondary subTitle">Do you have a feedback or a Complaints? </p>
    <form action="/feedback.php" method="POST" class="needs-validation" novalidate>
        <div class="mb-4" style="position: relative;">
            <input type="email" class="form-control" name="email" placeholder="Enter your email" required>
            <div class="icon"><i class="fa-light fa-envelope"></i></div>
        </div>
        <div class="mb-4" style="position: relative;">
            <input type="text" class="form-control" name="name" placeholder="Enter your name" required>
            <div class="icon"><i class="fa-light fa-user"></i></div>
        </div>
        <div class="mb-4" style="position: relative;">
        <textarea class="form-control" rows="3" name="feedback" placeholder="Your Feedback/Complaint" required></textarea>
            <div class="icon"><i class="fa-light fa-comments"></i></div>
        </div>
        <?php if($error) { echo '<div class="alert alert-danger" role="alert">' . $error . '</div>'; }; ?>
        <button type="submit" name="Add" class="btn btn-primary">Submit</button>
    </form>
    <h2 class='mb-4 mt-4'>Our Location 📍</h2>
    <div class="embed-responsive embed-responsive-16by9">
        <iframe class="embed-responsive-item"  src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d5965.759249170937!2d31.22302278329073!3d30.096577582447487!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2seg!4v1682622565796!5m2!1sen!2seg" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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