<div class="categories flex flex-col md:flex-row items-center gap-5">
	<div class="max-w-full lg:max-w-56">
		<h2 class="text-[color:var(--Preto-Cinza,#222)]  text-2xl not-italic font-semibold leading-[125%] tracking-[-0.48px] mb-2">Aplicaciones esenciales para ti</h2>
		<p class="text-[color:var(--Neutro-P,#999696)] text-[15px] not-italic font-normal leading-[150%]">¡Prueba estas aplicaciones y transforma tu día a día!</p>
	</div>
	<ul class="grid grid-cols-2 grid-rows-2 gap-4 md:flex md:gap-4 md:flex-wrap xl:flex-nowrap">
		<?php
			$categories_range = range(1, 4);
			$categories = array();

			foreach( $categories_range as $category):
				$category_slug = get_theme_mod( 'rjs_category_dropdown_' . $category );
				$category = get_category_by_slug( $category_slug );

				array_push($categories, $category);
			?>
		<?php endforeach;?>
		<?php if ($categories[0] -> name): ?>
		<li style="--custom-color: #F3A87E;" class="tag-item max-w-[232px] flex-[1_0_100%] relative w-full px-4 py-6 rounded-sm cursor-pointer">
			<a href="<?php echo get_category_link($categories[0]); ?>">
				<div class="group mb-2">
					<div class="p-2 max-w-10 max-h-10 mx-auto md:mx-0 rounded">
						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path fill-rule="evenodd" clip-rule="evenodd" d="M12.005 4.925C12.78 4.018 14.121 3 16.163 3C19.734 3 22.13 6.352 22.13 9.474C22.13 16 14.005 21 12.005 21C10.005 21 1.88 16 1.88 9.474C1.88 6.352 4.276 3 7.847 3C9.889 3 11.23 4.018 12.005 4.925Z" stroke="#B52E19" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
							<path d="M7.005 11.5H9.22701L10.894 9L13.116 14L14.783 11.5H17.005" stroke="#B52E19" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
						</svg>
					</div>
					<h3 class=" text-[color:var(--Preto-Cinza,#222)] text-center md:text-left text-xl not-italic font-medium leading-[125%] tracking-[-0.4px]"><?php echo $categories[0] -> name; ?></h3>
				</div>
				<p class="hidden md:block text-[color:var(--Neutro-500,#23272F)] text-[15px] not-italic font-normal leading-[150%] "><?php echo $categories[0] -> description; ?></p>
			</a>
		</li>
		<?php endif; ?>
		<?php if ($categories[1] -> name):?>
		<li style="--custom-color: #A4C68D;" class="tag-item max-w-[232px] flex-[1_0_100%] relative px-4 py-6 rounded-sm">
			<a href="<?php echo get_category_link($categories[1]); ?>">
				<div class="group mb-2">
					<div class="p-2 max-w-10 max-h-10 mx-auto md:mx-0 rounded">
						<svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M16.0067 11.6638H11.0046" stroke="#456233" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
							<path d="M16.0067 15.6654H11.0046" stroke="#456233" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
							<path d="M8.12838 11.5387C8.05932 11.5387 8.00333 11.5947 8.00333 11.6638C8.00333 11.7328 8.05932 11.7888 8.12838 11.7888C8.19745 11.7888 8.25343 11.7328 8.25343 11.6638C8.25343 11.5947 8.19745 11.5387 8.12838 11.5387" stroke="#456233" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
							<path d="M8.12838 15.5404C8.05932 15.5404 8.00333 15.5964 8.00333 15.6654C8.00333 15.7345 8.05932 15.7905 8.12838 15.7905C8.19745 15.7905 8.25343 15.7345 8.25343 15.6654C8.25343 15.5964 8.19745 15.5404 8.12838 15.5404" stroke="#456233" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
							<path d="M3.00122 19.6671H7.00289" stroke="#456233" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
							<path d="M5.00204 21.6679V17.6663" stroke="#456233" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
							<path d="M8.00338 5.66125H6.00254C4.89751 5.66125 4.00171 6.55706 4.00171 7.66209V14.665" stroke="#456233" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
							<rect x="8.0033" y="3.6604" width="8.00333" height="4.00167" rx="1" stroke="#456233" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
							<path d="M16.0067 5.66125H18.0075C19.1125 5.66125 20.0083 6.55706 20.0083 7.66209V19.6671C20.0083 20.7721 19.1125 21.6679 18.0075 21.6679H10.0042" stroke="#456233" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
						</svg>
					</div>
					<h3 class=" text-[color:var(--Preto-Cinza,#222)] text-center md:text-left text-xl not-italic font-medium leading-[125%] tracking-[-0.4px]"><?php echo $categories[1] -> name; ?></h3>
				</div>
				<p class="hidden md:block text-[color:var(--Neutro-500,#23272F)] text-[15px] not-italic font-normal leading-[150%] "><?php echo $categories[1] -> description; ?></p>
			</a>
		</li>
		<?php endif; ?>
		<?php if ($categories[2] -> name): ?>
		<li style="--custom-color: #7BD4FE;" class="tag-item max-w-[232px] flex-[1_0_100%] relative w-full px-4 py-6 rounded-sm cursor-pointer">
			<a href="<?php echo get_category_link($categories[2]); ?>">
				<div class="group mb-2">
					<div class="p-2 max-w-10 max-h-10 mx-auto md:mx-0 rounded">
						<svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M12 6.66418V8.16418" stroke="#1675E8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
							<path d="M18.3639 6.30022C21.8787 9.81494 21.8787 15.5134 18.3639 19.0281C14.8492 22.5428 9.15074 22.5428 5.63604 19.0281C2.12132 15.5134 2.12132 9.81492 5.63604 6.30022C9.15076 2.7855 14.8492 2.7855 18.3639 6.30022" stroke="#1675E8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
							<path d="M12 18.6642V17.1642" stroke="#1675E8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
							<path d="M9 14.9192V14.9192C9 16.1622 10.007 17.1692 11.25 17.1692H12.893C14.056 17.1692 15 16.2262 15 15.0622V15.0622C15 14.0962 14.343 13.2542 13.406 13.0192L10.594 12.3142C9.657 12.0792 9 11.2372 9 10.2712V10.2712C9 9.10718 9.943 8.16418 11.107 8.16418H12.75C13.993 8.16418 15 9.17118 15 10.4142V10.4142" stroke="#1675E8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
						</svg>
					</div>
					<h3 class=" text-[color:var(--Preto-Cinza,#222)] text-center md:text-left text-xl not-italic font-medium leading-[125%] tracking-[-0.4px]"><?php echo $categories[2] -> name; ?></h3>
				</div>
				<p class="hidden md:block text-[color:var(--Neutro-500,#23272F)] text-[15px] not-italic font-normal leading-[150%] "><?php echo $categories[2] -> description; ?></p>
			</a>
		</li>
		<?php endif; ?>
		<?php if ($categories[3] -> name): ?>
		<li style="--custom-color: #E9B3F4;" class="tag-item max-w-[232px] flex-[1_0_100%] relative w-full px-4 py-6 rounded-sm cursor-pointer">
			<a href="<?php echo get_category_link($categories[3]); ?>">
				<div class="group mb-2">
					<div class="p-2 max-w-10 max-h-10 mx-auto md:mx-0 rounded">
						<svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M9 21.6642H15" stroke="#952AA1" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
							<path fill-rule="evenodd" clip-rule="evenodd" d="M14.999 17.8232V18.8892H8.999V17.8232C8.999 16.7662 8.50899 15.7792 7.69399 15.1052C6.28299 13.9362 5.355 12.2062 5.258 10.2542C5.073 6.51316 8.14799 3.22416 11.893 3.16716C15.67 3.10816 18.75 6.15116 18.75 9.91416C18.75 12.0162 17.787 13.8902 16.279 15.1262C15.47 15.7892 14.999 16.7772 14.999 17.8232Z" stroke="#952AA1" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
							<path d="M8.53998 16.1141H15.45" stroke="#952AA1" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
						</svg>
					</div>
					<h3 class=" text-[color:var(--Preto-Cinza,#222)] text-center md:text-left text-xl not-italic font-medium leading-[125%] tracking-[-0.4px]"><?php echo $categories[3] -> name; ?></h3>
				</div>
				<p class="hidden md:block text-[color:var(--Neutro-500,#23272F)] text-[15px] not-italic font-normal leading-[150%] "><?php echo $categories[3] -> description; ?></p>
			</a>
		</li>
		<?php endif; ?>
	</ul>
</div>