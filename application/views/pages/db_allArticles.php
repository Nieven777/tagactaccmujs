<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Articles</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
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
            background-color: #ffffff;
            border-radius: 0.5rem;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .table thead {
            background-color: #28a745;
            color: #ffffff;
        }
        .table thead th {
            border: none;
            text-align: center;
        }
        .table tbody tr {
            transition: background-color 0.2s ease-in-out;
        }
        .table tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .table tbody tr:hover {
            background-color: #e8f5e9;
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
            background-color: #17a2b8;
            color: #ffffff;
        }
        .btn-edit:hover {
            background-color: #138496;
        }
        .btn-danger-custom {
            background-color: #dc3545;
            color: #ffffff;
        }
        .btn-danger-custom:hover {
            background-color: #c82333;
        }
        .file-link {
            color: #28a745;
        }
        .file-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
<div class="container">
    <h1 class="title">Manage Articles</h1>
    <div class="mb-3 text-end">
        <a href="<?php echo site_url('pages/db_authSubmission2'); ?>" class="btn btn-custom">Add Article</a>
    </div> 
    <table class="table table-hover">
        <thead>   
            <tr>
                <th>Title</th>
                <th>Author</th>
                <!-- <th>Volume ID</th> -->
                <th>File</th>
                
                <th>Actions</th> 
            </tr>
        </thead>
        <tbody>
        <?php foreach ($submittedArticles as $article): ?>
            <tr>
                <td><?= html_escape($article->title); ?></td>
                <td><?= html_escape($article->authors); ?></td>
                <!-- <td><?= html_escape($article->volumeid); ?></td> -->
                
                <td> 
                    <?php if ($article->filename): ?>
                        <a href="<?= base_url('files/' . html_escape($article->filename)); ?>" class="file-link">View PDF</a>
                    <?php else: ?>
                        No file uploaded
                    <?php endif; ?>
                </td>
                
                <td class="text-center">
                    <a href="<?= site_url('pages/db_AdminUpdate/' . html_escape($article->slug)); ?>" class="btn btn-edit btn-sm">Edit</a>
                    
                    <a href="<?= site_url('pages/deleteArticle/' . html_escape($article->articleid)); ?>" class="btn btn-danger-custom btn-sm" onclick="return confirm('Are you sure you want to delete this article?')">Delete</a>
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
