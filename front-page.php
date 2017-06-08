<?php
/**
* @package Réseau_LTT
*/
get_header();
$args = array(
    'post_type' => 'post',
    'posts_per_page' => -1,
    'tag_id' => 28
);
$query = new WP_Query($args); ?>

<section class="front-banner">

    <h2 class="front-banner-title"><?php bloginfo( 'description' ); ?></h2>
</section>

<section class="front-actuality">

    <h3 class="front-actuality-title">À LA UNE</h3>

    <div class="front-actuality-content">

        <?php if ($query->have_posts()) :
            while ($query->have_posts()) : $query->the_post(); ?>

            <div class="front-actuality-post">

                <a href="<?php the_permalink(); ?>" >

                    <div class="front-actuality-img">

                        <?php if ( has_post_thumbnail() ):
                            the_post_thumbnail('front-actuality-img');
                        else: ?>
                        <img src="<?php echo esc_url(  get_template_directory_uri().'/img/ltt-grey.jpg'); ?>">
                    <?php endif; ?>
                </div>
            </a>

            <div class="front-actuality-txt">

                <a href="<?php the_permalink(); ?>" >

                    <h4><?php the_title(); ?></h4>
                </a>


                <div><?php the_excerpt(); ?></div>


                <a href="<?php the_permalink(); ?>" >

                    <div class="front-actuality-link">

                        <img src="<?php echo esc_url(  get_template_directory_uri().'/img/information.png'); ?>">
                        <span>En savoir plus</span>
                    </div>
                </a>
            </div>
        </div>

    <?php endwhile; else: ?>
        Aucun article à la une :(
    <?php endif;
    wp_reset_postdata(); ?>

</div>
</section>

<?php get_footer(); ?>
