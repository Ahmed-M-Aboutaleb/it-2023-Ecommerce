<main class="h-100 h-custom">
    <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12">
                <div class="card card-registration card-registration-2" style="border-radius: 15px;">
                    <div class="card-body p-0">
                        <div class="row g-0">
                            <div class="col-lg-8">
                                <div class="p-5">
                                    <?php if($products):?>
                                        <div class="d-flex justify-content-between align-items-center mb-5">
                                            <h1 class="fw-bold mb-0 text-black">Shopping Cart</h1>
                                            <h6 class="mb-0 text-muted"><?php echo count($products) ?> items</h6>
                                        </div>
                                        <hr class="my-4">
                                        <?php foreach($products as $product):?>
                                            <div class="row mb-4 d-flex justify-content-between align-items-center">
                                                <div class="col-md-2 col-lg-2 col-xl-2">
                                                    <img
                                                        src="/public/images/products/<?=$product['image']?>"
                                                        class="img-fluid rounded-3">
                                                </div>
                                                <div class="col-md-3 col-lg-3 col-xl-3">
                                                    <h6 class="text-black mb-0"><?=$product['name']?></h6>
                                                </div>
                                                <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                                                    <button class="btn btn-link px-2"
                                                        onclick="dec(<?php echo $product['id']; ?>)">
                                                        <i class="fas fa-minus"></i>
                                                    </button>
                                                    <input id="<?php echo $product['id']?>" min="0" name="quantity" value="<?= $product['quantity'] ?>" type="number"
                                                        class="form-control form-control-sm disabled" disabled />
                                                    <button class="btn btn-link px-2"
                                                        onclick="inc(<?php echo $product['id']; ?>)">
                                                        <i class="fas fa-plus"></i>
                                                    </button>
                                                </div>
                                                <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                                    <h6 class="mb-0 price"><?=$product['price']?>.00$</h6>
                                                </div>
                                                <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                                                    <button class="btn btn-link" onclick="remove(<?php echo $product['id']?>)" class="text-muted"><i class="fas fa-times"></i></button>
                                                </div>
                                            </div>
                                            <hr class="my-4">
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <h1 class="text-center">☹️ Cart is empty</h1>
                                    <?php endif; ?>
                                    <div class="pt-5">
                                        <h6 class="mb-0"><a href="/products.php" class="text-body"><i
                                            class="fas fa-long-arrow-alt-left me-2"></i>Back to shop</a></h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 bg-grey">
                                <div class="p-5">
                                    <h3 class="fw-bold mb-5 mt-2 pt-1">Summary</h3>
                                    <hr class="my-4">
                                    <?php if(isset($products) && $products != null): ?>
                                        <?php foreach($products as $product):?>
                                            <div class="d-flex justify-content-between mb-4">
                                                <h5 class="text-uppercase"><?=$product['name']?></h5>
                                                <h5><?=$product['price']?>.00 $</h5>
                                            </div>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <div class="d-flex justify-content-between mb-4">
                                            <h5 class="text-uppercase">No products</h5>
                                        </div>
                                    <?php endif; ?>
                                    <hr class="my-4">
                                    <div class="d-flex justify-content-between mb-5">
                                        <h5 class="text-uppercase">Total price</h5>
                                        <h5>0.00 $</h5>
                                    </div>
                                    <?php if(isset($_SESSION['id'])): ?>
                                        <button class="btn btn-dark btn-block btn-lg order">Order</button>
                                    <?php else: ?>
                                        <a type="button" href="/login.php" class="btn btn-dark btn-block btn-lg"
                                            data-mdb-ripple-color="dark">Signin</a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<script>

function calcPrice() {
    var total = 0;
    var prices = $('.price');
    prices.each(function (index) {
        var quantity = $(this).parent().siblings('.col-md-3.col-lg-3.col-xl-2.d-flex').children('input').val();
        total += parseInt($(this).text()) * parseInt(quantity);
    });
    document.querySelector('.d-flex.justify-content-between.mb-5 > h5:nth-child(2)').innerHTML = total + '.00 $';
}

$(document).ready(function() {
    calcPrice();
    $('.order').click(function() {
        $.post("/cart.php",
        {
            placeOrder: "true"
        }, function() {
            location.reload();
        }());
    });
});

function dec(id) {
    var currentVal = parseInt($(`#${id}`).val());
    $(`#${id}`).val(currentVal -1)
    $.post("/cart.php",
    {
        id: id,
        quantity: currentVal -1,
        update: "true"
    });
    calcPrice();
}

function inc(id) {
    var currentVal = parseInt($(`#${id}`).val());
    $(`#${id}`).val(currentVal +1)
    $.post("/cart.php",
    {
        id: id,
        quantity: currentVal +1,
        update: "true"
    });
    calcPrice();
}

function remove(id) {
    $.post("/cart.php",
    {
        id: id,
        remove: "true"
    }, function() {
        location.reload();
    }());
}

</script>