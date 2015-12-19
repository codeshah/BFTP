<?php get_header(); ?>
<div class="row">
<div class="col-md-2 col-sm-2"> <?php get_sidebar('left' ); ?> </div>

<div class="col-md-8 col-sm-8">
		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', get_post_format() );

			the_post_navigation();

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>


</div> <!--content area-->
<div class="col-md-2 col-sm-2"> <?php get_sidebar('right' ); ?> </div>
<?php
get_footer();