<?php get_header(); ?>

<?php while (have_posts()): the_post(); ?>
    <article <?php post_class('single-post mb-5'); ?>>
        
        <?php if (has_post_thumbnail()): ?>
            <div class="post-thumbnail mb-4">
                <?php the_post_thumbnail('full', array('class' => 'img-fluid rounded')); ?>
            </div>
        <?php endif; ?>
        
        <div class="post-meta d-flex flex-wrap mb-4">
            <span class="badge bg-primary me-2 mb-2"><?php the_category(', '); ?></span>
            <span class="text-muted me-3 mb-2"><i class="bi bi-calendar me-1"></i> <?php echo get_the_date(); ?></span>
            <span class="text-muted me-3 mb-2"><i class="bi bi-clock me-1"></i> <?php echo warriors_reading_time(); ?></span>
            <span class="text-muted mb-2"><i class="bi bi-person me-1"></i> <?php the_author(); ?></span>
        </div>
        
        <div class="post-content mb-5">
            <?php the_content(); ?>
            
            <?php
            wp_link_pages(array(
                'before' => '<div class="page-links mt-4"><strong>Pages:</strong> ',
                'after' => '</div>',
                'link_before' => '<span class="page-number">',
                'link_after' => '</span>',
            ));
            ?>
        </div>
        
        <?php if (has_tag()): ?>
            <div class="post-tags mb-5">
                <h5 class="h6 mb-3"><i class="bi bi-tags me-1"></i> Tags:</h5>
                <div>
                    <?php the_tags('', ' ', ''); ?>
                </div>
            </div>
        <?php endif; ?>
        
        <!-- Post Navigation -->
        <div class="post-navigation d-flex justify-content-between mb-5 py-4 border-top border-bottom">
            <div class="previous-post">
                <?php previous_post_link('%link', '<i class="bi bi-arrow-left me-1"></i> Previous Post'); ?>
            </div>
            <div class="next-post">
                <?php next_post_link('%link', 'Next Post <i class="bi bi-arrow-right ms-1"></i>'); ?>
            </div>
        </div>
        
        <!-- Author Box -->
        <div class="author-box card mb-5">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-md-2 text-center mb-3 mb-md-0">
                        <?php echo get_avatar(get_the_author_meta('ID'), 100, '', '', array('class' => 'rounded-circle')); ?>
                    </div>
                    <div class="col-md-10">
                        <h4 class="h5 mb-2">About <?php echo get_the_author(); ?></h4>
                        <p class="mb-2"><?php echo get_the_author_meta('description'); ?></p>
                        <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>" class="btn btn-sm btn-outline-primary">
                            View all posts by <?php echo get_the_author(); ?>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Comments -->
        <?php if (comments_open() || get_comments_number()): ?>
            <div class="comments-area mb-5">
                <?php comments_template(); ?>
            </div>
        <?php endif; ?>
        
    </article>
<?php endwhile; ?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>