<?php helper('form'); ?>
<main>
    <form action="<?= site_url('customers/update/' . $customer['id']) ?>" method="post" novalidate>
        <?= csrf_field() ?>

        <div class="container">
            <label for="full_name">Full Name</label>
            <input name="full_name" id="full_name" type="text" value="<?= old('full_name', $customer['full_name']) ?>">
            <?= validation_show_error('full_name') ?>

            <label for="email">Email</label>
            <input name="email" id="email" type="text" value="<?= old('email', $customer['email']) ?>">
            <?= validation_show_error('email') ?>

            <label for="phone">Phone</label>
            <input name="phone" id="phone" type="text" value="<?= old('phone', $customer['phone']) ?>">
            <?= validation_show_error('phone') ?>

            <br><br>
            <button type="submit">Update Customer</button>
        </div>
    </form>
</main>
