<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Users List</title>
    <style>
        table { width: 100%; 
        border-collapse: collapse; 
        margin-top: 20px; }
        th, td { 
            border: 1px solid #ddd; 
            padding: 10px; 
            text-align: left; }
        th { 
            background-color: #f4f4f4; 
        }
    </style>
</head>
<body>
    <h1>Users Directory</h1>
    
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
            <tr>
                <td><?= $user['id']; ?></td>
                <td><?= $user['name']; ?></td>
                <td><?= $user['email']; ?></td>
                <td><?= $user['role']; ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>