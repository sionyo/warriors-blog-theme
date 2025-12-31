        </main><!-- Close main from header.php -->
        
        <!-- Sidebar - FIXED: Now properly in column -->
        <div class="col-lg-4">
            <?php get_sidebar(); ?>
        </div>
    </div><!-- Close row -->
</div><!-- Close container -->

<!-- Footer -->
<footer class="bg-dark text-white pt-5 pb-4">
    <div class="container">
        <div class="row">
            <?php if (is_active_sidebar('footer-widgets')): ?>
                <?php dynamic_sidebar('footer-widgets'); ?>
            <?php else: ?>
                <div class="col-md-4 mb-4">
                    <h4 class="h5 mb-3">About Warriors Blog</h4>
                    <p>Your #1 source for Golden State Warriors news, analysis, and fan discussions. Join the Dub Nation community!</p>
                </div>
                
                <div class="col-md-4 mb-4">
                    <h4 class="h5 mb-3">Quick Links</h4>
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'footer-menu',
                        'container' => false,
                        'menu_class' => 'list-unstyled',
                        'fallback_cb' => false
                    ));
                    
                    if (!has_nav_menu('footer-menu')) {
                        echo '<ul class="list-unstyled">';
                        echo '<li><a href="' . home_url() . '" class="text-white-50">Home</a></li>';
                        echo '<li><a href="#" class="text-white-50">About</a></li>';
                        echo '<li><a href="#" class="text-white-50">Contact</a></li>';
                        echo '<li><a href="#" class="text-white-50">Privacy Policy</a></li>';
                        echo '</ul>';
                    }
                    ?>
                </div>
                
                <div class="col-md-4 mb-4">
                    <h4 class="h5 mb-3">Contact</h4>
                    <p class="mb-2"><i class="bi bi-envelope me-2"></i> contact@example.com</p>
                    <div class="social-icons mt-3">
                        <a href="#" class="text-white me-3"><i class="bi bi-twitter"></i></a>
                        <a href="#" class="text-white me-3"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="text-white me-3"><i class="bi bi-instagram"></i></a>
                        <a href="#" class="text-white"><i class="bi bi-youtube"></i></a>
                    </div>
                </div>
            <?php endif; ?>
        </div>
        
        <hr class="bg-secondary my-4">
        
        <div class="row">
            <div class="col-md-6">
                <p class="mb-0">&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. All rights reserved.</p>
            </div>
            <div class="col-md-6 text-md-end">
                <p class="mb-0">
                    Powered by <a href="https://wordpress.org/" class="text-warning text-decoration-none">WordPress</a>
                </p>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>