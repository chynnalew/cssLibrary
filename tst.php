<?php

/**
 * The template for displaying PSC Research to Action Archive pages.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header(); ?>

	<div <?php generate_do_attr( 'content' ); ?>>
		<main <?php generate_do_attr( 'main' ); ?>>
			<?php
			/**
			 * generate_before_main_content hook.
			 *
			 * @since 0.1
			 */
			do_action( 'generate_before_main_content' );

			if ( generate_has_default_loop() ) {
				if ( have_posts() ) :

					/**
					 * generate_archive_title hook.
					 *
					 * @since 0.1
					 *
					 * @hooked generate_archive_title - 10
					 */
					do_action( 'generate_archive_title' );

					/**
					 * generate_before_loop hook.
					 *
					 * @since 3.1.0
					 */
					do_action( 'generate_before_loop', 'archive' );

					while ( have_posts() ) :

						the_post(); ?>

						<div class=" wp-block-cover slate-over-img-2 psd-archive-post <?php echo "index" . $index ?>">
                <div class='img-div'>
                    <?php echo the_post_thumbnail() ?>
                </div>
                <div class='wp-block-cover__inner-container'>
                    <div class='wp-block-group'>
                        <div class="wp-block-group__inner-container">
                            <h2>
                                <a href='<?php echo the_permalink(); ?>'><?php echo the_title(); ?> </a>
                            </h2>
                            <time><?php echo the_date(); ?></time>
                            <?php echo the_excerpt(); ?>
                            <button>
                                <a href='<?php echo the_permalink() ?>'>Read More</a>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

					<?endwhile;

					/**
					 * generate_after_loop hook.
					 *
					 * @since 2.3
					 */
					do_action( 'generate_after_loop', 'archive' );

				else :

					generate_do_template_part( 'none' );
                    wp_reset_postdata();

				endif;
			}
            //second query arguments
    $args = array(
        'order' => 'DESC',
        'orderby' => 'date',
        'posts_per_page' => 11,
        'post_type' => 'peace_science_digest',
        'category_name' => 'digest-issues',
        'paged' => get_query_var('paged') ? get_query_var('paged') : 1,
    );

    $query = new WP_Query($args);

    if ($query->have_posts()) :

        $index = 0; ?>
        <div class="psd-main-posts psd-category-archives">
            <?php
            /* Start the Loop */
            while ($query->have_posts()) : $query->the_post();
                $index++;
                if ($index == 1) {
                } else { ?>
                    <div class=" psd-article <?php echo "index" . $index ?>">
                        <div class='img-div'>
                            <?php echo the_post_thumbnail() ?>
                        </div>
                        <div class='wp-block-cover__inner-container'>
                            <div class='wp-block-group'>
                                <div class="wp-block-group__inner-container">
                                    <h3>
                                        <a href='<?php echo the_permalink() ?>'><?php echo the_title() ?> </a>
                                    </h3>
                                    <p>
                                        <?php the_excerpt() ?>
                                    </p>
                                    <time><?php echo the_date() ?></time>
                                    <button>
                                        <a href='<?php echo the_permalink() ?>'>Read More</a>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php }
            endwhile; ?>
        </div>
        <div class='psd-pagination pagination'>
            <?php
            $big = 999999999;
            echo paginate_links(array(
                'base' => str_replace($big, '%#%', get_pagenum_link($big)),
                'format' => '?paged=%#%',
                'current' => max(1, get_query_var('paged')),
                'total' => $query->max_num_pages
            ));
            ?>
        </div>
    <?php
    else :
        get_template_part('template-parts/content', 'none');
        wp_reset_postdata();
    endif;

    ?>
</div>
<?php
get_footer();
