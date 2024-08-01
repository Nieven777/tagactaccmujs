<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users List</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Custom CSS styles */
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
        }

        .container {
            padding-top: 20px;
            margin: auto;
            max-width: 1000px;
        }

        h1.title {
            text-align: center;
            color: #28a745;
            margin-bottom: 20px;
            text-transform: uppercase;
            font-size: 32px;
            border-bottom: 3px solid #28a745;
            padding-bottom: 10px;
        }

        .table {
            background-color: #fff;
            border-radius: 0.5rem;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }

        .table thead th {
            background-color: #28a745;
            color: #fff;
            text-align: center;
            border: none;
        }

        .table tbody tr {
            transition: background-color 0.3s ease;
        }

        .table tbody tr:hover {
            background-color: #e8f5e9;
        }

        .table tbody td {
            vertical-align: middle;
            text-align: center;
            border: none;
        }

        .btn-custom {
            background-color: #28a745;
            color: #fff;
            transition: background-color 0.3s ease;
            border-radius: 0.25rem;
        }

        .btn-custom:hover {
            background-color: #218838;
        }

        .btn-danger-custom {
            background-color: #dc3545;
            color: #fff;
            border-radius: 0.25rem;
        }

        .btn-danger-custom:hover {
            background-color: #c82333;
        }

        .btn-status {
            margin-right: 5px;
        }
    </style>
</head>
<body>

<div class="container">
    <h1 class="title">Users List</h1>
    <div class="mb-3 text-end">
        <!-- <button class="btn btn-custom" onclick="location.href='<?= base_url('users/create'); ?>'" data-bs-toggle="tooltip" data-bs-placement="top" title="Add User">
            Add User
        </button> -->
    </div>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Profile Pic</th>
                <th>Complete Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Status</th> 
                <th>Date Created</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
            <tr>
                <td><img src="<?php echo base_url('./images/'.$user->profile_pic); ?>" alt="Profile Pic" width="50" class="rounded-circle"></td>
                <td><?php echo $user->complete_name; ?></td>
                <td><?php echo $user->email; ?></td>
                <td><?php echo ($user->role == 0) ? 'Admin' : (($user->role == 1) ? 'Evaluator' : 'Researcher'); ?></td>
                <td><?php echo ($user->status == 1) ? 'Active' : 'Inactive'; ?></td>
                <td><?php echo $user->date_created; ?></td>
                <td>
                    <!-- Status Toggle Button -->
                    <a href="<?php echo site_url('users/toggle_status/'.$user->userid); ?>" class="btn btn-status btn-sm <?php echo ($user->status == 1) ? 'btn-danger-custom' : 'btn-custom'; ?>">
                        <?php echo ($user->status == 1) ? 'Deactivate' : 'Activate'; ?>
                    </a>
                    <!-- <a href="<?php echo site_url('users/edit/'.$user->userid); ?>" class="btn btn-info btn-sm">Edit</a> -->
                    <a href="<?php echo site_url('users/delete/'.$user->userid); ?>" class="btn btn-danger-custom btn-sm" onclick="return confirm('Are you sure you want to delete this user?')">Delete</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
