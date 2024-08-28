<?php get_header() ?>
	<?php while( have_posts() ): the_post();?>
	<?php
		if(function_exists('subh_set_post_view'))
		{
	    subh_set_post_view(get_the_ID());
	  }
	?>
	<button
	type="button"
	data-twe-ripple-init
	data-twe-ripple-color="light"
	class="!fixed bottom-5 end-5 md:end-14 hidden rounded-full bg-[var(--primary-color)] p-3 text-xs font-medium uppercase leading-tight text-white shadow-md transition duration-150 ease-in-out hover:bg-[var(--secondary-color)] hover:shadow-lg focus:shadow-lg focus:outline-none focus:ring-0 active:shadow-lg"
	id="btn-back-to-top">
	<span class="[&>svg]:w-4">
		<svg
			xmlns="http://www.w3.org/2000/svg"
			fill="none"
			viewBox="0 0 24 24"
			stroke-width="3"
			stroke="currentColor">
			<path
				stroke-linecap="round"
				stroke-linejoin="round"
				d="M4.5 10.5 12 3m0 0 7.5 7.5M12 3v18" />
		</svg>
	</span>
	</button>
	<section class="w-full m-auto box--odd">
		<div class="w-full m-auto lg:max-w-screen-xxl px-4 md:px-8 lg:px-54 py-4 lg:py-12 text-left lg:text-left">
			<div class="single-header text-center max-w-[730px] mx-auto">
				<a href="<?php echo get_category_link(get_the_category()[0])?>" class="text-[#176EC4] inline-block px-4 py-1 text-base not-italic font-normal leading-[150%] tracking-[-0.32px] mb-2"><?php echo get_the_category()[0] -> name; ?> </a>
				<h1 class="text-black text-[22px] not-italic font-semibold leading-[125%] tracking-[-0.44px] lg:text-[40px] lg:leading-[150%] lg:tracking-[-0.8px]"><?php the_title(); ?></h1>
			</div>
		</div>
	</section>
	<section class="w-full m-auto box--odd">
		<div class="w-fit m-auto pb-10 lg:pb-20 text-center lg:text-left">
			<div class="grid">
				<div class="post-content w-full format-content lg:max-w-3xl gap-y-[30px] text-left col-start-1 row-start-1 grid">
					<?php the_content(); ?>
				</div>
			</div>
		</div>
	</section>
	<section class="w-full m-auto box--odd">
		<div class="author_profile w-full m-auto max-w-[730px] text-center lg:text-left box box--even py-10 px-[30px]">
			<h2 class="text-[color:var(--Preto-Cinza,#222)] text-left text-[22px] not-italic font-semibold leading-[125%] tracking-[-0.44px] mb-4">¿Te resultó útil este artículo</h2>
			<div class="text-left">
				<p class="text-[color:var(--Neutro-400,#3F444D)] mb-2 text-base not-italic font-medium leading-[150%] tracking-[-0.32px]"><?php the_author_meta("nickname"); ?> </p>
				<div class="line-clamp-3">
					<p class="text-[color:var(--Neutro-400,#3F444D)] text-sm not-italic font-normal leading-[150%] tracking-[-0.28px]"><?php the_author_meta("description"); ?></p>
				</div>
			</div>
		</div>
	</section>
	<?php endwhile; ?>
	<section class="m-auto w-full box box--odd">
		<div class="w-full m-auto lg:max-w-screen-xxl px-6 md:px-8 lg:px-32 py-8 lg:py-20 text-center lg:text-left">
		<?php get_template_part("includes/post/post-list", null,
			array(
			"post_type" => "single",
			"order" => "odd",
			"query" => array(
				"posts_per_page" => 4,
				"orderby"        => "date",
				"order"          => "DESC")
			)); ?>
		</div>
	</section>
	<section class="w-full m-auto box box--odd">
		<div class="w-full m-auto lg:max-w-screen-xxl px-6 md:px-8 xl:px-32 py-8 xl:py-20 text-center lg:text-left">
			<div class="md:max-w-xl lg:max-w-full md:m-auto w-full m-auto px-0 md:px-8 lg:px-32 py-0 lg:py-20 text-center lg:text-left grid lg:grid-cols-12 lg:columns gap-6 lg:gap-8">
				<div class="col-span-1 lg:col-span-6 row-span-1 row-start-1 lg:row-span-2">
					<picture>
						  <img src="<?php echo get_template_directory_uri(); ?>/images/subscribe-image.webp" alt="happy_couple_using_notbook" width="384" height="400">
					</picture>
				</div>
				<div class="row-start-2 lg:row-start-1 col-span-1 lg:col-span-6 lg:col-start-7 row-span-1 lg:row-span-1 lg:justify-stretch">
					<h2 class="text-[color:var(--Preto-Cinza,#222)] text-[32px] not-italic font-semibold leading-[125%] tracking-[-0.64px]">Suscríbete a Nuestro Boletín de Actualizaciones y Consejos</h2>
					<p class="text-[color:var(--Neutro-500,#23272F)] text-[15px] not-italic font-normal leading-[150%]">Mantente al día con nuestras novedades y actualizaciones de aplicaciones! Recibe consejos sobre nuevas aplicaciones cada semana.</p>
				</div>
				<form action="#" class="col-start-1 row-start-3 col-span-1 row-span-1 lg:row-start-2  lg:col-span-6 lg:col-start-7 lg:row-span-1 lg:justify-stretch">
					<div class="ring-1 ring-inset ring-[#E1E6EF] rounded-md">
						<input type="text" name="price" id="price" class="block bg-transparent placeholder:text-[#000] w-full rounded-md border-0 px-4 py-5 mb-4 text-black sm:text-sm sm:leading-6 focus-visible:outline-none" placeholder="Nombre">
					</div>
					<div class="flex border p-2 rounded-md mb-2 gap-2">
						<input type="text" name="price" id="price" class="block bg-transparent placeholder:text-[#000] w-full rounded-md border-0 px-4 py-4 text-black sm:text-sm sm:leading-6 focus-visible:outline-none" placeholder="Correo electrónico">
						<button type="submit" class="hidden title max-w-fit title--button w-full md:inline-block no-underline not-italic px-[26px] py-4 text-white font-open-sans bg-[var(--primary-color)] hover:bg-[var(--secondary-color)] rounded-lg text-sm font-medium leading-[150%] tracking-[-0.28px]">Suscríbase ahora</button>
					</div>
					<button type="submit" class="inline-block title max-w-full title--button w-full md:hidden no-underline not-italic px-16 py-[18px] mb-2 text-white font-open-sans bg-[var(--primary-color)] hover:bg-[var(--secondary-color)] rounded-lg text-sm font-medium leading-[150%] tracking-[-0.28px]">Suscríbase ahora</button>
					<p class="text-center">No te preocupes, no enviamos spam.</p>
				</form>
			</div>
		</div>
	</section>
<?php get_footer() ?>