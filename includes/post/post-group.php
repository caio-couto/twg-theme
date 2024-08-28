<div class="post-group">
	<div class="flex flex-col gap-2 mb-10">
		<div class="m-auto p-2 bg-[#F7F9F4] rounded">
			<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
			  <path d="M10 7.00024H6C3.79086 7.00024 2 8.79111 2 11.0002V11.0002C2 13.2094 3.79086 15.0002 6 15.0002H10M10 7.00024V15.0002M10 7.00024L14.9648 3.52462C16.5944 2.38385 17.4092 1.81347 18.0874 1.84313C18.678 1.86896 19.2269 2.15474 19.5867 2.62375C20 3.16235 20 4.15693 20 6.1461V8.00024M10 15.0002L14.965 18.4755C16.5945 19.6161 17.4093 20.1864 18.0875 20.1567C18.6781 20.1308 19.2269 19.845 19.5868 19.376C20 18.8374 20 17.8429 20 15.8539V14.0002M6 15.0002V19.5002C6 20.3287 6.67157 21.0002 7.5 21.0002V21.0002C8.32843 21.0002 9 20.3287 9 19.5002V15.0002M20 8.00024V8.00024C21.6569 8.00024 23 9.34339 23 11.0002V11.0002C23 12.6571 21.6569 14.0002 20 14.0002V14.0002M20 8.00024V14.0002" stroke="#A4C68D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
			</svg>
		</div>
		<h2 class="text-[color:var(--Preto-Cinza,#222)] text-center text-[32px] not-italic font-semibold leading-[125%] tracking-[-0.64px]">Últimas Publicaciones</h2>
		<p class="text-[color:var(--Neutro-500,#23272F)] text-center text-[15px] not-italic font-normal leading-[150%]">Mantente al día con las novedades del mundo de las aplicaciones</p>
	</div>
	<div class="justify-start items-start gap-6 flex">
		<?php
			$recent_posts = new WP_Query( array( "posts_per_page" => 4, "meta_key" => "post_views_count", "orderby" => "meta_value_num", "order" => "DESC" ) );
			$i = 0;
			?>

			<?php if ( $recent_posts -> have_posts() ):

				if ($i == 0 && have_posts()): $recent_posts -> the_post();?>
					<div class="w-[727px] relative flex-col justify-start items-start gap-4 inline-flex">
				    <div class="w-full h-[254px] bg-[#999696] rounded-2xl overflow-hidden justify-center items-center inline-flex" style="background-image: url('<?php echo get_the_post_thumbnail_url(); ?>');">
				    </div>
			    	<div class="px-4 py-1 bg-[#fcf5fe] rounded block text-left">
			        <a href="<?php echo get_the_permalink(get_the_category()[0] -> id)?>" class="self-stretch text-[#222222] text-base font-normal leading-normal"><?php echo get_the_category()[0] -> name; ?></a>
			      </div>
				    <div class="self-stretch relative h-[209px] flex-col justify-start items-start gap-4 flex">
				      <a href="<?php the_permalink(); ?>" class="self-stretch text-[#222222] text-2xl text-left font-medium leading-[30px]">
				      <span class="absolute inset-0"></span><?php the_title(); ?></a>
				      <div class="self-stretch text-[#23272f] text-[15px] text-left font-normal leading-snug line-clamp-5"><?php echo get_the_excerpt(); ?></div>
				    </div>
				  </div>
				<?php
				$i+=1;
				endif;
				?>
				<div class="max-w-[464px] flex-col justify-start items-start gap-[46px] inline-flex">
			    <?php
			    while ( $recent_posts -> have_posts() && $i < 4 ): $recent_posts -> the_post();?>
				    <div class="self-stretch justify-center items-center gap-4 inline-flex">
				      <div class="w-52 h-[112px] rouded-lg overflow-hidden bg-[#999696] rounded-lg justify-center items-center flex">
				      	<?php if(get_the_post_thumbnail_url(get_the_ID())): ?>
				        <img class="w-52" src="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" />
				      	<?php endif ?>
				      </div>
				      <div class="w-60 self-stretch flex-col justify-center items-start gap-4 inline-flex">
				        <div class="px-4 py-1 bg-[#fcf5fe] rounded flex-col justify-center items-center gap-2 flex">
				          <a href="<?php echo get_the_permalink(get_the_category()[0] -> id)?>" class="self-stretch text-[#222222] text-base font-normal leading-normal"><?php echo get_the_category()[0] -> name; ?></a>
				        </div>
				        <a href="<?php the_permalink(); ?>" class="self-stretch text-[#222222] text-[22px] font-semibold text-left leading-7"><?php the_title(); ?></a>
				      </div>
				    </div>
			    <?php
			    	$i+=1; endwhile;
			    ?>
		    </div>
		   <?php endif; ?>
	  </div>
	</div>
</div>