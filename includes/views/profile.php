<main class="container profile">
    <div class="row" style="width:100%">
        <div class="col-lg-12 mb-3">
            <div class="card">
                <div class="card-body">
                    <form action="/profile.php" method="post">
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Name</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <input type="text" class="form-control" name="name" value="<?= $_SESSION["name"]; ?>">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Email</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <input type="text" class="form-control" name="email" value="<?= $_SESSION["email"]; ?>">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Password</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <input name="password" type="password" class="form-control">
                            </div>
                        </div>
                        <?php if($error) { echo "<p class='text-center'>".$error."</p>"; } ?>
                        <div class="row btns">
                            <div class="col-lg-7 mb-3"><a href="logout.php" class="btn btn-danger">Logout</a></div>
                                <div class="col-lg-5 mb-3 text-secondary">
                                    <input type="submit" name="update" class="btn btn-main px-4" value="Save Changes">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-12 mb-3">
                <div class="card">
                    <h2 class="card-title text-center">Your orders</h2>
                    <div class="card-body">
                        <?php if($orders): ?>
                            <?php foreach($orders as $order): ?>
                                <hr>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Order date</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <p><?= $order["date"]; ?></p>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Order status</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <p><?php print ($order["status"] ? 'Approved' : 'Pending') ?></p>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Product quantity</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <p><?= $order['quantity'] ?></p>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Order total</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <p><?= $order["totalPrice"]; ?>$</p>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Order items</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <?= findOneProduct($conn, $order["productId"])["name"]; ?>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <p class="text-center">☹️ You have no orders yet.</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>