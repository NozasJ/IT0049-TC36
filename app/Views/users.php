<main>
    <h1>Users Directory</h1>
    
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Full Name</th>
                <th>Creation Date</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
            <tr>
                <td><?= $user['id']; ?></td>
                <td><?= $user['username']; ?></td>
                <td><?= $user['full_name']; ?></td>
                <td><?= $user['created_at']; ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</main>
