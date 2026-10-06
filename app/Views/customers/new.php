<main>
    <h1>Add a Customer</h1>
    <?php helper('form'); ?>
    <form action="<?= site_url('customers/create') ?>" method="post" novalidate>
        <div class = "container">
            <?= csrf_field() ?>
            <label>
                Full Name
            </label>
            <input name='full_name' id='full_name' type='text' value="<?= old('full_name') ?>">
            <?= validation_show_error('full_name') ?>
            <label>
                Email
            </label>
            <input name='email' id='email' type='text' value="<?= old('email') ?>">
            <?= validation_show_error('email') ?>
            <label>
                Phone
            </label>
            <input name='phone' id='phone' type='text' value="<?= old('phone') ?>">
            <?= validation_show_error('phone') ?>
            <button type="submit" class="btn-primary">Save Customer</button>
        </div>
    </form>
</main>