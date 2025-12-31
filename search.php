<?php get_header(); ?>

<h2 class="h3 mb-4">Search Results for: "<?php echo get_search_query(); ?>"</h2>

<?php if (have_posts()): ?>
    <div class="row">
        <?php while (have_posts()): the_post(); ?>
            <div class="col-md-6 mb-4">
                <div class="card h-100">
                    <?php if (has_post_thumbnail()): ?>
                        <a href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail('blog-small', array('class' => 'card-img-top')); ?>
                        </a>
                    <?php endif; ?>
                    <div class="card-body">
                        <h3 class="card-title h5">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h3>
                        <p class="card-text small"><?php echo wp_trim_words(get_the_excerpt(), 20); ?></p>
                    </div>
                    <div class="card-footer bg-transparent">
                        <a href="<?php the_permalink(); ?>" class="btn btn-sm btn-primary">Read More</a>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
    
    <nav class="blog-pagination mt-5">
        <?php the_posts_pagination(); ?>
    </nav>
    
<?php else: ?>
    <div class="alert alert-warning">
        <p>No results found for your search. Try a different keyword.</p>
    </div>
    
    <div class="mt-4">
        <h3 class="h4 mb-3">Try searching for:</h3>
        <div class="d-flex flex-wrap gap-2">
            <a href="?s=steph+curry" class="btn btn-outline-primary btn-sm">Steph Curry</a>
            <a href="?s=klay+thompson" class="btn btn-outline-primary btn-sm">Klay Thompson</a>
            <a href="?s=draymond+green" class="btn btn-outline-primary btn-sm">Draymond Green</a>
            <a href="?s=game+analysis" class="btn btn-outline-primary btn-sm">Game Analysis</a>
        </div>
    </div>
<?php endif; ?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>