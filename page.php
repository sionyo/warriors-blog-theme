<?php get_header(); ?>

<?php while (have_posts()): the_post(); ?>
    <article <?php post_class('page-content mb-5'); ?>>
        <h1 class="page-title h2 mb-4"><?php the_title(); ?></h1>
        
        <?php if (has_post_thumbnail()): ?>
            <div class="page-thumbnail mb-4">
                <?php the_post_thumbnail('full', array('class' => 'img-fluid rounded')); ?>
            </div>
        <?php endif; ?>
        
        <div class="page-content">
            <?php the_content(); ?>
        </div>
        
        <?php
        wp_link_pages(array(
            'before' => '<div class="page-links mt-4"><strong>Pages:</strong> ',
            'after' => '</div>',
        ));
        ?>
    </article>
    
    <?php if (comments_open() || get_comments_number()): ?>
        <div class="comments-area mb-5">
            <?php comments_template(); ?>
        </div>
    <?php endif; ?>
    
<?php endwhile; ?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>