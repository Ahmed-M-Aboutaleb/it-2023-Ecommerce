<main class="container product">
    <div class="row"> 
        <div class="col-lg-6">
            <?php echo '<img src="/public/images/products/'. $product["image"] . '" alt="lol">' ?>
        </div>
        <div class="col-lg-6 info">
            <h1 class="text-center display-4 title"><?php echo $product["name"]; ?></h1>
            <p class="text-center text-body-secondary subTitle">Description: <?php echo $product["description"]; ?></p>
            <p class="text-center text-body-secondary subTitle">Price: <?php echo $product["price"]; ?>$</p>
            <p class="text-center text-body-secondary subTitle">Category: <?php echo $category["name"]; ?></p>
            <p class="text-center text-body-secondary subTitle">Seller: <?php echo $product["seller"]; ?></p>
            <p class="text-center text-body-secondary subTitle">Rating: <?php echo $product["rating"]; ?> out of 5</p>
            <div class="text-center">
                <a href="cart.php?id=<?php echo $product["id"]; ?>" class="btn btn-main">Buy!</a>
            </div>
        </div>
    </div>
    
</main>