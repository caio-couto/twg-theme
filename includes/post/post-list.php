<div class="post-list">
	<?php
	$type = "default";

	if (isset($args["post_type"]))
	{
		$type = $args["post_type"];
	}
	?>
   <?php if ($type == "single"): ?>
  	 <div class="mx-auto max-w-[730px]">
  <?php else: ?>
  	<div class="mx-auto max-w-7xl">
  <?php endif; ?>
  <div class="mx-auto max-w-7xl">
    <div class="mx-auto max-w-2xl">
			<div class="inline-flex items-center justify-center w-full">
			    <hr class="w-full h-1 my-8 bg-[var(--primary-color)] border-0">
			    <span class="absolute px-3 -translate-x-1/2 left-1/2 text-[color:var(--Preto-Cinza,#222)] text-center text-[22px] not-italic font-semibold leading-[125%] tracking-[-0.44px] lg:text-[32px] lg:tracking-[-0.64px] before:conten <?php if(isset($args["order"]) && $args["order"] == "even") { echo "bg-even"; } else { echo "bg-white"; } ?>">Tendencias</span>
			</div>
    </div>
    <?php if ($type == "single"): ?>
    	<div class="mx-auto mt-10 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 justify-items-center lg:mx-0 lg:max-w-none lg:grid-cols-2 lg:grid-row">
    <?php else: ?>
    	<div class="mx-auto mt-10 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 justify-items-center lg:mx-0 lg:max-w-none lg:grid-cols-3">
    <?php endif; ?>
      <?php
      $query = array(
				"posts_per_page" => 3,
				"orderby"        => "date",
				"order"          => "DESC"
			);

			if (isset($args["query"]))
			{
				$query = $args["query"];
			}

			$recent_posts = new WP_Query( $query );

			if ( $recent_posts -> have_posts() ):
		    while ( $recent_posts -> have_posts() ): $recent_posts -> the_post();
		    	get_template_part("includes/post/post");
		    endwhile;
		    paginate_links();
			endif;
			?>
    </div>
  </div>
</div>