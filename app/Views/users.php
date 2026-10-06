<main>
    <h1>Users Directory</h1>
    <a href ="<?= site_url('users/new') ?>">+ Add New User</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Full Name</th>
                <th>Creation Date</th>
                <th>Created at</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
            <tr>
                <td>
                    <?php if (! empty($user['avatar']) && file_exists(FCPATH . 'uploads/' . $user['avatar'])): ?>
                        <?php $url = base_url('uploads/' . $user['avatar']); ?>
                        <img src="<?= esc($url, 'attr') ?>" alt="Avatar" style="width: 50px; height: 50px; border-radius: 50%; object-fit: cover;">
                    <?php else: ?>
                    <?php $placeholderUrl = base_url('images/placeholder-avatar.jpg'); ?>
                        <img src="<?= esc($placeholderUrl, 'attr') ?>" alt="Placeholder Avatar" style="width: 50px; height: 50px; border-radius: 50%; object-fit: cover;">
                    <?php endif; ?>
                </td>
                <td><?= $user['id']; ?></td>
                <td><?= $user['username']; ?></td>
                <td><?= $user['full_name']; ?></td>
                <td><?= $user['created_at']; ?></td>
                <td>
                        <a href="<?= site_url('users/edit/' . $user['id']) ?>">Edit</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</main>
