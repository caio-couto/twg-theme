<article class="flex w-full max-w-xl flex-col items-start justify-between text-left">
	<div class="flex w-full items-start flex-col justify-between">
		<div class="w-full relative">
			<?php if( get_the_post_thumbnail_url(get_the_ID()) ): ?>
				<a href="<?php echo get_the_permalink(get_the_category()[0] -> id)?>" class="hover:filter relative block overflow-hidden rounded-2xl">
					<img class="w-full sm:aspect-video sm:object-cover" src="<?php echo get_the_post_thumbnail_url(get_the_ID(), "thumb"); ?>" alt="post-image" width="340" height="191">
					<span class="w-full h-full block absolute top-0 left-0 bg-white opacity-0 hover:opacity-20"></span>
				</a>
			<?php endif; ?>
		</div>
		<div class="max-w-xl">
      <div class="group relative">
        <h3 class="mt-3 text-[color:var(--Preto-Cinza,#222)] text-[22px] not-italic font-medium leading-[125%] tracking-[-0.44px] lg:text-2xl lg:tracking-[-0.48px] hover:underline underline-offset-2">
          <a href="<?php the_permalink(); ?>">
            <span class="absolute inset-0"></span>
            <?php the_title(); ?>
          </a>
        </h3>
        <?php if (!get_the_post_thumbnail_url(get_the_ID())): ?>
        	<div class="mt-5 line-clamp-3 text-[color:var(--Neutro-500,#23272F)] text-[15px] not-italic font-normal leading-[150%] lg:text-[15px]"><?php echo get_the_excerpt(); ?></div>
      	<?php endif; ?>
      </div>
		</div>
	</div>
</article>