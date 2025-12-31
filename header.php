<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark" style="background: linear-gradient(90deg, #041E42, #1D428A);">
    <div class="container">
        <!-- Warriors Brand Logo -->
        <a class="navbar-brand d-flex align-items-center" href="<?php echo esc_url(home_url('/')); ?>">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/warriors-logo.png" 
                 alt="Warriors Logo" 
                 style="height: 50px; margin-right: 15px;">
            <div>
                <span class="fw-bold fs-4">Dub Nation</span>
                <br>
                <small class="text-light" style="font-size: 0.8rem;">Golden State Warriors Fan Blog</small>
            </div>
        </a>
        
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="mainNav">
            <!-- Simple Menu Items -->
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="<?php echo esc_url(home_url('/')); ?>">
                        <i class="bi bi-house-door me-1"></i> Home
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="bi bi-newspaper me-1"></i> Latest News
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="bi bi-calendar-event me-1"></i> Schedule
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="bi bi-bar-chart me-1"></i> Stats
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="bi bi-people me-1"></i> Roster
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="bi bi-chat-dots me-1"></i> Forum
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="bi bi-info-circle me-1"></i> About
                    </a>
                </li>
            </ul>
            
            <!-- Optional: Small search button -->
            <button class="btn btn-warning btn-sm ms-3" type="button" data-bs-toggle="collapse" data-bs-target="#searchCollapse">
                <i class="bi bi-search"></i>
            </button>
        </div>
    </div>
    
    <!-- Collapsible Search Bar -->
    <div class="collapse container-fluid bg-dark py-2" id="searchCollapse">
        <div class="container">
            <form method="get" action="<?php echo esc_url(home_url('/')); ?>" class="d-flex">
                <input type="search" name="s" class="form-control form-control-sm" placeholder="Search for Warriors news, players, games..." value="<?php echo get_search_query(); ?>">
                <button type="submit" class="btn btn-warning btn-sm ms-2">
                    Search
                </button>
            </form>
        </div>
    </div>
</nav>

<!-- Page Header -->
<header class="page-header bg-primary text-white py-5" style="background: linear-gradient(rgba(4, 30, 66, 0.9), rgba(29, 66, 138, 0.9)), url('https://images.unsplash.com/photo-1546519638-68e109498ffc?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80') center/cover;">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <?php if (is_home()): ?>
                    <h1 class="display-4 fw-bold mb-3 text-warning">Welcome to Dub Nation</h1>
                    <p class="lead fs-4 mb-4">Your ultimate source for Golden State Warriors news, game analysis, and fan community discussions</p>
                    <a href="#latest-posts" class="btn btn-warning btn-lg px-4 py-3 fw-bold">
                        <i class="bi bi-arrow-down-circle me-2"></i> Read Latest Posts
                    </a>
                <?php elseif (is_single()): ?>
                    <h1 class="display-5 fw-bold mb-3"><?php the_title(); ?></h1>
                    <div class="d-flex align-items-center text-light">
                        <span class="me-4"><i class="bi bi-calendar me-1"></i> <?php echo get_the_date(); ?></span>
                        <span><i class="bi bi-person me-1"></i> <?php the_author(); ?></span>
                    </div>
                <?php elseif (is_page()): ?>
                    <h1 class="display-5 fw-bold mb-3"><?php the_title(); ?></h1>
                <?php elseif (is_search()): ?>
                    <h1 class="display-5 fw-bold mb-3">Search Results</h1>
                    <p class="lead">You searched for: "<?php echo get_search_query(); ?>"</p>
                <?php elseif (is_archive()): ?>
                    <h1 class="display-5 fw-bold mb-3"><?php the_archive_title(); ?></h1>
                    <?php if (the_archive_description()): ?>
                        <p class="lead"><?php the_archive_description(); ?></p>
                    <?php endif; ?>
                <?php else: ?>
                    <h1 class="display-5 fw-bold mb-3">Dub Nation</h1>
                    <p class="lead">Golden State Warriors Fan Blog</p>
                <?php endif; ?>
            </div>
            <div class="col-lg-4 text-center d-none d-lg-block">
                <!-- Your Warriors Logo -->
                <div class="bg-warning p-3 rounded-circle d-inline-block" style="border: 5px solid white; box-shadow: 0 0 20px rgba(255,199,44,0.5);">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/warriors-logo.png" 
                         alt="Warriors Logo" 
                         style="width: 150px; height: 150px; object-fit: contain; filter: brightness(1.1);">
                </div>
                <h3 class="mt-4 text-white fw-bold">#DubNation</h3>
                <p class="text-light">Strength in Numbers</p>
            </div>
        </div>
    </div>
</header>

<!-- Main Content -->
<div class="container mt-4">
    <div class="row">
        <main class="col-lg-8">