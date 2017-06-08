<?php
/**
 * @package Réseau_LTT
 */

the_post();

$etablissement = strip_tags( get_the_term_list(get_the_ID(), 'etablissement','',', ') );
$pays = strip_tags( get_the_term_list(get_the_ID(), 'pays','',', ') );
$name = mb_convert_case(get_the_title(), MB_CASE_TITLE);

get_header(); ?>
<section class="single-annuaire-section" id="single-annuaire-main-information"><!-- section informations principales  -->
    <header>
        <h3><?php the_field('title'); ?> <?php echo $name; ?></h3>
        <div class="single-annuaire-horizontal-line"></div>
    </header>
    <div>
        <?php if ( !empty($etablissement) ) : ?>
        <p><b>Établissement:</b> <?php echo $etablissement; ?></p>
        <?php endif; ?>

        <?php if ( !empty($pays) ) : ?>
            <p><b>Pays:</b> <?php echo $pays; ?></p>
        <?php endif; ?>
    </div>
</section>

<section class="single-annuaire-section" id="single-annuaire-academic-information"><!-- section informations académiques  -->
    <header>
        <h4>Informations académiques</h4>
        <div class="single-annuaire-horizontal-line"></div>
    </header>
    <div>
        <p><b>Statut:</b> <?php the_field('status'); ?></p>
        <p><b>Diplôme:</b> <?php the_field('degree'); ?></p>
        <p><b>Recherche:</b> <?php the_field('research'); ?></p>
    </div>
</section>

<section class="single-annuaire-section" id="single-annuaire-publication"><!-- section publications  -->
    <header>
        <h4>Publications</h4>
        <div class="single-annuaire-horizontal-line"></div>
    </header>
    <div>
        <?php the_field('publications'); ?>
    </div>
</section>
<?php get_footer(); ?>