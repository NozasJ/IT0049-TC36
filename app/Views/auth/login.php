<main>
  <?php if (session()->getFlashdata('error')): ?>
        <p style="color: red;"><?= session()->getFlashdata('error') ?></p>
    <?php endif; ?>

    <form method="post" action="<?= site_url('login') ?>">
        <?= csrf_field() ?>
        <label>Username:</label>
        <input type="text" name="username" value="<?= old('username') ?>" required>
        
        <label>Password:</label>
        <input type="password" name="password" required>
        
        <button type="submit">Log In</button>
    </form>
</main>