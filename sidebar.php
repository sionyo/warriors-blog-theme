<aside class="sidebar">
    <?php if (is_active_sidebar('blog-sidebar')): ?>
        <?php dynamic_sidebar('blog-sidebar'); ?>
    <?php else: ?>
        <!-- Default widgets -->
        <div class="widget mb-4">
            <h3 class="widget-title h5 mb-3">About This Blog</h3>
            <p>Welcome to your Golden State Warriors fan blog! Stay updated with the latest news, game analysis, and fan discussions.</p>
            <a href="/about" class="btn btn-sm btn-primary">Learn More</a>
        </div>
        
        <div class="widget mb-4">
            <h3 class="widget-title h5 mb-3">Recent Posts</h3>
            <ul class="list-unstyled mb-0">
                <?php
                $recent_posts = wp_get_recent_posts(array(
                    'numberposts' => 5,
                    'post_status' => 'publish'
                ));
                foreach ($recent_posts as $post): ?>
                    <li class="mb-2 pb-2 border-bottom">
                        <a href="<?php echo get_permalink($post['ID']); ?>" class="text-decoration-none">
                            <?php echo $post['post_title']; ?>
                        </a>
                        <br>
                        <small class="text-muted">
                            <i class="bi bi-calendar me-1"></i> <?php echo date('M j, Y', strtotime($post['post_date'])); ?>
                        </small>
                    </li>
                <?php endforeach; ?>
                <?php wp_reset_query(); ?>
            </ul>
        </div>
        
        <div class="widget mb-4">
            <h3 class="widget-title h5 mb-3">Categories</h3>
            <ul class="list-unstyled mb-0">
                <?php
                $categories = get_categories(array('number' => 6));
                foreach ($categories as $category): ?>
                    <li class="mb-2">
                        <a href="<?php echo get_category_link($category->term_id); ?>" class="text-decoration-none d-flex justify-content-between align-items-center">
                            <?php echo $category->name; ?>
                            <span class="badge bg-secondary"><?php echo $category->count; ?></span>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
        
        <div class="widget mb-4">
            <h3 class="widget-title h5 mb-3">Follow Us</h3>
            <div class="social-icons">
                <a href="#" class="btn btn-outline-dark btn-sm m-1"><i class="bi bi-twitter"></i></a>
                <a href="#" class="btn btn-outline-primary btn-sm m-1"><i class="bi bi-facebook"></i></a>
                <a href="#" class="btn btn-outline-danger btn-sm m-1"><i class="bi bi-instagram"></i></a>
                <a href="#" class="btn btn-outline-success btn-sm m-1"><i class="bi bi-youtube"></i></a>
            </div>
        </div>
        
        <div class="widget">
            <h3 class="widget-title h5 mb-3">Search</h3>
            <form method="get" action="<?php echo esc_url(home_url('/')); ?>">
                <div class="input-group">
                    <input type="search" name="s" class="form-control form-control-sm" placeholder="Search...">
                    <button type="submit" class="btn btn-primary btn-sm">
                        <i class="bi bi-search"></i>
                    </button>
                </div>
            </form>
        </div>
    <?php endif; ?>
</aside>