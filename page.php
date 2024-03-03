<?php get_header(); ?>

<div class="container-fluid py-5">
    <div class="container">
        <?php
        if ( have_posts() ) : 
            while ( have_posts() ) : the_post();
                ?>
                <article id="page-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <header class="entry-header">
                        <h1 class="entry-title"><?php the_title(); ?></h1>
                    </header>
                    <div class="entry-content">
                        <?php the_content(); ?>
                    </div>
                </article>
                <?php
            endwhile;
        else :
            ?>
            <p>No pages found.</p>
            <?php
        endif;
        ?>
    </div>
</div>

<?php get_footer(); ?>
