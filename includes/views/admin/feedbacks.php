<main class="container" style="margin-top: 4rem;">
    <h1 class="text-center mb-5">Feedbacks</h1> 
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Date</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    if($feedbacks):
                ?>
                        <?php while($feedback = $feedbacks->fetch_assoc()): ?>
                            <tr>
                                <th scope='row'><?= $feedback['id'] ?></th>
                                <td><?= $feedback['name'] ?></td>
                                <td><?= $feedback['email'] ?></td>
                                <td><?= $feedback['date'] ?></td>
                                <td><a class='btn btn-primary' href='/admin/feedback.php?id=<?= $feedback['id']?>'>View</a></td>
                            </tr>
                        <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan='6' class='text-center'>☹️ No Feedbacks found</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    <a class="btn btn-success" href="/admin/feedback.php">Add Feedback</a>
</main>