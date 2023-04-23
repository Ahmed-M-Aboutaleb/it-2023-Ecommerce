<main class="container products">
    <h1 class="display-2 text-center">Products</h1>
    <?php 
        if(isset($_GET["search"])) { 
            echo "<h4 class='display-6 text-center'>Results for: {$_GET["search"]}</h4>"; 
    } ?>
    <div class="row">
        <div class="col-lg-3">
            <h1 class="h2 pb-4">Categories</h1>
            <ul class="list-unstyled">
                <?php 
                
                    if($categories) {
                        echo "<li>";
                        echo "<h4>";
                        echo "<a class='text-decoration-none text-muted' href='/products.php'>All</a>";
                        echo "</h4>";
                        echo "</li>";
                        while($category = $categories->fetch_assoc()) {
                            echo "<li>";
                            echo "<h4>";
                            echo "<a class='text-decoration-none text-muted' href='/products.php?category={$category["id"]}'>{$category["name"]}</a>";
                            echo "</h4>";
                            echo "</li>";
                        }
                    }

                ?>
            </ul>
        </div>
        <div class="col-lg-9">
            <?php 
                if($products) {
                    echo '<div class="row">';
                    while($product = $products->fetch_assoc()) {
                        echo '<div class="col-lg-4">';
                        echo '<div class="card shadow" style="width: 18rem; height: 33rem; margin: 2rem auto;">';
                        echo "<a href='/product.php?id={$product["id"]}'>";
                        echo "<img src='/public/images/products/{$product["image"]}' class='card-img-top'>";
                        echo '<div class="card-body">';
                        echo "<h5 class='card-title text-center'>{$product["name"]}</h5>";
                        echo '<ul class="list-unstyled d-flex justify-content-center mb-1">';
                        echo '<li>';
                        for($i = 0; $i < $product["rating"]; $i++) {
                            echo '<i class="text-warning fa-solid fa-star"></i>';
                        }
                        for($i = 0; $i < 5-$product["rating"]; $i++) {
                            echo '<i class="text-muted fa-solid fa-star"></i>';
                        }
                        echo '</li>';
                        echo '</ul>';
                        echo '<p class="card-text text-center">$'. $product["price"] .'.00</p>';
                        echo '</div>';
                        echo '</a>';
                        echo '</div>';
                        echo '</div>';
                    }
                    echo '</div>';
                } else {
                    echo '<h1 class="text-center" style="margin-top: 25vh;">☹️ No products found!</h1>';
                }
            ?>
        </div>
    </div>
</main>