<main class="container">
    <div class= "row">
        <div class="col-lg-3">
            <div class="card bg-first p-4 mb-3" style="max-width: 80%; margin: 3rem auto;">
                <h3><?= getUsersCount($conn); ?></h3>
                <p style="font-weight:200">Users</p>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card bg-secound p-4 mb-3" style="max-width: 80%; margin: 3rem auto;">
                <h3><?= getProductsCount($conn); ?></h3>
                <p style="font-weight:200">Products</p>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card bg-third p-4 mb-3" style="max-width: 80%; margin: 3rem auto;">
                <h3><?= getCategoriesCount($conn); ?></h3>
                <p style="font-weight:200">Categories</p>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card bg-fourth p-4 mb-3" style="max-width: 80%; margin: 3rem auto;">
                <h3><?= getOrdersCount($conn); ?></h3>
                <p style="font-weight:200">Orders</p>
            </div>
        </div>
    </div>
    <div class="card mt-4">
        <div class="card-body">
            <canvas id="chLine"></canvas>
        </div>
    </div>
</main>
<script type="text/javascript" src="/public/js/chart.min.js"></script>
<script>

var chLine = document.getElementById("chLine");
const labels =  ['Users', 'Products', 'Categories', 'Orders'];
const data = {
    labels: labels,
    datasets: [{
        label: 'Statistics',
        data: [<?= getUsersCount($conn) ?>, <?= getProductsCount($conn) ?>, <?= getCategoriesCount($conn) ?>, <?= getOrdersCount($conn) ?>],
        backgroundColor: [
            'rgba(255, 99, 132, 0.2)',
            'rgba(255, 159, 64, 0.2)',
            'rgba(255, 205, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)'
        ],
        borderColor: [
            'rgb(255, 99, 132)',
            'rgb(255, 159, 64)',
            'rgb(255, 205, 86)',
            'rgb(75, 192, 192)',
        ],
        borderWidth: 1
    }]
};
if (chLine) {
    new Chart(chLine, {
        type: 'bar',
        data: data,
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
}

</script>