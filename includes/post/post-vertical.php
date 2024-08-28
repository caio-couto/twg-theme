<div class="w-full h-full bg-white rounded-lg justify-start items-center gap-4 flex pr-6">
  <div class="flex-shrink-0 overflow-hidden bg-cover rounded-2xl">
  	<?php if (get_the_post_thumbnail_url(get_the_ID(), "thumb")): ?>
  		<a href="<?php echo the_permalink(); ?>" class="hover:filter relative block overflow-hidden rounded-2xl">
  			<img class="w-[370px] h-[209px]" src="<?php echo get_the_post_thumbnail_url(get_the_ID(), "thumb"); ?>" alt="">
  			<span class="w-full h-full block absolute top-0 left-0 bg-white opacity-0 hover:opacity-20"></span>
  		</a>
  	<?php endif ?>
  </div>
  <div class="flex-col justify-start items-start gap-2 flex w-full min-w-[224px] m-4">
    <div class="px-4 py-1 bg-[#fbf7f1] rounded flex-col justify-center items-center gap-2 flex">
      <a href="<?php echo get_the_permalink(get_the_category()[0] -> id)?>" class="self-stretch text-[#222222] text-base font-normal leading-normal"><?php echo get_the_category()[0] -> name; ?></a>
    </div>
    <div class="group relative">
    	<h3 class="self-stretch text-[#222222] text-2xl font-medium leading-[30px] hover:underline underline-offset-2 cursor-pointer">
    		<a href=""><?php the_title(); ?></a>
    		<span class="absolute inset-0"></span>
    	</h3>
    	<p href="<?php echo get_the_permalink(); ?>" class="self-stretch text-[#23272f] text-[15px] font-normal leading-snug mt-2 line-clamp-3">
    		<?php echo get_the_excerpt(); ?>
    	</p>
    </div>
  </div>
</div>