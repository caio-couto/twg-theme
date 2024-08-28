<?php
    /**
    * Template Name: General Template
    */
?>
<?php get_header(); ?>
<?php if (have_posts()): ?>
<section class="w-full m-auto box box--even">
	<div class="w-full m-auto lg:max-w-screen-xxl px-6 md:px-8 lg:px-28 py-[60px] lg:py-20 text-center">
		<h1 class="text-[color:var(--Preto-Cinza,#222)] text-center lg:text-left md:text-5xl not-italic font-semibold md:leading-[125%] tracking-[-0.96px] text-[#222222] text-[26px] leading-loose my-4"><?php the_title(); ?></h1>
	</div>
</section>
<section class="w-full m-auto box box--odd">
	<div class="w-full m-auto lg:max-w-screen-xxl px-0 md:px-8 lg:px-28 py-[60px] lg:py-20">
		<div class="grid grid-cols-1 justify-items-center lg:grid-cols-5 w-full gap-8">
			<div class="post-content col-span-full lg:col-span-3 w-full format-content lg:max-w-3xl gap-y-[30px] text-left col-start-auto lg:col-start-3 row-start-1 grid">
				<?php the_content(); ?>
			</div>
			<div class="sidebar col-span-2 hidden max-w-[504px] lg:block col-start-1 w-full">
				<div class="sticky top-8">
					<?php if( is_active_sidebar("sidebar-blog") ): ?>
						<?php dynamic_sidebar( "sidebar-blog" ); ?>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</section>
<?php endif; ?>
<?php get_footer(); ?>