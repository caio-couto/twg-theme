<?php
	$title = wp_kses_post( get_theme_mod( 'lt_destaques_1_title', __( '', 'lt' ) ) );

	$description = wp_kses_post( get_theme_mod( 'lt_destaques_1_description', __( '', 'lt' ) ) );

	//lt_destaques_' . $l . '_url

	$button = wp_kses_post( get_theme_mod( 'lt_destaques_1_btn', __( '', 'lt' ) ) );
	$url = esc_url( get_theme_mod( 'lt_destaques_1_url' ) );

	$img = esc_attr( get_theme_mod( 'lt_destaques_1_img' ) );
?>

<?php if ( $title || $description ): ?>
	<section class="w-full m-auto box--odd">
		<div class="w-full m-auto lg:max-w-screen-xxl px-6 md:px-8 lg:px-32 py-10 lg:py-20 text-center lg:text-left grid lg:grid-cols-12 lg:columns gap-6 lg:gap-8">
			<div class="lg:col-span-6 self-end lg:col-start-7">
				<h2 class="text-[color:var(--Preto-Cinza,#222)] text-center lg:text-left text-[22px] not-italic font-semibold leading-[125%] tracking-[-0.44px] lg:text-[32px] lg:leading-[125%] lg:tracking-[-0.64px]"><?php echo $title; ?></h2>
			</div>
			<div class="lg:col-span-6 lg:row-start-2 lg:col-start-7">
				<?php
					$paragraps = explode("\n", $description);
					foreach($paragraps as $paragraph)
					{
						echo <<<HTML
							<p class="text-[color:var(--Neutro-500,#23272F)] text-center lg:text-left text-[15px] not-italic font-normal leading-[150%] mb-8">{$paragraph}</p>
						HTML;
					}?>
				<?php if ( $button && $url ): ?>
					<a class="title max-w-fit title--button w-full inline-block no-underline not-italic px-16 py-[18px] mb-2 text-white font-open-sans bg-[var(--primary-color)] hover:bg-[var(--secondary-color)] rounded-lg text-sm font-medium leading-[150%] tracking-[-0.28px]" href="<?php echo $url; ?>"><?php echo $button; ?></a>
				<?php endif; ?>
			</div>
			<div class="row-start-2  lg:row-start-1 lg:col-span-6 lg:col-start-1 lg:row-span-2 lg:justify-self-end lg:self-end">
				<picture>
					  <source media="(max-width: 855px)" srcset="<?php echo $img; ?>">
					  <img src="<?php echo $img; ?>" alt="happy_couple_using_notbook" width="592" height="453">
				</picture>
			</div>
		</div>
	</section>
<?php else: ?>
	<section class="w-full m-auto box--odd">
		<div class="w-full m-auto lg:max-w-screen-xxl px-6 md:px-8 lg:px-32 py-10 lg:py-20 text-center lg:text-left grid lg:grid-cols-12 lg:columns gap-6 lg:gap-8">
			<div class="lg:col-span-6 self-end lg:col-start-7">
				<h2 class="text-[color:var(--Preto-Cinza,#222)] text-center lg:text-left text-[22px] not-italic font-semibold leading-[125%] tracking-[-0.44px] lg:text-[32px] lg:leading-[125%] lg:tracking-[-0.64px]">Indecor ayuda a millones de personas a encontrar las mejores aplicaciones del momento</h2>
			</div>
			<div class="lg:col-span-6 lg:row-start-2 lg:col-start-7">
				<p class="text-[color:var(--Neutro-500,#23272F)] text-center lg:text-left text-[15px] not-italic font-normal leading-[150%] mb-12">Nuestro objetivo es ayudarte a descubrir las aplicaciones más innovadoras y útiles disponibles. Con nuestras reseñas y recomendaciones detalladas, millones de personas han encontrado las herramientas digitales perfectas para sus necesidades. Únete a nuestra comunidad y mantente al día con las últimas tendencias en aplicaciones</p>
				<a class="title max-w-fit title--button w-full inline-block no-underline not-italic px-16 py-[18px] mb-2 text-white font-open-sans bg-[var(--primary-color)] hover:bg-[var(--secondary-color)] rounded-lg text-sm font-medium leading-[150%] tracking-[-0.28px]" href="">Descubre las mejores apps</a>
			</div>
			<div class="row-start-2  lg:row-start-1 lg:col-span-6 lg:col-start-1 lg:row-span-2 lg:justify-self-end lg:self-end">
				<picture>
					  <source media="(max-width: 855px)" srcset="<?php echo get_template_directory_uri(); ?>/images/happy_couple_mobile.webp">
					  <img src="<?php echo get_template_directory_uri(); ?>/images/happy_couple.webp" alt="happy_couple_using_notbook" width="592" height="453">
				</picture>
			</div>
		</div>
	</section>
<?php endif ?>

<?php
	$title = wp_kses_post( get_theme_mod( 'lt_destaques_2_title', __( '', 'lt' ) ) );

	$description = wp_kses_post( get_theme_mod( 'lt_destaques_2_description', __( '', 'lt' ) ) );

	//lt_destaques_' . $l . '_url

	$button = wp_kses_post( get_theme_mod( 'lt_destaques_2_btn', __( '', 'lt' ) ) );
	$url = esc_url( get_theme_mod( 'lt_destaques_2_url' ) );

	$img = esc_attr( get_theme_mod( 'lt_destaques_2_img' ) );
?>

<?php if ( $title || $description ): ?>
	<section class="w-full box box--even m-auto">
		<div class="w-full m-auto lg:max-w-screen-xxl px-6 md:px-8 lg:px-32 py-10 lg:py-20 text-center lg:text-left grid lg:grid-cols-12 lg:columns gap-6 lg:gap-8">
			<div class="lg:col-span-6 self-end">
				<h2 class="text-[color:var(--Preto-Cinza,#222)] text-center lg:text-left text-[22px] not-italic font-semibold leading-[125%] tracking-[-0.44px] lg:text-[32px] lg:leading-[125%] lg:tracking-[-0.64px]"><?php echo $title; ?></h2>
			</div>
			<div class="lg:col-span-6 lg:row-start-2">
				<?php
					$paragraps = explode("\n", $description);
					foreach($paragraps as $paragraph)
					{
						echo <<<HTML
							<p class="text-[color:var(--Neutro-500,#23272F)] text-center lg:text-left text-[15px] not-italic font-normal leading-[150%] mb-8">{$paragraph}</p>
						HTML;
					}?>
				<?php if ( $button && $url ): ?>
					<a class="title max-w-fit title--button w-full inline-block no-underline not-italic px-16 py-[18px] mb-2 text-white font-open-sans bg-[var(--primary-color)] hover:bg-[var(--secondary-color)] rounded-lg text-sm font-medium leading-[150%] tracking-[-0.28px]" href="<?php echo $url; ?>"><?php echo $button; ?></a>
				<?php endif; ?>
			</div>
			<div class="row-start-2  lg:col-span-6 lg:col-start-7 lg:row-span-2 lg:justify-self-end lg:self-end">
				<picture>
				 	<source media="(max-width: 855px)" srcset="<?php echo $img; ?>">
					<img src="<?php echo $img; ?>" alt="happy_couple_using_notbook" width="592" height="453">
				</picture>
			</div>
		</div>
	</section>
<?php else: ?>
	<section class="w-full box box--even m-auto">
		<div class="w-full m-auto lg:max-w-screen-xxl px-6 md:px-8 lg:px-32 py-10 lg:py-20 text-center lg:text-left grid lg:grid-cols-12 lg:columns gap-6 lg:gap-8">
			<div class="lg:col-span-6 self-end">
				<h2 class="text-[color:var(--Preto-Cinza,#222)] text-center lg:text-left text-[22px] not-italic font-semibold leading-[125%] tracking-[-0.44px] lg:text-[32px] lg:leading-[125%] lg:tracking-[-0.64px]">Bienvenidos a Indecor</h2>
			</div>
			<div class="lg:col-span-6 lg:row-start-2">
				<p class="text-[color:var(--Neutro-500,#23272F)] text-center lg:text-left text-[15px] not-italic font-normal leading-[150%] mb-8">Somos tu guía confiable para todo lo relacionado con aplicaciones móviles. En INDECOR, nuestra misión es proporcionar a los usuarios toda la información necesaria y ofrecer las mejores opciones para descargar la aplicación móvil ideal.</p>
				<p class="text-[color:var(--Neutro-500,#23272F)] text-center lg:text-left text-[15px] not-italic font-normal leading-[150%] mb-8">Creemos en el poder de la tecnología móvil para enriquecer nuestras vidas, simplificar tareas y entretenernos de maneras antes inimaginables. Ofrecemos reseñas detalladas, guías prácticas, noticias actualizadas y comparaciones útiles para ayudarte a encontrar la mejor aplicación para tus necesidades.</p>
				<p class="text-[color:var(--Neutro-500,#23272F)] text-center lg:text-left text-[15px] not-italic font-normal leading-[150%] mb-8">Nuestro equipo está formado por entusiastas de las aplicaciones, expertos en tecnología y escritores apasionados, todos dedicados a ofrecerte el mejor contenido sobre aplicaciones.</p>
			</div>
			<div class="row-start-2  lg:col-span-6 lg:col-start-7 lg:row-span-2 lg:justify-self-end lg:self-end">
				<picture>
				  <source media="(max-width: 855px)" srcset="<?php echo get_template_directory_uri(); ?>/images/happy_couple_mobile.webp">
				  <img src="<?php echo get_template_directory_uri(); ?>/images/happy_couple.webp" alt="happy_couple_using_notbook" width="592" height="453">
				</picture>
			</div>
		</div>
	</section>
<?php endif ?>

<?php
	$title = wp_kses_post( get_theme_mod( 'lt_destaques_3_title', __( '', 'lt' ) ) );

	$description = wp_kses_post( get_theme_mod( 'lt_destaques_3_description', __( '', 'lt' ) ) );

	//lt_destaques_' . $l . '_url

	$button = wp_kses_post( get_theme_mod( 'lt_destaques_3_btn', __( '', 'lt' ) ) );
	$url = esc_url( get_theme_mod( 'lt_destaques_3_url' ) );

	$img = esc_attr( get_theme_mod( 'lt_destaques_3_img' ) );
?>

<?php if ( $title || $description ): ?>
	<section class="w-full m-auto bg-[#F7F9F4] border-b-4 border-b-[#6C9750] border-solid">
		<div class="w-full mx-auto lg:max-w-screen-xxl px-6 md:px-8 lg:px-32 pt-10 lg:pt-20 text-center lg:text-left">
				<div class="mx-auto flex flex-col items-center">
					<h2 class="text-[color:var(--Preto-Cinza,#222)] text-center text-[22px] not-italic font-semibold leading-[125%] tracking-[-0.44px] lg:text-[32px] lg:tracking-[-0.64px]"><?php echo $title; ?></h2>
					<?php
					$paragraps = explode("\n", $description);
					foreach($paragraps as $paragraph)
					{
						echo <<<HTML
							<p class="text-[color:var(--Neutro-500,#23272F)] text-center text-[15px] not-italic font-normal leading-[150%] mb-10 mt-6">{$paragraph}</p>
						HTML;
					}?>
					<?php if ( $button && $url ): ?>
					<a class="title max-w-fit title--button w-full inline-block no-underline not-italic px-16 py-[18px] mb-10 text-white font-open-sans bg-[var(--primary-color)] hover:bg-[var(--secondary-color)] rounded-lg text-sm font-medium leading-[150%] tracking-[-0.28px]" href="<?php echo $url; ?>"><?php echo $button; ?></a>
					<?php endif; ?>
					<picture class="app-image">
				  	<source media="(max-width: 855px)" srcset="<?php echo get_template_directory_uri(); ?>/images/happy_couple_mobile.webp">
				  	<img class="relative inset-x-0" src="<?php echo $img; ?>" alt="happy_couple_using_notbook" width="592" height="453">
					</picture>
				</div>
			</div>
		</div>
	</section>
<?php else: ?>
	<section class="w-full m-auto bg-[#F7F9F4] border-b-4 border-b-[#6C9750] border-solid">
		<div class="w-full mx-auto lg:max-w-screen-xxl px-6 md:px-8 lg:px-32 pt-10 lg:pt-20 text-center lg:text-left">
				<div class="mx-auto flex flex-col items-center">
					<h2 class="text-[color:var(--Preto-Cinza,#222)] text-center text-[22px] not-italic font-semibold leading-[125%] tracking-[-0.44px] lg:text-[32px] lg:tracking-[-0.64px]">¡Descubre las Mejores Apps del Momento y Transforma tu Vida!</h2>
					<p class="text-[color:var(--Neutro-500,#23272F)] text-center text-[15px] not-italic font-normal leading-[150%] mb-10 mt-6">En Indecor, encontrarás las últimas tendencias y novedades sobre las aplicaciones que están transformando el mundo digital. Mantente al día con nuestros análisis y descubre las aplicaciones esenciales que no te puedes perder. ¡Explora ahora y revoluciona tu experiencia digital!</p>
					<a class="title max-w-fit title--button w-full inline-block no-underline not-italic px-16 py-[18px] mb-8 text-white font-open-sans bg-[var(--primary-color)] hover:bg-[var(--secondary-color)] rounded-lg text-sm font-medium leading-[150%] tracking-[-0.28px]" href="">Descubre las mejores apps</a>
					<picture class="app-image">
						<source media="(max-width: 855px)" srcset="<?php echo get_template_directory_uri(); ?>/images/indecor_app_mobile.webp">
						<img class="relative inset-x-0" src="<?php echo get_template_directory_uri(); ?>/images/indecor_app.webp" alt="indecor_app" width="526">
					</picture>
				</div>
			</div>
		</div>
	</section>
<?php endif ?>
