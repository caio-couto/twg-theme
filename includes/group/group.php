<div class="group flex gap-[22px]">
	<div class="justify-start items-center flex-col gap-8 flex">
		<?php
			if (isset($args["query"]))
			{
				$query = new WP_Query($args["query"]);
				while ( $query -> have_posts() ): $query -> the_post();?>
					<?php get_template_part("includes/post/post"); ?>
				<?php endwhile;
				paginate_links();
			}
			else
			{
				while (have_posts()): the_post();?>
					<?php get_template_part("includes/post/post"); ?>
				<?php endwhile;
				paginate_links();
			}
		?>
	</div>
</div>