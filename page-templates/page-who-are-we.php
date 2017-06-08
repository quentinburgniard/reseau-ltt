<?php
/**
 * @package Réseau_LTT
 * Template Name: Qui sommme-nous
 */
get_header(); ?>
<div id="who-are-we-blue">
    <section class="who-are-we-section" id="who-are-we-section-1">
        <header>
            <?php the_field('title_1'); ?>
        </header>
        <div>
            <?php the_field('content_1'); ?>
        </div>
    </section>
</div><!-- wrap-blue -->

<div id="who-are-we-white">
<?php for ($i = 2; $i <= 3; $i++) : ?>
    <section class="who-are-we-section" id="who-are-we-section-<?php echo $i; ?>">
        <header>
            <?php the_field('title_'.$i); ?>
        </header>
        <div>
            <?php the_field('content_'.$i); ?>
        </div>
    </section>
<?php endfor; ?>
</div><!-- wrap-white -->

<?php get_footer(); ?>
