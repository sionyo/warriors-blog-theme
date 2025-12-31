<?php get_header(); ?>

<?php if (have_posts()): ?>
    <div id="latest-posts">
        <?php while (have_posts()): the_post(); ?>
            <article <?php post_class('blog-post mb-5 pb-4 border-bottom'); ?>>
                
                <?php if (has_post_thumbnail()): ?>
                    <div class="post-thumbnail mb-4">
                        <a href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail('blog-large', array('class' => 'img-fluid rounded')); ?>
                        </a>
                    </div>
                <?php endif; ?>
                
                <!-- FIXED: Category display -->
                <div class="post-meta mb-3">
                    <?php
                    $categories = get_the_category();
                    if (!empty($categories)) {
                        foreach ($categories as $category) {
                            echo '<span class="badge bg-primary me-1 mb-1">' . esc_html($category->name) . '</span>';
                        }
                    }
                    ?>
                    <div class="text-muted mt-2">
                        <small>
                            <i class="bi bi-calendar me-1"></i> <?php echo get_the_date(); ?>
                            <span class="mx-2">•</span>
                            <i class="bi bi-clock me-1"></i> <?php echo warriors_reading_time(); ?>
                        </small>
                    </div>
                </div>
                
                <h2 class="post-title h3 mb-3">
                    <a href="<?php the_permalink(); ?>" class="text-decoration-none text-dark">
                        <?php the_title(); ?>
                    </a>
                </h2>
                
                <div class="post-excerpt mb-4">
                    <?php the_excerpt(); ?>
                </div>
                
                <div class="post-footer d-flex justify-content-between align-items-center">
                    <a href="<?php the_permalink(); ?>" class="btn btn-primary btn-sm">Read More</a>
                    <div class="text-muted small">
                        <i class="bi bi-chat me-1"></i> <?php comments_number('0 Comments', '1 Comment', '% Comments'); ?>
                    </div>
                </div>
            </article>
        <?php endwhile; ?>
    </div>
    
    <!-- Pagination -->
    <nav class="blog-pagination mb-5">
        <?php
        the_posts_pagination(array(
            'mid_size' => 2,
            'prev_text' => '&laquo; Previous',
            'next_text' => 'Next &raquo;',
            'class' => 'pagination justify-content-center'
        ));
        ?>
    </nav>
    
<?php else: ?>
    <div class="alert alert-info">
        <h3>No posts found</h3>
        <p>Sorry, there are no posts to display.</p>
    </div>
<?php endif; ?>

<?php get_footer(); ?>