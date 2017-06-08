<?php
/**
 * @package Réseau_LTT
 * Template Name: Actualités
 */
get_header();
$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
$args = array(
    'post_type' => 'post',
    'posts_per_page' => get_option( 'posts_per_page' ),
    'paged' => $paged
);
$query = new WP_Query($args); ?>

<section class="actuality-content"><!-- section actualités -->
    <header>
        <h2 class="actuality-title"><?php echo get_the_title(); ?></h2>
    </header>
    <div class="wrapArchiveContent">

        <?php
        if ($query->have_posts()) :
            while ($query->have_posts()) : $query->the_post(); ?>
                <article>

                    <div class="actuality-article-title">

                        <a href="<?php the_permalink(); ?>">

                            <?php the_title(); ?>

                        </a>
                    </div>

                    <div class="actuality-article-date">

                        <?php echo get_the_date('d/m/Y'); ?>

                    </div>

                    <div class="actuality-article-content">

                        <?php the_excerpt(); ?>

                    </div>

                    <div class="actuality-article-link">

                        <a href="<?php the_permalink(); ?>">
                        <span class="actuality-article-button">
                            Lire la suite
                        </span>
                        </a>

                    </div>
                </article>

            <?php endwhile; ?>

            <?php if ($query->max_num_pages > 1): ?>
            <nav class="pagination">
                <div>
                    <?php echo get_next_posts_link( 'Articles plus anciens', $query->max_num_pages ); ?>
                </div>
                <div>
                    <?php echo get_previous_posts_link( 'Articles plus récents' ); ?>
                </div>
            </nav>
        <?php endif; ?>

        <?php else: ?>
            Aucun article disponible :(
        <?php endif; wp_reset_postdata(); ?>

    </div>
</section><!-- .archive-content -->
<?php get_footer(); ?>


