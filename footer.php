	<?php wp_footer(); ?>
	<?php
		$description = wp_kses_post( get_theme_mod( 'lt_footer_description', __( '', 'lt' ) ) );
		$cnpj = wp_kses_post( get_theme_mod( 'lt_footer_cnpj', __( '', 'lt' ) ) );
		$copyright = wp_kses_post( get_theme_mod( 'lt_footer_copyright', __( '', 'lt' ) ) );
	?>
	<footer class="footer bg-[var(--primary-color)]">
		<div class="w-full m-auto lg:max-w-screen-xxl px-6 md:px-8 lg:px-32 py-10 text-center lg:text-left">
			<div class="footer-content">
				<div class="footer-left text-center lg:text-left">
					<?php the_custom_logo(); ?>
					<p><?php echo $description; ?></p>
				</div>
				<div class="footer-right text-center lg:text-left">
					<h2 class="font-bold">Navegación</h2>
					<ul>
					<?php
	        $array_menu = wp_get_nav_menu_items("Footer Menu");
          foreach ($array_menu as $m)
          {?>
          	<li>
          		<a href="<?php echo $m->url; ?>" class="text-sm font-semibold leading-6 text-white"><?php echo $m->title ?></a>
          	</li>
          <?php
          }
	      ?>
				</div>
				<div class="footer-bottom">
					<p><?php echo $copyright; ?></p><p><?php echo $cnpj; ?></p>
				</div>
			</div>
		</div>
	</footer>
</body>
</html>