<?php require '../layouts/header.php'; ?>
<?php require '../database/db_connection.php'; ?>
<?php if ($auth->role() == 1) {
    echo '<script>window.location.href = "../categories/show-categories.php?na=true";</script>';
} else {
    $sql =
        'SELECT users.id,users.email,users.name, roles.name AS role FROM users JOIN roles ON users.roles = roles.id ORDER BY `users`.`id` ASC';
    $result = $conn->query($sql);
} ?>
<?php if ($auth->role() != 1): ?>
    <h1 class="text-center">Users</h1>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th scope="col">email</th>
                <th scope="col">Role</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
            <?php while ($data = $result->fetch_assoc()): ?>
                <tr>
                    <th scope="row"><?= $data['id'] ?></th>
                    <td><?= $data['name']; ?></td>
                    <td><?= $data['email']; ?></td>
                    <td><?= $data["role"] ?></td>
                    <td><a class="btn btn-outline-info me-2" href="edit-user.php?id=<?=$data["id"]?>">Edit</a><a class="btn btn-outline-danger" href="">Delete</a></td>
                </tr>
            <?php endwhile; ?>    
            <tbody>
            </tbody>
        </table>
        <?php endif; ?>



<?php require '../layouts/footer.php'; ?>
