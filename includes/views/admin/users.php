<main class="container" style="margin-top: 4rem;">
    <h1 class="text-center mb-5">Users</h1> 
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Date</th>
                    <th scope="col">Admin?</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    if($users){
                        while($user = $users->fetch_assoc()) {
                            echo "<tr>";
                            echo "<th scope='row'>" . $user['id'] . "</th>";
                            echo "<td>" . $user['name'] . "</td>";
                            echo "<td>" . $user['email'] . "</td>";
                            echo "<td>" . $user['date'] . "</td>";
                            print($user['isAdmin']) ?
                            "<td>Yes</td>"
                            : "<td>No</td>";
                            echo "<td><a class='btn btn-primary' href='/admin/user.php?id={$user['id']}'>View</a></td>";
                            echo "</tr>";
                    }
                } else {
                    echo "<tr>";
                    echo "<td colspan='6' class='text-center'>☹️ No users found</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    <a class="btn btn-success" href="/admin/user.php">Add User</a>
</main>