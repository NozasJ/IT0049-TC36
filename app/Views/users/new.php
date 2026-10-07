<main>
    <h1>Add a User</h1>
    <?php helper('form'); ?>
    <form action="<?= site_url('users/create') ?>" enctype="multipart/form-data" method="post" novalidate>
        <div class = "container">
            <?= csrf_field() ?>
            <label>
                Username
            </label>
            <input name='username' id='username' type='text' value="<?= old('username') ?>">
            <?= validation_show_error('username') ?>  
            <label>
                Full Name
            </label>
            <input name='full_name' id='full_name' type='text' value="<?= old('full_name') ?>">
            <?= validation_show_error('full_name') ?>      
            <label for="password">Password</label>
            <input name="password" id="password" type="password">
            <?= validation_show_error('password') ?>
            <label for="avatar">Profile Picture (JPG/PNG, Max 2MB)</label>
            <input type="file" name="avatar" id="avatar" accept="image/jpeg,image/png">
            <?= validation_show_error('avatar') ?>  
            <button type="submit" class="btn-primary">Save User</button>
        </div>
    </form>
</main>