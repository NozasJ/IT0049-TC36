
<main>
    <h1>Customers Directory</h1>
    
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Full Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Creation Date</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($customers as $customer): ?>
            <tr>
                <td><?= $customer['id']; ?></td>
                <td><?= $customer['full_name']; ?></td>
                <td><?= $customer['email']; ?></td>
                <td><?= $customer['phone']; ?></td>
                <td><?= $customer['created_at']; ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</main>
