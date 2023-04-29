<main class="container profile">
    <div class="card">
        <div class="card-body">
            <form action="/profile.php" method="post">
                <div class="row mb-3">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Name</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <input type="text" class="form-control" name="name" value="<?php echo $_SESSION["name"]; ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Email</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <input type="text" class="form-control" name="email" value="<?php echo $_SESSION["email"]; ?>">
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
                    <div class="col-sm-7"><a href="logout.php" class="btn btn-danger">Logout</a></div>
                        <div class="col-sm-5 text-secondary">
                            <input type="submit" name="update" class="btn btn-main px-4" value="Save Changes">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>
</div>