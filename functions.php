<?php
// Theme setup
function warriors_theme_setup() {
    // Add theme support
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo');
    add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));
    
    // Register menus
    register_nav_menus(array(
        'main-menu' => 'Main Menu',
        'footer-menu' => 'Footer Menu'
    ));
    
    // Set thumbnail size
    add_image_size('blog-large', 800, 400, true);
    add_image_size('blog-small', 300, 200, true);
}
add_action('after_setup_theme', 'warriors_theme_setup');

// Load styles and scripts
function warriors_enqueue_scripts() {
    // Bootstrap 5 CSS
    wp_enqueue_style('bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css');
    
    // Bootstrap Icons
    wp_enqueue_style('bootstrap-icons', 'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css');
    
    // Theme styles
    wp_enqueue_style('warriors-style', get_stylesheet_uri());
    wp_enqueue_style('warriors-custom', get_template_directory_uri() . '/assets/css/custom.css');
    
    // Bootstrap JS Bundle
    wp_enqueue_script('bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js', array('jquery'), '5.3.0', true);
    
    // Custom JS
    wp_enqueue_script('warriors-custom-js', get_template_directory_uri() . '/assets/js/custom.js', array('jquery'), '1.0', true);
    
    // Comment reply script
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'warriors_enqueue_scripts');

// Register sidebar
function warriors_widgets_init() {
    register_sidebar(array(
        'name' => 'Blog Sidebar',
        'id' => 'blog-sidebar',
        'description' => 'Add widgets here for your blog sidebar',
        'before_widget' => '<div class="widget mb-4">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title h5 mb-3">',
        'after_title' => '</h3>'
    ));
    
    register_sidebar(array(
        'name' => 'Footer Widgets',
        'id' => 'footer-widgets',
        'description' => 'Add widgets here for the footer',
        'before_widget' => '<div class="col-md-4"><div class="widget mb-4">',
        'after_widget' => '</div></div>',
        'before_title' => '<h4 class="widget-title h5 mb-3">',
        'after_title' => '</h4>'
    ));
}
add_action('widgets_init', 'warriors_widgets_init');

// Custom excerpt length
function warriors_excerpt_length($length) {
    return 25;
}
add_filter('excerpt_length', 'warriors_excerpt_length');

// Add read more link to excerpts
function warriors_excerpt_more($more) {
    return '... <a href="' . get_permalink() . '" class="read-more">Read More</a>';
}
add_filter('excerpt_more', 'warriors_excerpt_more');

// Calculate reading time
function warriors_reading_time() {
    $content = get_post_field('post_content', get_the_ID());
    $word_count = str_word_count(strip_tags($content));
    $reading_time = ceil($word_count / 200);
    
    if ($reading_time == 0) {
        return 'Less than 1 min';
    }
    
    return $reading_time . ' min read';
}

// Custom menu fallback
function warriors_menu_fallback() {
    echo '<ul class="navbar-nav ms-auto">';
    echo '<li class="nav-item"><a href="' . admin_url('nav-menus.php') . '" class="nav-link">Add Menu</a></li>';
    echo '</ul>';
}
?>