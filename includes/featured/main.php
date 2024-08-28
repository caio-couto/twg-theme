<?php
	$title = wp_kses_post( get_theme_mod( 'lt_featured_title', __("Tu guía gefinitiva de las <span>mejores aplicaciones</span> del momento", "lt" ) ) );

	$description = wp_kses_post( get_theme_mod( 'lt_featured_description' ), __("En Indecor, encontrarás las últimas tendencias y novedades sobre las aplicaciones que están transformando el mundo digital. Mantente al día con nuestros análisis y descubre las aplicaciones esenciales que no te puedes perder. ¡Explora ahora y revoluciona tu experiencia digital!", "lt" ) );

	$button = wp_kses_post( get_theme_mod( 'lt_featured_button' ),  __("Descubre las mejores apps", "lt" ) );

	$url = esc_url( get_theme_mod( 'lt_featured_url',  __(get_home_url(), "lt" ) ) );

	$img = esc_attr( get_theme_mod( 'lt_featured_img',  __(get_template_directory_uri() . "/images/happy_student.webp", "lt" ) ) );
	$img_mobile = esc_attr( get_theme_mod( 'lt_featured_img_mobile',  __(get_template_directory_uri() . "/images/happy_student_mobile.webp", "lt" ) ) );
?>

<?php if ( $title || $description ): ?>
	<section class="w-full m-auto box--odd">
		<div class="w-full m-auto lg:max-w-screen-xxl px-6 md:px-8 lg:px-32 py-10 lg:py-20 text-center lg:text-left grid lg:grid-cols-12 lg:columns gap-6 lg:gap-8">
			<div class="lg:col-span-6 self-end">
				<h1 class="text-[color:var(--Preto-Cinza,#222)] text-center lg:text-left text-[26px] tracking-[-0.52px] lg:text-[48px] not-italic font-semibold leading-[125%] lg:tracking-[-0.96px"><?php echo $title; ?></h1>
			</div>
			<div class="lg:col-span-6 lg:row-start-2">
				<p class="text-[color:var(--Neutro-500,#23272F)] text-center lg:text-left text-[15px] not-italic font-normal leading-[150%] text-base lg:font-medium lg:leading-[150%] tracking-[-0.32px] mb-8"><?php echo $description; ?></p>
				<?php if ( $button && $url ): ?>
					<a class="title max-w-fit title--button w-full inline-block no-underline not-italic px-16 py-[18px] bg-[var(--primary-color)] hover:bg-[var(--secondary-color)] mb-2 text-white font-open-sans rounded-lg text-sm font-medium leading-[150%] tracking-[-0.28px]" href="<?php echo $url; ?>"><?php echo $button; ?></a>
				<?php endif; ?>
			</div>
			<div class="row-start-2  lg:col-span-6 lg:col-start-7 lg:row-span-2 lg:justify-self-stretch lg:self-end flex justify-center lg:justify-end">
				<picture>
					<source media="(max-width: 855px)" srcset="<?php echo $img_mobile; ?>">
					<img src="<?php echo $img; ?>" alt="happy_couple_using_notbook">
				</picture>
			</div>
		</div>
	</section>
<?php else: ?>
	<section class="w-full m-auto box--odd">
		<div class="w-full m-auto lg:max-w-screen-xxl px-6 md:px-8 lg:px-32 py-10 lg:py-20 text-center lg:text-left grid lg:grid-cols-12 lg:columns gap-6 lg:gap-8">
			<div class="lg:col-span-6 self-end">
				<h1 class="text-[color:var(--Preto-Cinza,#222)] text-center lg:text-left text-[26px] tracking-[-0.52px] lg:text-[48px] not-italic font-semibold leading-[125%] lg:tracking-[-0.96px">Tu guía gefinitiva de las <span>mejores aplicaciones</span> del momento</h1>
			</div>
			<div class="lg:col-span-6 lg:row-start-2">
				<p class="text-[color:var(--Neutro-500,#23272F)] text-center lg:text-left text-[15px] not-italic font-normal leading-[150%] text-base lg:font-medium lg:leading-[150%] tracking-[-0.32px] mb-8">En Indecor, encontrarás las últimas tendencias y novedades sobre las aplicaciones que están transformando el mundo digital. Mantente al día con nuestros análisis y descubre las aplicaciones esenciales que no te puedes perder. ¡Explora ahora y revoluciona tu experiencia digital!</p>
				<a class="title max-w-fit title--button w-full inline-block no-underline not-italic px-16 py-[18px] text-white font-open-sans bg-[var(--primary-color)] hover:bg-[var(--secondary-color)] rounded-lg text-sm font-medium leading-[150%] tracking-[-0.28px]" href="<?php echo get_the_permalink( $post = 0 ) ?>">Descubre las mejores apps</a>
			</div>
			<div class="row-start-2  lg:col-span-6 lg:col-start-7 lg:row-span-2 lg:justify-self-end lg:self-end">
				<picture>
				  <source media="(max-width: 855px)" srcset="<?php echo get_template_directory_uri(); ?>/images/happy_student_mobile.webp">
				  <img src="<?php echo get_template_directory_uri(); ?>/images/happy_student.webp" alt="happy_white_male_student_freelancer_using_tablet" width="390" height="502">
				</picture>
			</div>
		</div>
	</section>
<?php endif; ?>