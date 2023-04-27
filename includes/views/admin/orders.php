<main class="container" style="margin-top: 4rem;">
    <h1 class="text-center mb-5">Orders</h1> 
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">User id</th>
                    <th scope="col">Product id</th>
                    <th scope="col">Total price</th>
                    <th scope="col">Status</th>
                    <th scope="col">Date</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    if($orders){
                        while($order = $orders->fetch_assoc()) {
                            echo "<tr>";
                            echo "<th scope='row'>" . $order['id'] . "</th>";
                            echo "<td><a class='text-decoration-none' href='/admin/user.php?id={$order['user']}'>" . $order['user'] . "</a></td>";
                            echo "<td><a class='text-decoration-none' href='/admin/product.php?id={$order['productId']}'>" . $order['productId'] . "</a></td>";
                            echo "<th scope='row'>" . $order['totalPrice'] . "</th>";
                            print($order['status']) ?
                            "<td>Approved</td>"
                            : "<td>Pending</td>";
                            echo "<td>" . $order['date'] . "</td>";
                            echo "<td><a class='btn btn-primary' href='/admin/order.php?id={$order['id']}'>View</a></td>";
                            echo "</tr>";
                    }
                } else {
                    echo "<tr>";
                    echo "<td colspan='6' class='text-center'>☹️ No orders found</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    <a class="btn btn-success" href="/admin/order.php">Add Order</a>
</main>