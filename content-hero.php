<?php
/**
 * The template used for displaying hero content in page.php and page-templates.
 *
 * @package wp-theme-animal-hospital
 */
?>

<?php if ( ! is_page_template( 'page-templates/front-page.php' ) ) : ?>
<div class="hero hero-single <?php echo edin_additional_class(); ?>">
	<div class="hero-inner noize">

		<h2 class="entry-title-main"><?php the_title('', ''); ?></h2>
		<div class="entry-title-sub"><?php the_field("subtitle", $post->ID) ?></div>

	</div>
</div>
<?php else : ?>
<div class="hero hero-front <?php echo edin_additional_class(); ?>">

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<?php
				if ( 1 == get_theme_mod( 'edin_title_front_page' ) ) {
					the_title( '<header class="entry-header"><h1 class="page-title">', '</h1></header>' );
				}
			?>
			<p class="catchphrase"><?php echo get_post(get_page_by_path('misc'))->catchphrase; ?></p>
			<div class="entry-content">
				<?php the_content(); ?>
				<?php
					wp_link_pages( array(
						'before'      => '<div class="page-links">' . __( 'Pages:', 'edin' ),
						'after'       => '</div>',
						'link_before' => '<span>',
						'link_after'  => '</span>',
					) );
				?>
			</div><!-- .entry-content -->
			<?php edit_post_link( __( 'Edit', 'edin' ), '<footer class="entry-footer"><span class="edit-link">', '</span></footer>' ); ?>
		</article><!-- #post-## -->

	</div>
</div><!-- .hero -->
<div class="notice">
	<div class="notice-inner">
    <h6><?php echo get_post(get_page_by_path('notice'))->post_title; ?></h6>
		<?php echo get_post(get_page_by_path('notice'))->post_content; ?>
	</div>
</div>
<?php endif; ?>

<?php
	if ( ! function_exists( 'jetpack_breadcrumbs' ) || 0 == get_theme_mod( 'edin_breadcrumbs' ) || ! is_page() || is_page_template( 'page-templates/front-page.php' ) || is_front_page() ) {
		return;
	}
?>

<div class="breadcrumbs-wrapper">
	<?php jetpack_breadcrumbs(); ?>
</div><!-- .breadcrumbs-wrapper -->
