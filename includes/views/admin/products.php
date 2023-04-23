<main class="container products">
    <h1 class="text-center mb-5">Products</h1> 
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Date</th>
                    <th scope="col">User id</th>
                    <th scope="col">Category id</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    if($products){
                        while($product = $products->fetch_assoc()) {
                            echo "<tr>";
                            echo "<th scope='row'>" . $product['id'] . "</th>";
                            echo "<td>" . $product['name'] . "</td>";
                            echo "<td>" . $product['date'] . "</td>";
                            echo "<td><a class='text-decoration-none' href='/admin/user.php?id={$product['seller']}'>" . $product['seller'] . "</a></td>";
                            echo "<td><a class='text-decoration-none' href='/admin/category.php?id={$product['category']}'>" . $product['category'] . "</a></td>";
                            echo "<td><a class='btn btn-primary' href='/admin/product.php?id={$product['id']}'>View</a></td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr>";
                        echo "<td colspan='6' class='text-center'>☹️ No products found</td>";
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
    </div>
    <a class="btn btn-success" href="/admin/product.php">Add Product</a>
</main>