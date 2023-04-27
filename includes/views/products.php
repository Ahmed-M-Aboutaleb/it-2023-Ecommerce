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
                if($products):
            ?>
                    <div class="row">
                    <?php while($product = $products->fetch_assoc()): ?>
                        <div class="col-lg-4">
                            <div class="card shadow" style="width: clamp(225px, 90%, 18rem); height: 33rem; margin: 2rem auto;">
                                <a href='/product.php?id=<?= $product["id"]?>'>
                                    <img src='/public/images/products/<?= $product["image"]?>' class='card-img-top'>
                                    <div class="card-body">
                                        <h5 class='card-title text-center'><?= $product["name"] ?></h5>
                                        <ul class="list-unstyled d-flex justify-content-center mb-1">
                                            <li>
                                                <?php for($i = 0; $i < $product["rating"]; $i++): ?>
                                                    <i class="text-warning fa-solid fa-star"></i>
                                                <?php endfor; ?>
                                                <?php for($i = 0; $i < 5-$product["rating"]; $i++): ?>
                                                    <i class="text-muted fa-solid fa-star"></i>
                                                <?php endfor; ?>
                                            </li>
                                        </ul>
                                        <p class="card-text text-center"><?= $product["price"]?>.00</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    <?php endwhile; ?>
                    </div>
                <?php else: ?>
                    <h1 class="text-center" style="margin-top: 25vh;">☹️ No products found!</h1>
                <?php endif;?>
        </div>
    </div>
</main>