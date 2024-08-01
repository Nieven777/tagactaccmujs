<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of Volumes</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
        }
        .container {
            padding-top: 30px;
            margin: auto;
            max-width: 1000px;
        }
        h1.title {
            text-align: center;
            color: #28a745;
            margin-bottom: 30px;
            text-transform: uppercase;
            font-size: 28px;
            border-bottom: 2px solid #28a745;
            padding-bottom: 10px;
        }
        .table {
            background-color: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        }
        .table thead {
            background-color: #28a745;
            color: #ffffff;
        }
        .table thead th {
            text-align: center;
        }
        .table tbody tr {
            transition: background-color 0.2s ease-in-out;
        }
        .table tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .table tbody tr:hover {
            background-color: #e9f5eb;
        }
        .btn-custom {
            background-color: #28a745;
            color: #ffffff;
            transition: background-color 0.3s ease;
        }
        .btn-custom:hover {
            background-color: #218838;
        }
        .btn-edit {
            background-color: #ffc107;
            color: #ffffff;
        }
        .btn-edit:hover {
            background-color: #e0a800;
        }
        .btn-danger-custom {
            background-color: #dc3545;
            color: #ffffff;
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
    <h1 class="title">List of Volumes</h1> 
    <div class="mb-3 text-end">
        <a href="<?= base_url('volume/db_createVolumes'); ?>" class="btn btn-custom">Create New Volume</a>
    </div>
    <table class="table table-hover">
        <thead>
        <tr>
            <th>Volume ID</th>
            <th>Status</th>
            <th>Volume Name</th>
            <th>Description</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($volumes as $volume): ?>
            <tr>
                <td><?= html_escape($volume->volumeid); ?></td>
                <td>
                    <form action="<?= base_url('volume/toggle_published/' . html_escape($volume->volumeid)); ?>" method="post">
                        <select name="published" onchange="this.form.submit()" class="form-control form-control-sm">
                            <option value="1" <?= $volume->published ? 'selected' : ''; ?>>Published</option>
                            <option value="0" <?= !$volume->published ? 'selected' : ''; ?>>Unpublished</option>
                        </select>
                    </form>
                </td>
                <td><?= html_escape($volume->vol_name); ?></td>
                <td><?= html_escape($volume->description); ?></td>
                <td>
                    <a href="<?= site_url('volume/toggle_archive/' . $volume->volumeid); ?>" class="btn btn-status btn-sm <?= $volume->archived ? 'btn-danger-custom' : 'btn-custom'; ?>">
                        <?= $volume->archived ? 'Unarchive' : 'Archive'; ?>
                    </a>
                    <a href="<?= base_url('volume/db_editVolume/' . html_escape($volume->volumeid)); ?>" class="btn btn-edit btn-sm">Edit</a>
                    <a href="<?= base_url('volume/delete/' . html_escape($volume->volumeid)); ?>" class="btn btn-danger-custom btn-sm" onclick="return confirm('Are you sure you want to delete this volume?')">Delete</a>
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
