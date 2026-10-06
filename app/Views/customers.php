<main>
    <h1>Customers Directory</h1>
    <a href ="<?= site_url('customers/new') ?>">+ Add New Customer</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Full Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Creation Date</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php if (! empty($customers)): ?>
                <?php foreach ($customers as $customer): ?>
                <tr>
                    <td><?= esc($customer['id']) ?></td>
                    <td><?= esc($customer['full_name']) ?></td>
                    <td><?= esc($customer['email']) ?></td>
                    <td><?= esc($customer['phone']) ?></td>
                    <td><?= esc($customer['created_at']) ?></td>
                    <td>
                        <a href="<?= site_url('customers/edit/' . $customer['id']) ?>">Edit</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6">No customers found.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</main>
