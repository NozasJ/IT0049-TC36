<?php helper('form'); ?>
<main>
    <form action="<?= site_url('users/update/' . $user['id']) ?>" enctype="multipart/form-data" method="post" novalidate>
        <?= csrf_field() ?>

        <div class="container">
            <label for="username">Username</label>
            <input name="username" id="username" type="text" value="<?= old('username', $user['username']) ?>">
            <?= validation_show_error('username') ?>
            <label for="full_name">Full Name</label>
            <input name="full_name" id="full_name" type="text" value="<?= old('full_name', $user['full_name']) ?>">
            <?= validation_show_error('full_name') ?>
            <label for="avatar">Profile Picture (JPG/PNG, Max 2MB)</label>
            <?php if (! empty($user['avatar']) && file_exists(FCPATH . 'uploads/' . $user['avatar'])): ?>
                <p>Current Avatar:<br>
                    <?php $currentUrl = base_url('uploads/' . $user['avatar']); ?>
                    <img src="<?= esc($currentUrl, 'attr') ?>" alt="Current Avatar" style="width: 80px; height: 80px; border-radius: 50%; object-fit: cover;">
                </p>
            <?php endif; ?>
        
            <input type="file" name="avatar" id="avatar" accept="image/jpeg,image/png,image/jpg">
            <?= validation_show_error('avatar') ?>

            <button type="submit">Update user</button>
        </div>
    </form>
</main>
