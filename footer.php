<footer class="site-footer">
    <div class="container">
        <div class="row">
            <!-- Column 1: Latest Posts -->
            <div class="col">
                <h3>HuberPress Blog</h3>
                <ul class="footer-blog-list">
                    <?php
                    $recent_posts = wp_get_recent_posts(array(
                        'numberposts' => 5, // Number of recent posts thumbnails to fetch
                        'post_status' => 'publish', // Ensure the post is published
                    ));
                    foreach($recent_posts as $post) : ?>
                        <li>
                            <a href="<?php echo get_permalink($post['ID']) ?>">
                                <?php echo $post['post_title'] ?>
                            </a>
                            <span><?php echo get_the_date('', $post['ID']); ?></span>
                        </li>
                    <?php endforeach; wp_reset_query(); ?>
                </ul>
            </div>

            <!-- Column 2: About Us -->
            <div class="col">
                <h3>About Us</h3>
                <ul class="footer-links">
                    <li><a href="#">Team</a></li>
                    <li><a href="#">History</a></li>
                    <li><a href="#">Careers</a></li>
                </ul>
            </div>

            <!-- Column 3: Privacy -->
            <div class="col">
                <h3>Privacy</h3>
                <ul class="footer-links">
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="#">Terms & Conditions</a></li>
                    <li><a href="#">Contact Us</a></li>
                </ul>
            </div>

            <!-- Column 4: Social -->
            <div class="col">
                <h3>Social</h3>
                <div class="footer-social-icons">
                    <a href="#" class="fa fa-facebook"></a>
                    <a href="#" class="fa fa-twitter"></a>
                    <a href="#" class="fa fa-instagram"></a>
                </div>
            </div>
        </div>
    </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
