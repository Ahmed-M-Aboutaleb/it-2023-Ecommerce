<main class="container">
    <h1 class="display-4 text-center" style="margin-bottom: 3rem;">Admin Dashboard</h1>
    <div class= "row">
        <div class="col-lg-6">
            <div class="card text-dark bg-light mb-3" style="max-width: 80%; margin: 3rem auto;">
                <div class="card-header">Users</div>
                <div class="card-body">
                    <h5 class="card-title">Total users: <?php echo getUsersCount($conn); ?></h5>
                    <h6>Latest users:</h6>
                    <ul class="adminList">
                        <?php 
                            if($users) {
                                while($user = $users->fetch_assoc()) {
                                    echo "<li>";
                                    echo "<p>" . $user['name'] . "</p> <div><a class='btn btn-primary' href='/admin/user.php?id={$user['id']}'>View</a></div>";
                                    echo "</li>";
                                }
                            } else {
                                echo "<p>☹️ No users found!</p>";
                            }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card text-dark bg-light mb-3" style="max-width: 80%; margin: 3rem auto;">
                <div class="card-header">Products</div>
                <div class="card-body">
                    <h5 class="card-title">Total products: <?php echo getProductsCount($conn); ?></h5>
                    <h6>Latest products:</h6>
                    <ul class="adminList">
                        <?php 
                        if($products) {
                            while($product = $products->fetch_assoc()) {
                                echo "<li>";
                                echo "<p>" . $product['name'] . "</p> <div><a class='btn btn-primary' href='/admin/product.php?id={$product['id']}'>View</a></div>";
                                echo "</li>";
                            }
                        } else {
                            echo "<p>☹️ No products found!</p>";
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card text-dark bg-light mb-3" style="max-width: 80%; margin: 3rem auto;">
                <div class="card-header">Categories</div>
                <div class="card-body">
                    <h5 class="card-title">Total categories: 4</h5>
                    <ul class="adminList">
                        <?php 
                            if($categories) {
                                while($category = $categories->fetch_assoc()) {
                                    echo "<li>";
                                    echo "<p>" . $category['name'] . "</p> <div><a class='btn btn-primary' href='/admin/category.php?id={$category['id']}'>View</a></div>";
                                    echo "</li>";
                                }
                            } else {
                                echo "<p>☹️ No users found!</p>";
                            }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card text-dark bg-light mb-3" style="max-width: 80%; margin: 3rem auto;">
                <div class="card-header">Orders</div>
                <div class="card-body">
                    <h5 class="card-title">Total orders: 5</h5>
                    <ul class="adminList">
                        <?php 
                            if($orders) {
                                while($order = $orders->fetch_assoc()) {
                                    echo "<li>";
                                    echo "<p>" . $order['id'] . "</p> <div><a class='btn btn-primary' href='/admin/order.php?id={$order['id']}'>View</a></div>";
                                    echo "</li>";
                                }
                            } else {
                                echo "<p>☹️ No users found!</p>";
                            }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</main>