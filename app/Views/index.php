<main>
        <?php if (session()->get('isLoggedIn')): ?>
                <p>Welcome, <?= htmlspecialchars(session()->get('username')) ?>! 
                <br>
                <a href="<?= site_url('logout') ?> "style="background-color: red;">Logout</a>
                </p>
        <?php endif; ?>
        <a href="<?= 'customers' ?>" style="width: 200px;">Customers</a>
        <a href="<?= 'users' ?>"style="width: 200px;">Users</a>
</main>