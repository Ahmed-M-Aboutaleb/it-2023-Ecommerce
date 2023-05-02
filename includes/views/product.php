<main class="container product">
    <div class="row"> 
        <div class="col-lg-6">
            <?= "<img src='/public/images/products/{$product["image"]}' alt='Product Image'>" ?>
        </div>
        <div class="col-lg-6 info">
            <h1 class="text-center display-4 title"><?= $product["name"]; ?></h1>
            <p class="text-center text-body-secondary subTitle">Description: <?= $product["description"]; ?></p>
            <p class="text-center text-body-secondary subTitle">Price: <?= $product["price"]; ?>$</p>
            <p class="text-center text-body-secondary subTitle">Category: <?= $category["name"]; ?></p>
            <p class="text-center text-body-secondary subTitle">Seller: <?= $product["seller"]; ?></p>
            <p class="text-center text-body-secondary subTitle">Rating: <?= $product["rating"]; ?> out of 5</p>
            <div class="text-center">
                <a href="cart.php?id=<?= $product["id"]; ?>" class="btn btn-main">Buy!</a>
            </div>
        </div>
    </div>
    
</main>