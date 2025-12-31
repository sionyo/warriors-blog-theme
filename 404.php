<?php get_header(); ?>

<div class="text-center py-5 my-5">
    <h1 class="display-1 text-muted">404</h1>
    <h2 class="h3 mb-4">Page Not Found</h2>
    <p class="lead mb-4">The page you're looking for doesn't exist or has been moved.</p>
    <div class="mb-4">
        <i class="bi bi-basketball text-primary" style="font-size: 4rem;"></i>
    </div>
    <a href="<?php echo home_url(); ?>" class="btn btn-primary btn-lg">
        <i class="bi bi-house-door me-2"></i> Back to Home
    </a>
</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>