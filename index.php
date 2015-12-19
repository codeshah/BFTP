<?php get_header(); ?>
<div class="row">
<div class="col-md-2 col-sm-2"> <?php get_sidebar('left' ); ?> </div>

<div class="col-md-8 col-sm-8">

<?php
if ( have_posts() ) :

	if ( is_home() && ! is_front_page() ) : ?>
		<header>
			<h1><?php single_post_title(); ?></h1>
		</header>

	<?php
	endif;
	while ( have_posts() ) : the_post();
		get_template_part( 'template-parts/content', get_post_format() );
	endwhile;
	the_posts_navigation();

else :
	get_template_part( 'template-parts/content', 'none' );
endif;
?>
</div> <!--content area-->
<div class="col-md-2 col-sm-2"> <?php get_sidebar('right' ); ?> </div>
<?php
get_footer();
