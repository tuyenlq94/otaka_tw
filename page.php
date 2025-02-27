<?php
/* Template Name: Page */
get_header();
?>

<div id="content">
	<div id="primary">
		<main id="main">
			<?php
			if (have_posts()) :
				while (have_posts()) : the_post();
					the_content();
				endwhile;
			else :
				echo 'ページが見つかりません';
			endif;
			?>
		</main>
	</div>
</div>

<?php
get_footer();
