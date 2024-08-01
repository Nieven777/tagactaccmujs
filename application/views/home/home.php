<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>CMU JS</title>
    <link rel="icon" type="image/x-icon" href="assets/img/cmujs.png" />
    <!-- Font Awesome icons (free version) -->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap) -->
    <link href="<?php echo base_url('css/home/styles.css'); ?>" rel="stylesheet" />
    <style>
        .boundary {
            border: 1px solid #ddd;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light" id="mainNav">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="<?php echo base_url(); ?>">CMU JS</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="<?php echo base_url(); ?>">Home</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle px-lg-3 py-3 py-lg-4" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Volumes</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <?php if (!empty($volumes)): ?>
                                <?php foreach ($volumes as $volume): ?>
                                    <?php if ($volume['published'] != 0): ?>
                                        <li><a class="dropdown-item" href="#volume-<?php echo $volume['volumeid']; ?>"><?php echo $volume['vol_name']; ?></a></li>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <li><a class="dropdown-item" href="#">No Volumes Available</a></li>
                            <?php endif; ?>
                        </ul>
                    </li>
                    <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="<?php echo base_url('home/about'); ?>">About</a></li>
                    <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="<?php echo base_url('home/archives'); ?>">Archives</a></li>
                </ul>
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="<?php echo base_url('registration/login'); ?>">Login</a></li>
                    <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="<?php echo base_url('registration/signup'); ?>">Register</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Page Header -->
    <header class="masthead" style="background-image: url('<?php echo base_url('assets/img/cmuv4.jpg'); ?>')">
        <div class="container position-relative px-4 px-lg-5 boundary">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="site-heading">
                        <span class="subheading">Journal of Science</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <div class="container px-4 px-lg-5 boundary">
        <h2>Latest Issues</h2>
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <?php foreach ($volumes as $volume): ?>
                    <?php if ($volume['published'] != 0): ?>
                        <hr class="my-4 thick-hr" />
                        <div id="volume-<?php echo $volume['volumeid']; ?>" class="volume-section boundary">
                            <h1><?php echo $volume['vol_name']; ?></h1>
                            <?php foreach ($articleData as $article): ?>
                                <?php if ($article->vol_name == $volume['vol_name']): ?>
                                    <div class="article-container boundary">
                                        <a href="<?php echo site_url('home/post/'.$article->slug); ?>">
                                            <h3 class="post-title"><?php echo $article->title; ?></h3>
                                            <p><strong>DOI:</strong> <?php echo $article->doi; ?></p>
                                            <p><strong>Keywords:</strong> <?php echo $article->keywords; ?></p>
                                            <p class="post-subtitle"><strong>Abstract:</strong> <?php echo isset($article->abstract) && strlen($article->abstract) > 250 ? substr($article->abstract, 0, 250) . '...' : $article->abstract; ?></p>
                                        </a>
                                        <p class="post-meta">This Article was published On: <?php echo date('F d, Y', strtotime($article->created_at)); ?></p>
                                        <div class="d-flex justify-content-end mb-4">
                                            <a class="btn btn-primary text-uppercase" href="<?php echo site_url('home/post/'.$article->slug); ?>"><small>Read More...</small></a>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JS -->
    <script src="js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS -->
    <script src="js/scripts.js"></script>
</body>
</html>
