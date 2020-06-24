<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package test
 */

?>

<?php $article_type = get_post_meta( get_the_ID(), 'article_type', true); ?>


<article class="home-article hvr-bounce-to-right <?php echo esc_attr($article_type); ?>" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

<a href="<?php the_permalink() ?>" id="home-article-permalink">	

	<header class="entry-header">
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :?>
			<h2 class="entry-title"><?php the_title() ?></h2>
		<?php endif;

		if ( 'post' === get_post_type() ) :
			?>
			<div class="entry-meta">
				
			</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->
	


	<div class="entry-content">
		<?php the_post_thumbnail(); ?>
		<?php the_excerpt(); ?>

	</div><!-- .entry-content -->

	</a>

</article><!-- #post-<?php the_ID(); ?> -->
