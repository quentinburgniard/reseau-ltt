<?php
/**
 * @package Réseau_LTT
 */
get_header();

$args = array(
    'orderby' => 'title',
    'posts_per_page' => -1,
    'post_type' => 'annuaire'
);
$posts = get_posts( $args ); ?>
<section class="annuaire-banner">
    <h2 class="annuaire-title">Bienvenue sur l'annuaire des chercheurs du réseau LTT</h2>
</section><!-- .annuaire-banner  -->

<section class="annuaire-content">
    <table>
        <tr>
            <th>Nom</th>
            <th>Établissement</th>
            <th>Pays</th>
        </tr>

        <?php
        foreach ( $posts as $post ) : the_post();
            $etablissement = strip_tags( get_the_term_list(get_the_ID(), 'etablissement','',', ') );
            $pays = strip_tags( get_the_term_list(get_the_ID(), 'pays','',', ') );
            $name = mb_convert_case(get_the_title(), MB_CASE_TITLE); ?>

            <tr>
                <td>
                    <a href="<?php the_permalink(); ?>"><?php echo $name; ?></a>
                </td>
                <td><?php echo $etablissement; ?></td>
                <td><?php echo $pays; ?></td>
            </tr>

        <?php endforeach;
        wp_reset_postdata(); ?>
    </table>
</section><!-- .annuaire-content  -->

<section class="annuaire-registrer">
    <a href="<?php echo wp_registration_url(); ?>">
        <span id="annuaire-registrer-button">
            S'inscrire
        </span>
    </a>
</section><!-- .annuaire-registrer  -->
<?php get_footer(); ?>
