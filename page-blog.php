<?php get_header() ?>
	<section class="w-full m-auto box box--even">
		<div class="w-full m-auto lg:max-w-screen-xxl px-4 md:px-8 lg:px-80 py-[60px] lg:py-20 text-center">
			<div class="text-[#222] text-center text-base not-italic font-semibold leading-[150%] tracking-[-0.32px] rounded bg-[rgba(225,230,239,0.25)] px-4 py-2 inline-block max-w-fit min-w-[200px]">
				blog
			</div>
			<h1 class="text-[color:var(--Preto-Cinza,#222)] text-center md:text-5xl not-italic font-semibold md:leading-[125%] tracking-[-0.96px] text-[#222222] text-[26px] leading-loose my-4">Actualizaciones y consejos de aplicaciones</h1>
			<p class="text-[color:var(--Neutro-500,#23272F)] text-center text-[15px] not-italic md:font-normal md:leading-[150%] text-[#23272f] text-base font-medium  leading-normal">Descubre los últimos lanzamientos y trucos esenciales para tus apps favoritas</p>
		</div>
	</section>
	<section class="w-full hidden xl:block m-auto box box--odd">
		<div class="w-full m-auto lg:max-w-screen-xxl px-4 md:px-8 lg:px-32 py-8 lg:py-20 text-center">
			<?php get_template_part("includes/post/post-group", null,
				array(
				"query" => array(
				"post_type"           => "post",
	      "post__in"            => get_option( 'sticky_posts' ),
	      "posts_per_page"      => 4,
	      "ignore_sticky_posts" => 1))); ?>
		</div>
	</section>
	<section class="w-full block xl:hidden box m-auto box--odd">
		<div class="tags w-full m-auto lg:max-w-screen-xxl flex-col md:flex-row px-6 md:px-8 lg:px-32 py-10 lg:py-20 text-center lg:text-left lg:gap-8 flex items-center gap-5">
			<?php get_template_part("includes/categories/categories"); ?>
		</div>
	</section>
	<section class="hidden xl:block w-full m-auto box box--even">
		<div class="w-full m-auto lg:max-w-screen-xxl px-6 md:px-8 lg:px-32 py-10 lg:py-20 text-center lg:text-left">
			<?php
    	$recent_args = array(
				"posts_per_page" => 4,
				"orderby"        => "date",
				"order"          => "DESC"
			);

			$recent_posts = new WP_Query( $recent_args );?>
			<?php get_template_part("includes/group/group", null, array("query" => $recent_args)); ?>
		</div>
	</section>
	<section class="block xl:hidden m-auto w-full box box--even">
		<div class="w-full m-auto lg:max-w-screen-xxl px-6 md:px-8 lg:px-32 py-10 lg:py-20 text-center lg:text-left">
			<div class="">
			  <div class="mx-auto max-w-7xl">
			    <div class="mx-auto max-w-2xl">
			      <h2 class="text-[color:var(--Preto-Cinza,#222)] text-center text-[22px] not-italic font-semibold leading-[125%] tracking-[-0.44px] lg:text-[32px] lg:tracking-[-0.64px]">Últimas Publicaciones</h2>
			      <p class="mt-2 text-[color:var(--Neutro-500,#23272F)] text-center text-[15px] not-italic font-normal leading-[150%]">Mantente al día con las novedades del mundo de las aplicaciones</p>
			    </div>
			    <div class="mx-auto mt-10 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 justify-items-center lg:mx-0 lg:max-w-none lg:grid-cols-3">
			      <?php
			    	$recent_args = array(
	    				"posts_per_page" => 3,
	    				"orderby"        => "date",
	    				"order"          => "DESC"
						);

						$recent_posts = new WP_Query( $recent_args );

						if ( $recent_posts -> have_posts() ) :
					    while ( $recent_posts -> have_posts() ): $recent_posts -> the_post();
					    ?>
					    <article class="flex w-full max-w-xl flex-col items-start justify-between text-left">
				      	<div class="flex w-full items-start flex-col justify-between">
				      		<div class="w-full relative">
				      			<?php if( get_the_post_thumbnail_url(get_the_ID())): ?>
				      				 <a href="<?php echo get_the_permalink(get_the_category()[0] -> id)?>" class="hover:filter w-full relative block overflow-hidden rounded-2xl">
				      				 	<?php if (get_the_post_thumbnail_url(get_the_ID(), "thumb")): ?>
				      				 		<img class="w-full sm:aspect-video sm:object-cover" src="<?php echo get_the_post_thumbnail_url(get_the_ID(), "thumb"); ?>" alt="post-image" width="340" height="191">
				      				 	<?php endif ?>
				      					<span class="w-full h-full block absolute top-0 left-0 bg-white opacity-0 hover:opacity-20"></span>
				      				</a>
				      			<?php endif; ?>
				      		</div>
				      		<div class="max-w-xl">
						        <div class="group relative">
						          <h3 class="mt-3 text-[color:var(--Preto-Cinza,#222)] text-[22px] not-italic font-medium leading-[125%] tracking-[-0.44px] lg:tracking-[-0.48px] hover:underline underline-offset-2 hover:text-[#176EC4]">
						            <a href="<?php the_permalink(); ?>">
						              <span class="absolute inset-0"></span>
						              <?php the_title(); ?>
						            </a>
						          </h3>
						        	<?php if (!get_the_post_thumbnail_url(get_the_ID())): ?>
						          	<div class="mt-5 line-clamp-3 text-[color:var(--Neutro-500,#23272F)] text-[15px] not-italic font-normal leading-[150%] lg:text-[15px]"><?php echo get_the_excerpt(); ?></div>
						        	<?php endif; ?>
						        </div>
				      		</div>
				      	</div>
				      </article>
					    <?php
					    endwhile;
						endif;
						?>
			    </div>
			  </div>
			</div>
		</div>
	</section>
	<section class="w-full m-auto box box--odd">
		<div class="w-full m-auto lg:max-w-screen-xxl px-6 md:px-8 xl:px-32 py-8 xl:py-20 text-center lg:text-left">
			<?php get_template_part("includes/subscribe/subscribe"); ?>
		</div>
	</section>
	<section class="m-auto w-full box box--even">
		<div class="w-full m-auto lg:max-w-screen-xxl px-6 md:px-8 lg:px-32 py-10 lg:py-20 text-center lg:text-left">
			<?php get_template_part("includes/post/post-list", null, array("query" => array(
				"posts_per_page" => 3,
				"orderby"        => "date",
				"order"          => "DESC"
			))); ?>
		</div>
	</section>
<?php get_footer() ?>