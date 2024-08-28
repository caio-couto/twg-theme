<?php
	$title = wp_kses_post( get_theme_mod( 'lt_faq_title', __( 'Perguntas frequentes', 'lt' ) ) );
	$faq = range(1, 4); ?>
<?php ?>

<?php if ( $title ) { ?>
	<section class="box m-auto box--odd">
		<div class="w-full gap-4 m-auto grid grid-cols-12 templ lg:max-w-screen-xxl px-6 md:px-8 lg:px-32 py-10 lg:py-20 text-center lg:text-left">
			<div class="row-start-1 col-span-full lg:col-start-1 lg:col-span-4 text-center justify-self-center">
				<h2 class="text-[color:var(--Preto-Cinza,#222)] text-[32px] not-italic font-semibold leading-[125%] tracking-[-0.64px]"><?php echo $title; ?></h2>
			</div>
			<div class="row-start-2 col-span-full lg:row-start-1 lg:col-start-5 lg:col-span-7">
				<?php foreach ( $faq as $f ) { ?>
					<?php
						$title = wp_kses_post( get_theme_mod( 'lt_faq_' . $f . '_title' ) );
						$description = wp_kses_post( get_theme_mod( 'lt_faq_' . $f . '_description' ) );
					?>
					<div class="faq <?php if ($f == 1) echo "faq--active"; ?> pb-0-3">
						<div class="faq-question">
							<h3 class="text-[color:var(--Preto-Cinza,#222)] text-left text-xl not-italic font-medium leading-[125%] tracking-[-0.48px] mb-4"><?php echo $title; ?></h3>
							<div class="faq-button">
								<img src="<?php echo get_template_directory_uri(); ?>/images/<?php if ($f == 1) { echo "minus"; } else { echo "plus"; } ?>-icon.svg" alt="plus-icon">
							</div>
						</div>
						<div class="faq-answer mb-6">
							<p class="text-[color:var(--Neutro-500,#23272F)] text-[15px] not-italic font-normal leading-[150%] text-left"><?php echo $description; ?></p>
						</div>
					</div>
				<?php } ?>
			</div>
		</div>
	</section>
<?php } ?>