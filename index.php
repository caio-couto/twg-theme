<?php get_header(); ?>
	<main class="main font-open-sans">
		<?php get_template_part("includes/featured/main"); ?>
		<section class="w-full box m-auto box--even">
			<div class="tags w-full m-auto lg:max-w-screen-xxl px-6 md:px-8 lg:px-32 py-10 lg:py-20 text-center lg:text-left lg:gap-8">
				<?php get_template_part("includes/categories/categories"); ?>
			</div>
		</section>
		<?php get_template_part("includes/featured/featured"); ?>
		</section>
		<section class="m-auto w-full box--odd">
			<div class="w-full m-auto lg:max-w-screen-xxl px-6 md:px-8 lg:px-32 py-10 lg:py-20 text-center">
				<div class="box box--min box--center mx-auto">
						<h2 class="text-[color:var(--Preto-Cinza,#222)] text-center text-[22px] not-italic font-semibold leading-[125%] tracking-[-0.44px] lg:text-[32px] lg:tracking-[-0.64px] mb-8">Temos usado o Untitled para iniciar cada novo projeto e não podemos imaginar trabalhar sem ele.</h2>
						<div class="profile">
							<div class="profile-image mx-auto mb-4">
								<img class="m-auto" src="<?php echo get_template_directory_uri(); ?>/images/maria_lopez.webp" alt="maria_lopez" width="64" height="64">
							</div>
						<p class="text-[color:var(--Preto-Cinza,#222)] text-center text-base not-italic font-semibold leading-[125%] tracking-[-0.32px]">María López</p>
					</div>
				</div>
			</div>
		</section>
		<section class="m-auto w-full box box--even">
		<div class="w-full m-auto lg:max-w-screen-xxl px-6 md:px-8 lg:px-32 py-10 lg:py-20 text-center lg:text-left">
			<?php get_template_part("includes/post/post-list", null, array("order" => "even")); ?>
		</div>
		</section>
		<?php get_template_part("includes/faq/faq"); ?>
	</main>
<?php get_footer(); ?>