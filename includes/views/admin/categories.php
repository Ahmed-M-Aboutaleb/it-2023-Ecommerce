<main class="container" style="margin-top: 4rem;">
    <h1 class="text-center mb-5">Categories</h1> 
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Date</th>
                    <th scope="col">Admin id?</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    if($categories){
                        while($category = $categories->fetch_assoc()) {
                            echo "<tr>";
                            echo "<th scope='row'>" . $category['id'] . "</th>";
                            echo "<td>" . $category['name'] . "</td>";
                            echo "<td>" . $category['date'] . "</td>";
                            echo "<td><a class='text-decoration-none' href='/admin/user.php?id={$category['user']}'>" . $category['user'] . "</a></td>";
                            echo "<td><a class='btn btn-primary' href='/admin/category.php?id={$category['id']}'>View</a></td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr>";
                        echo "<td colspan='6' class='text-center'>☹️ No categories found</td>";
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
    </div>
    <a class="btn btn-success" href="/admin/category.php">Add Category</a>
</main>