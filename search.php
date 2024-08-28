<?php get_header() ?>
	<section class="w-full m-auto box box--even">
		<div class="w-full m-auto lg:max-w-screen-xxl px-4 md:px-8 lg:px-80 py-[60px] lg:py-20 text-center">
			<div class="text-[#222] text-center text-base not-italic font-semibold leading-[150%] tracking-[-0.32px] rounded bg-[rgba(225,230,239,0.25)] px-4 py-2 inline-block max-w-fit min-w-[200px]">
				"<?php the_search_query(); ?>"
			</div>
			<h1 class="text-[color:var(--Preto-Cinza,#222)] text-center md:text-5xl not-italic font-semibold md:leading-[125%] tracking-[-0.96px] text-[#222222] text-[26px] leading-loose my-4">Descubre las Mejores Apps para Organizar tu Vida y Trabajo</h1>
		</div>
	</section>
	<section class="m-auto w-full box box--even">
		<div class="w-full m-auto lg:max-w-screen-xxl px-6 md:px-8 lg:px-32 py-10 lg:py-20 text-left">
			<section class="body-font">
			  <div class="container mx-auto">
			    <div class="flex flex-wrap sm:-m-4 -mx-4 -mb-10 -mt-4">
			    	<?php while(have_posts()): the_post(); ?>
						<div class="p-4 md:w-1/3 sm:mb-0 mb-6 relative">
							<?php if(!wp_is_mobile()): ?>
			        <a href="<?php the_permalink(); ?>" class="rounded-lg text-white h-64 overflow-hidden hover:filter block relative z-20">
			          <img alt="post image" class="object-cover object-center h-full w-full" src="<?php echo get_the_post_thumbnail_url(get_the_ID(), "thumb"); ?>">
			          <span class="w-full h-full block absolute top-0 left-0 bg-white opacity-0 hover:opacity-20"></span>
			        </a>
			        <?php endif; ?>
			        <a href="<?php the_permalink(); ?>" class="z-10 relative">
			        	<h2 class="text-xl font-medium title-font text-[color:var(--Preto-Cinza,#222)] mt-5 hover:underline underline-offset-2"><?php echo get_the_title(); ?></h2>
			        </a>
			        <div class="line-clamp-3">
			        	<p class="text-[color:var(--Neutro-500,#23272F)] text-base leading-relaxed mt-2"><?php echo get_first_paragraph(); ?></p>
			        </div>
			        <a href="<?php the_permalink(); ?>" class="text-[var(--primary-color)] inline-flex items-center mt-3">Leer más
			        	<span class="absolute inset-0"></span>
			          <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
			            <path d="M5 12h14M12 5l7 7-7 7"></path>
			          </svg>
			        </a>
		      	</div>
						<?php endwhile; ?>
			    </div>
			    <?php echo custom_paginate_links(); ?>
			  </div>
			</section>
		</div>
	</section>
	<section class="w-full m-auto box box--even">
		<div class="w-full m-auto lg:max-w-screen-xxl px-6 md:px-8 xl:px-32 py-8 xl:py-20 text-center lg:text-left">
				<?php get_template_part("includes/subscribe/subscribe"); ?>
			</div>
		</div>
	</section>
	<section class="m-auto w-full box box--odd">
		<div class="w-full m-auto lg:max-w-screen-xxl px-6 md:px-8 lg:px-32 py-10 lg:py-20 text-center lg:text-left">
			<?php get_template_part("includes/post/post-list"); ?>
		</div>
	</section>
<?php get_footer() ?>