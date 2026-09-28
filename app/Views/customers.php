
<main>
    <h1>Customers Directory</h1>
    
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Company</th>
                <th>Email</th>
                <th>Contact</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($customers as $customer): ?>
            <tr>
                <td><?= $customer['id']; ?></td>
                <td><?= $customer['name']; ?></td>
                <td><?= $customer['company']; ?></td>
                <td><?= $customer['email']; ?></td>
                <td><?= $customer['contact']; ?></td>
                <td><?= $customer['status']; ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</main>
