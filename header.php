<!DOCTYPE html>
<html lang="<?php language_attributes(); ?>">
<head>
	<meta charset="<?php bloginfo("charset") ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta lang="<?php language_attributes(); ?>">
	<title><?php wp_title(''); ?></title>
	<meta name="description" content="Ao escrever uma meta tag, use entre 140 e 160 caracteres para que o Google possa exibir toda a sua mensagem. Não se esqueça de incluir sua palavra-chave!">
	<?php wp_head(); ?>
	<style>
		:root
		{
			--primary-color: <?php echo esc_url( get_theme_mod( 'primary_color'), "#1571e0" ); ?>;
			--secondary-color: <?php echo esc_url( get_theme_mod( 'secondary_color'), "#3b82f6" ); ?>;
		}
	</style>
</head>
<body <?php body_class(); ?> class="relative font-open-sans">
	<header class="bg-[var(--primary-color)]">
	  <nav class="mx-auto flex max-w-7xl items-center justify-between py-2 px-[30px] lg:px-4 lg:py-4 gap-5" aria-label="Global">
	    <div class="flex lg:flex-0 max-w-[90px] md:max-w-[159px]">
	      <a href="./home" class="-m-1.5 p-1.5">
	        <span class="sr-only">Indecor</span>
	        <?php the_custom_logo(); ?>
	      </a>
	    </div>
	    <div class="flex lg:hidden">
	      <button type="button" class="open-mobile-menu -m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700">
	        <span class="sr-only">Open main menu</span>
	        <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
					  <path d="M7.3302 16H24.6703" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
					  <path d="M7.3302 21.3356H24.6703" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
					  <path d="M7.32971 10.6644H24.6698" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
					</svg>
	      </button>
	    </div>
	    <div class="hidden lg:flex lg:gap-x-12">
	    	<?php
	        $array_menu = wp_get_nav_menu_items("Main Menu");
          foreach ($array_menu as $m)
          {?>
             <a href="<?php echo $m->url; ?>" class="text-sm font-semibold leading-6 text-white"><?php echo $m->title; ?></a>
          <?php
          }
	      ?>
	    </div>
	    <div class="hidden lg:block">
	      	<?php get_search_form(); ?>
	    </div>
	  </nav>
	  <!-- Mobile menu, show/hide based on menu open state. -->
	  <div class="mobile-menu hidden" role="dialog" aria-modal="true">
	    <div class="fixed inset-0 z-10"></div>
	    <div class="fixed inset-y-0 right-0 z-50 w-full overflow-y-auto bg-[var(--primary-color)] px-6 py-6 sm:max-w-sm sm:ring-1 sm:ring-gray-900/10">
	      <div class="flex items-center justify-between">
	        <a href="#" class="-m-1.5 p-1.5">
	          <span class="sr-only">Your Company</span>
	          <?php the_custom_logo(); ?>
	        </a>
	        <button type="button" class="close-mobile-menu -m-2.5 rounded-md p-2.5 text-gray-700">
	          <span class="sr-only">Close menu</span>
	          <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
	            <path stroke="white" stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
	          </svg>
	        </button>
	      </div>
	      <div class="mt-6 flow-root">
	        <div class="-my-6 divide-y divide-gray-500/10">
	        	<div class="block pt-6">
				      	<?php get_search_form(); ?>
				    </div>
	          <div class="space-y-2 py-6">
	          	<?php
                $array_menu = wp_get_nav_menu_items("Main Menu");
                  foreach ($array_menu as $m)
                  {?>
                      <a href="<?php echo $m->url; ?>" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-white hover:bg-gray-800"><?php echo $m->title ?></a>
                  <?php
                  }
              ?>
	          </div>
	        </div>
	      </div>
	    </div>
	  </div>
	</header>


