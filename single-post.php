<?php
/**
 * @package Réseau_LTT
 */
get_header();
the_post(); ?>
    <header>
        <div class="single-post-informations">
            <h3><?php the_title(); ?></h3>
            <div class="single-post-date"><?php the_date(); ?></div>
        </div>
        <div class="single-post-horizontal-line"></div>
    </header>
    <div class="wysiwyg">

        <?php the_content(); ?>
    </div>
    <nav class="actuality-link">
        <a href="<?php echo get_the_permalink(73); ?>">Retourner à la page actualités</a>
    </nav>
<?php get_footer(); ?>