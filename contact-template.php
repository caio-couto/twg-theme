<?php
    /**
    * Template Name: Contac Template
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
    <div class="w-full m-auto lg:max-w-screen-xxl px-6 md:px-8 lg:px-28 flex flex-col lg:flex-row gap-4">
        <div class="pt-[60px] pb-6 lg:py-20">
            <div class="format-content !text-center lg:!text-left">
                <?php the_content(); ?>
            </div>
        </div>
        <div class="w-1 h-auto bg-[#F1F3F9]"></div>
        <div class="contact w-full format-content gap-y-[30px] text-left col-start-2 row-start-1 pt-0 pb-6 lg:py-20">
            <div class="w-full mx-auto max-w-[592px] flex-shrink-0">
                <?php echo get_field("form"); ?>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>
<?php get_footer(); ?>