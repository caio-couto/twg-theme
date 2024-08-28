<form role="search" action="<?php echo home_url( '/' ) ?>" method="get" class="max-w-md py-2 px-6 rounded-lg overflow-hidden border-gray-300 bg-white">
    <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
    <div class="flex gap-4">
        <input type="search" name="s" id="search" value="<?php the_search_query(); ?>" id="default-search" class="block w-full text-sm ring-0 outline-none border-none text-black border focus:ring-0 focus:outline-none" placeholder="Buscar por aplicación" required />
        <button type="submit" class="bg-white bottom-2.5 appearance-none font-medium text-sm outline-none border-none">
        	<svg width="27" height="26" viewBox="0 0 27 26" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M22.0771 21.6667L18.1514 17.741" stroke="#222222" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
						<path d="M4.74365 12.1875C4.74365 16.5253 8.26008 20.0417 12.5978 20.0417C16.9356 20.0417 20.452 16.5253 20.452 12.1875C20.452 7.8498 16.9356 4.33337 12.5978 4.33337V4.33337C8.26021 4.33369 4.74397 7.84994 4.74365 12.1875" stroke="#222222" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
					</svg>
			</button>
    </div>
</form>
