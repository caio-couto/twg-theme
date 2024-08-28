<?php

if ( !function_exists("themeSetup") )
{
	function themeSetup()
	{
		add_theme_support("title-tag");
		add_theme_support("post-thumbnails");
		add_theme_support("custom-logo");
	}

	add_action("after_setup_theme", "themeSetup");
}

if ( !function_exists("themeMenus") )
{
	function themeMenus()
	{
		register_nav_menus(array(
			"twg_main_menu" => "Main Menu",
			"twg_footer_menu" => "Footer Menu"
		));
	}

	add_action("after_setup_theme", "themeMenus");
}

if ( !function_exists("themeAssets") )
{
	function themeAssets()
	{
		wp_enqueue_style("twg-style", get_template_directory_uri() . "/assets/main.min.css", array(), "2.7.6", "all" );
		wp_enqueue_style("google", "https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400..800;1,400..800&display=swap", array(), null, "all");
		wp_enqueue_script("twg-script", get_template_directory_uri() . "/assets/main.min.js", array(), "2.0", true);
	}

	add_action("wp_enqueue_scripts", "themeAssets", 100000);
}

if ( !function_exists("acfSetup") )
{
	function acfSetup()
	{
		acf_update_setting( "enable_shortcode", true );
	}

	add_action( "acf/init", "acfSetup" );
}

require_once get_template_directory() . '/functions/panel.php';

function related_shortcode($atts)
{
	global $post;

	$categories_id = array();
  $current_category = get_the_category();
  foreach($current_category as $cc)
  {
  	$categories_id[] = $cc->term_id;
  }

	// Fields
	$sameCategoryPosts = get_posts(array(
    'cat'            => $categories_id,
    'post__not_in'   => array($post->ID),
    'orderby' => 'date',
    'order' => 'DESC',
    "posts_per_page" => 4,
  ));

  if (!$sameCategoryPosts)
  {
  	return "";
  }

	$html =
	<<<HTML
		<div class="recommended bg-[#F7F9F4] rounded-lg mx-4 md:mx-0 relative px-4 max-w-full py-4 flex justify-center flex-col gap-2">
			<div class="bg-[#545454] w-1 h-8 absolute top-3"></div>
			<div class="text-[color:var(--Preto-Cinza,#222)] text-left pl-3 text-lg not-italic font-medium leading-[125%] tracking-[-0.36px]">Contenido recomendado</div>
	HTML;

	foreach( $sameCategoryPosts as $sameCategoryPost)
	{
		if (!get_field("related_title", $sameCategoryPost -> ID))
		{
			continue;
		}

		$postURL = get_the_permalink($sameCategoryPost -> ID);
		$relatedTitle = get_field("related_title", $sameCategoryPost -> ID);

		if ($relatedTitle)
		{
			$html .=
			<<< HTML
			<a class=" text-white w-full text-base not-italic font-semibold leading-[150%] tracking-[-0.32px]
			mt-1 bg-[var(--primary-color)] hover:bg-[var(--secondary-color)] rounded-xl py-2 px-3 text-center inline-flex justify-between items-center uppercase" href="{$postURL}">
				<div class="line-clamp-1 text-xs uppercase">{$relatedTitle}</div>
				<div class="border-2 rounded-full py-1 px-0">
					<svg style="width: 25px; --darkreader-inline-stroke: currentColor;" class="w-4 h-4" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" data-darkreader-inline-stroke="">
						<path d="M5 12h14"></path>
						<path d="M12 5l7 7-7 7"></path>
					</svg>
				</div>
			</a>
			HTML;
		}
	}


	$html .=
	<<<HTML
	</div>
	HTML;
  // Return HTML code
  return $html;
}

add_shortcode('related', 'related_shortcode');

function p2_shortcode($atts)
{
	global $post;

	// Fields
	$title =  get_field("title", $post->ID);
	$featuredImage = get_field("featured_image");
	$title = get_field("title") ;
	$description = get_field("description");
	$buttonURL = get_field("button_url") ;
	$buttonText = get_field("button_text");

  $return =
	<<<HTML
	<div class="first_button bg-[#F7F9F4] max-w-fit mx-4 md:mx-0 justify-self-center mb-5 px-4 py-4 text-center flex md:justify-start items-center md:gap-6 flex-col md:flex-row rounded-lg">
		<img class="max-w-[238px] max-h-[235px] rounded-lg overflow-clip" fetchpriority="high" class="rounded" src="{$featuredImage}" alt="button-image" width="328" height="235">
		<div class="max-w-md flex-1 text-center md:text-left mx-auto md:mx-0 break-words">
			<div class="line-clamp-3 mb-4">
				<div class="text-[#545454] lg:text-[24px] text-center md:text-left not-italic lg:leading-[125%] tracking-[-0.48px] text-[22px] font-semibold leading-7">{$title}</div>
			</div>
			<div class="line-clamp-3 mb-6">
				<div class="text-[#545454] text-base text-center md:text-left not-italic font-normal lg:leading-[150%] tracking-[-0.32px] leading-normal">{$description}</div>
			</div>
			<div class="m-auto md:mr-0 max-w-fit text-center md:text-right">
				<a class="title inline-block title--button uppercase text-center no-underline not-italic px-6 py-2 mb-2 text-white font-open-sans bg-[var(--primary-color)] hover:bg-[var(--secondary-color)] rounded-lg text-sm font-medium leading-[150%] tracking-[-0.28px]" href="{$buttonURL}">{$buttonText}</a>
				<div class="text-[color:var(--Neutro-P,#999696)] text-xs text-center not-italic font-normal leading-[150%] tracking-[-0.28px]">Permanecerás en este sitio</div>
			</div>
		</div>
	</div>
	HTML;
  // Return HTML code
  return $return;
}

add_shortcode('p2', 'p2_shortcode');

function subh_set_post_view($postID)
{

    $count_key = 'post_views_count';
    $count = (int) get_post_meta($postID, $count_key, true);

    if ($count == 0) {
        $count++;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, $count++);
    } else {
        $count++;
        update_post_meta($postID, $count_key, $count);
    }

}

function getPostViews($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    return $count.' Views';
}

/**
 * Add a new column in the admin panel posts list
 *
 * @param $defaults
 *
 * @return mixed
 */
function subh_posts_column_views($defaults)
{
    $defaults['post_views'] = __('Views');

    return $defaults;
}

/**
 * Display the number of views for each posts on the admin panel
 *
 * @param $column_name
 * @param $id
 *
 * @return void simply echo out the number of views
 */
function subh_posts_custom_column_views($column_name, $id)
{
    if ($column_name === 'post_views') {
        echo getPostViews(get_the_ID());
    }
}

add_filter('manage_posts_columns', 'subh_posts_column_views');
add_action('manage_posts_custom_column', 'subh_posts_custom_column_views', 5, 2);

function my_awesome_scripts()
{

}

add_action("wp_enqueue_scripts", "my_awesome_scripts");

add_action( 'customize_register', function ( $wp_customize ) {
	$wp_customize->add_panel('lt_panel_footer', array(
		'title' => __( 'Footer', 'lt' ),
		'priority' => 115
	));

	/* * * * * * * * * * * * * *
		Footer
	* * * * * * * * * * * * * */

	$wp_customize->add_section('lt_section_footer', array(
		'title' => __( 'Informações', 'lt' ),
		'panel' => 'lt_panel_footer'
	));

	$wp_customize->add_setting( 'lt_footer_description', array(
		'default' => __( 'Somos un portal de información que valoriza la independencia y la objetividad, sustentado por publicidad. Para mantener la gratuidad de nuestros clientes para los usuarios, algunas recomendaciones presentadas en el sitio no proporcionan a las empresas que recebemos compensaciones como afiliados.Vivamus rutrum orci a felis faucibus, ut varius nisi imperdiet. Quisque nibh libero, blandit sit amet ligula at, vestibulum semper mi. Donec in arcu dui.', 'lt' ),
		'sanitize_callback' => 'wp_kses_post'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'lt_footer_description', array(
		'label' => __( 'Descrição', 'lt' ),
		'section' => 'lt_section_footer',
		'settings' => 'lt_footer_description',
		'type' => 'textarea'
	) ) );

	$wp_customize->add_setting( 'lt_footer_cnpj', array(
		'default' => __( '00.000.000/0000-00', 'lt' ),
		'sanitize_callback' => 'wp_kses_post'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'lt_footer_cnpj', array(
		'label' => __( 'CNPJ', 'lt' ),
		'section' => 'lt_section_footer',
		'settings' => 'lt_footer_cnpj',
		'type' => 'text'
	) ) );

	$wp_customize->add_setting( 'lt_footer_copyright', array(
		'default' => __( '© 2024 - Idecor - Todos los derechos reservados.', 'lt' ),
		'sanitize_callback' => 'wp_kses_post'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'lt_footer_copyright', array(
		'label' => __( 'copyright', 'lt' ),
		'section' => 'lt_section_footer',
		'settings' => 'lt_footer_copyright',
		'type' => 'text'
	) ) );
});

add_action( 'customize_register', function ( $wp_customize ) {
	$wp_customize->add_panel('lt_panel_home', array(
		'title' => __( 'Home', 'lt' ),
		'priority' => 110
	));

	/* * * * * * * * * * * * * *
		FEATURED
	* * * * * * * * * * * * * */

	$wp_customize->add_section('lt_section_featured', array(
		'title' => __( 'Banner principal', 'lt' ),
		'panel' => 'lt_panel_home'
	));

	$wp_customize->add_setting( 'lt_featured_title', array(
		'default' => __( 'Tu guía gefinitiva de las <span>mejores aplicaciones</span> del momento', 'lt' ),
		'sanitize_callback' => 'wp_kses_post'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'lt_featured_title', array(
		'label' => __( 'Título', 'lt' ),
		'section' => 'lt_section_featured',
		'settings' => 'lt_featured_title',
		'type' => 'text'
	) ) );

	$wp_customize->add_setting( 'lt_featured_description', array(
		'default' => __( 'En Amucc, encontrarás las últimas tendencias y novedades sobre las aplicaciones que están transformando el mundo digital. Mantente al día con nuestros análisis y descubre las aplicaciones esenciales que no te puedes perder. ¡Explora ahora y revoluciona tu experiencia digital!', 'lt' ),
		'sanitize_callback' => 'wp_kses_post'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'lt_featured_description', array(
		'label' => __( 'Descrição', 'lt' ),
		'section' => 'lt_section_featured',
		'settings' => 'lt_featured_description',
		'type' => 'textarea'
	) ) );

	$wp_customize->add_setting( 'lt_featured_button', array(
		'deafault' => 'Descubre las mejores apps',
		'sanitize_callback' => 'wp_kses_post'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'lt_featured_button', array(
		'label' => __( 'Botão', 'lt' ),
		'section' => 'lt_section_featured',
		'settings' => 'lt_featured_button',
		'type' => 'text'
	) ) );

	$wp_customize->add_setting( 'lt_featured_url', array(
		'sanitize_callback' => 'esc_url_raw'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'lt_featured_url', array(
		'label' => __( 'Link (URL)', 'lt' ),
		'section' => 'lt_section_featured',
		'settings' => 'lt_featured_url',
		'type' => 'url'
	) ) );

	$wp_customize->add_setting( 'lt_featured_img', array(
		// 'sanitize_callback' => 'absint'
	) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'lt_featured_img', array(
		'label' => __( 'Imagem', 'lt' ),
		'description' => __( 'Imagem', 'lt' ),
		'section' => 'lt_section_featured',
		'settings' => 'lt_featured_img',
		'flex_width'  => true,
		'flex_height' => true,
	) ) );

	$wp_customize->add_setting( 'lt_featured_img_mobile', array(
		// 'sanitize_callback' => 'absint'
	) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'lt_featured_img_mobile', array(
		'label' => __( 'Imagem Mobile', 'lt' ),
		'description' => __( 'Imagem', 'lt' ),
		'section' => 'lt_section_featured',
		'settings' => 'lt_featured_img_mobile',
		'flex_width'  => true,
		'flex_height' => true,
	) ) );

	/* * * * * * * * * * * * * *
		Destaques
	* * * * * * * * * * * * * */

	$wp_customize->add_section('lt_section_destaques', array(
		'title' => __( 'Destaques', 'lt' ),
		'panel' => 'lt_panel_home'
	));

	$wp_customize->add_setting( 'lt_destaques_title', array(
		'default' => __( 'Tabelas do Brasileirão', 'lt' ),
		'sanitize_callback' => 'wp_kses_post'
	) );

	/*
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'lt_leagues_title', array(
		'label' => __( 'Título', 'lt' ),
		'section' => 'lt_section_destaques',
		'settings' => 'lt_destaques_title',
		'type' => 'text'
	) ) );
	*/

	$leagues = range(1,2);

	foreach ( $leagues as $l ) {
		$wp_customize->add_setting( 'lt_destaques_' . $l . '_img', array(
			/*'sanitize_callback' => 'absint'*/
		) );

		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'lt_destaques_' . $l . '_img', array(
			'label' => __( 'Destaque', 'lt' ) . ' ' .  $l,
			'description' => __( 'Imagem', 'lt' ),
			'section' => 'lt_section_destaques',
			'settings' => 'lt_destaques_' . $l . '_img',
			'flex_width'  => true,
			'flex_height' => true,
		) ) );

		$wp_customize->add_setting( 'lt_destaques_' . $l . '_title', array(
			'sanitize_callback' => 'wp_kses_post'
		) );

		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'lt_destaques_' . $l . '_title', array(
			'description' => __( 'Título', 'lt' ),
			'section' => 'lt_section_destaques',
			'settings' => 'lt_destaques_' . $l . '_title',
			'type' => 'text'
		) ) );

		$wp_customize->add_setting( 'lt_destaques_' . $l . '_description', array(
			'sanitize_callback' => 'wp_kses_post'
		) );

		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'lt_destaques_' . $l . '_description', array(
			'description' => __( 'Descrição', 'lt' ),
			'section' => 'lt_section_destaques',
			'settings' => 'lt_destaques_' . $l . '_description',
			'type' => 'textarea'
		) ) );

		$wp_customize->add_setting( 'lt_destaques_' . $l . '_url', array(
			'sanitize_callback' => 'esc_url_raw'
		) );

		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'lt_destaques_' . $l . '_url', array(
			'description' => __( 'Link (URL)', 'lt' ),
			'section' => 'lt_section_destaques',
			'settings' => 'lt_destaques_' . $l . '_url',
			'type' => 'url'
		) ) );

		$wp_customize->add_setting( 'lt_destaques_' . $l . '_btn', array(
			'sanitize_callback' => 'wp_kses_post'
		) );

		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'lt_destaques_' . $l . '_btn', array(
			'description' => __( 'Texto do Botão', 'lt' ),
			'section' => 'lt_section_destaques',
			'settings' => 'lt_destaques_' . $l . '_btn',
			'type' => 'text'
		) ) );
	}

	$wp_customize->add_setting( 'lt_destaques_' . 3 . '_img', array(
		/*'sanitize_callback' => 'absint'*/
	) );

	$l = 3;

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'lt_destaques_' . $l . '_img', array(
		'label' => __( 'Destaque', 'lt' ) . ' ' .  $l,
		'description' => __( 'Imagem', 'lt' ),
		'section' => 'lt_section_destaques',
		'settings' => 'lt_destaques_' . $l . '_img',
		'flex_width'  => true,
		'flex_height' => true,
	) ) );

	$wp_customize->add_setting( 'lt_destaques_' . $l . '_title', array(
		'sanitize_callback' => 'wp_kses_post'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'lt_destaques_' . $l . '_title', array(
		'description' => __( 'Título', 'lt' ),
		'section' => 'lt_section_destaques',
		'settings' => 'lt_destaques_' . $l . '_title',
		'type' => 'text'
	) ) );

	$wp_customize->add_setting( 'lt_destaques_' . $l . '_description', array(
		'sanitize_callback' => 'wp_kses_post'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'lt_destaques_' . $l . '_description', array(
		'description' => __( 'Descrição', 'lt' ),
		'section' => 'lt_section_destaques',
		'settings' => 'lt_destaques_' . $l . '_description',
		'type' => 'textarea'
	) ) );

	$wp_customize->add_setting( 'lt_destaques_' . $l . '_url', array(
		'sanitize_callback' => 'esc_url_raw'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'lt_destaques_' . $l . '_url', array(
		'description' => __( 'Link (URL)', 'lt' ),
		'section' => 'lt_section_destaques',
		'settings' => 'lt_destaques_' . $l . '_url',
		'type' => 'url'
	) ) );

	$wp_customize->add_setting( 'lt_destaques_' . $l . '_btn', array(
		'sanitize_callback' => 'wp_kses_post'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'lt_destaques_' . $l . '_btn', array(
		'description' => __( 'Texto do Botão', 'lt' ),
		'section' => 'lt_section_destaques',
		'settings' => 'lt_destaques_' . $l . '_btn',
		'type' => 'text'
	) ) );

	/* * * * * * * * * * * * * *
		CATEGORIES
	* * * * * * * * * * * * * */

	$wp_customize->add_section('lt_section_', array(
		'title' => __( 'Destaques', 'lt' ),
		'panel' => 'lt_panel_home'
	));

	$wp_customize->add_setting( 'lt_destaques_title', array(
		'default' => __( 'Tabelas do Brasileirão', 'lt' ),
		'sanitize_callback' => 'wp_kses_post'
	) );

	/* * * * * * * * * * * * * *
		FAQ
	* * * * * * * * * * * * * */

	$wp_customize->add_section('lt_section_faq', array(
		'title' => __( 'FAQ', 'lt' ),
		'panel' => 'lt_panel_home'
	));

	$wp_customize->add_setting( 'lt_faq_title', array(
		'default' => __( 'Perguntas frequentes', 'lt' ),
		'sanitize_callback' => 'wp_kses_post'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'lt_faq_title', array(
		'label' => __( 'Título', 'lt' ),
		'section' => 'lt_section_faq',
		'settings' => 'lt_faq_title',
		'type' => 'text'
	) ) );

	$faq = range(1, 4);

	foreach ( $faq as $f ) {
		$wp_customize->add_setting( 'lt_faq_' . $f . '_title', array(
			'sanitize_callback' => 'wp_kses_post'
		) );

		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'lt_faq_' . $f . '_title', array(
			'description' => __( 'Pergunta', 'lt' ),
			'section' => 'lt_section_faq',
			'settings' => 'lt_faq_' . $f . '_title',
			'type' => 'text'
		) ) );

		$wp_customize->add_setting( 'lt_faq_' . $f . '_description', array(
			'sanitize_callback' => 'wp_kses_post'
		) );

		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'lt_faq_' . $f . '_description', array(
			'description' => __( 'Resposta', 'lt' ),
			'section' => 'lt_section_faq',
			'settings' => 'lt_faq_' . $f . '_description',
			'type' => 'textarea'
		) ) );
	}

	/* * * * * * * * * * * * * *
		Categorias
	* * * * * * * * * * * * * */

	$wp_customize->add_section('lt_section_categorias', array(
		'title' => __( 'Categorias', 'lt' ),
		'panel' => 'lt_panel_home'
	));

	$categories = range(1,4);

	$rjs_categories_full_list = get_categories(array( 'orderby' => 'name', ));

	foreach ( $categories as $category )
	{
		$wp_customize->add_setting( 'lt_categorias_' . $category . '_title', array(
			'sanitize_callback' => 'wp_kses_post'
		) );

    	//Create an empty array
		$rjs_choices_list = [];

		//Loop through the array and add the correct values every time
		foreach( $rjs_categories_full_list as $rjs_single_cat ) {
		    $rjs_choices_list[$rjs_single_cat->slug] = esc_html__( $rjs_single_cat->name, 'text-domain' );
		}

		//Register the setting
		$wp_customize->add_setting( 'rjs_category_dropdown_' . $category, array(
			'type'       => 'theme_mod',
			'capability' => 'edit_theme_options',
			'default' => 'uncategorized',
		) );

		//Register the control
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'lt_categorias_' . $category . '_category', array(
		    'type' => 'select',
		    'section' => 'lt_section_categorias',
		    'label' => __( 'Categoria', 'lt' ) . ' ' .  $category,
		    'settings' => 'rjs_category_dropdown_' . $category,
		    'choices' => $rjs_choices_list, //Add the list with options
		) ) );
	}
} );

/* * * * * * * * * * * * * *
	FUNCTIONS
* * * * * * * * * * * * * */

// Images

function lt_team_img( $id ) {

	$img = '';
	$img_id = '';

	if ( $id ) $img_id = absint( get_theme_mod( 'lt_team_image' . $id ) );

	if ( $img_id ) {
		$img_url = wp_get_attachment_url( $img_id );
		$team_name = get_term( $id )->name;

		$img = '<img class="thumb thumb--team lazyload" src="' . $img_url . '" alt="' . $team_name . '" width="60" height="60">';
	}

	return $img;

}

add_action( 'customize_register', function ( $wp_customize )
{
    $wp_customize->add_setting("primary_color", array(
        'default'           => "#1571e0",
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, "primary_color", array(
        'label'    => "Cor primaria",
        'section'  => 'colors',
        'settings' => "primary_color",
    )));

    $wp_customize->add_setting("secondary_color", array(
        'default'           => "#3b82f6",
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, "secondary_color", array(
        'label'    => "Cor secundária",
        'section'  => 'colors',
        'settings' => "secondary_color",
    )));
});

/*Site optimizations*/
function remove_unnecessary_assets() {
    if (is_front_page()) { // only remove on the home page

        // remove CSS
        wp_dequeue_style('style-handler');

        // remove JS
        wp_dequeue_script('script-handler');

    }
};
add_action( 'wp_enqueue_scripts', 'remove_unnecessary_assets', 999 );

function dequeue_elementor_global__css() {
  wp_dequeue_style('elementor-global');
  wp_deregister_style('elementor-global');
}
add_action('wp_print_styles', 'dequeue_elementor_global__css', 9999);

function wpdocs_theme_name_wp_title( $title, $sep ) {
    if ( is_feed() ) {
        return $title;
    }

    if (  is_home() || is_front_page() )  {
        return $title;
    }

    global $page, $paged;

    // Add the blog name
    $title = "";

    // Add a page number if necessary:
    if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) {
        $title .= " $sep " . sprintf( __( ' Page %s', '_s' ), max( $paged, $page ) );
    }

    return $title;
}
add_filter( 'wp_title', 'wpdocs_theme_name_wp_title', 10, 2 );

function get_first_paragraph(){
    global $post;
    $str = wpautop( get_the_content() );
    $str = substr( $str, 0, strpos( $str, '</p>' ) + 4 );
    $str = strip_tags($str, '<a><strong><em>');
    return $str;
}

function custom_paginate_links( $args = '' )
{
	global $wp_query, $wp_rewrite;

	// Setting up default values based on the current URL.
	$pagenum_link = html_entity_decode( get_pagenum_link() );
	$url_parts    = explode( '?', $pagenum_link );

	// Get max pages and current page out of the current query, if available.
	$total   = isset( $wp_query->max_num_pages ) ? $wp_query->max_num_pages : 1;
	$current = get_query_var( 'paged' ) ? (int) get_query_var( 'paged' ) : 1;

	// Append the format placeholder to the base URL.
	$pagenum_link = trailingslashit( $url_parts[0] ) . '%_%';

	// URL base depends on permalink settings.
	$format  = $wp_rewrite->using_index_permalinks() && ! strpos( $pagenum_link, 'index.php' ) ? 'index.php/' : '';
	$format .= $wp_rewrite->using_permalinks() ? user_trailingslashit( $wp_rewrite->pagination_base . '/%#%', 'paged' ) : '?paged=%#%';

	$max_size = 4;

	if(wp_is_mobile()) $max_size = 1;

	$defaults = array(
		'base'               => $pagenum_link, // http://example.com/all_posts.php%_% : %_% is replaced by format (below).
		'format'             => $format, // ?page=%#% : %#% is replaced by the page number.
		'total'              => $total,
		'current'            => $current,
		'aria_current'       => 'page',
		'show_all'           => false,
		'prev_next'          => true,
		'prev_text'          => __( 'Anterior' ),
		'next_text'          => __( 'Próximo' ),
		'end_size'           => 1,
		'mid_size'           => $max_size,
		'type'               => 'plain',
		'add_args'           => array(), // Array of query args to add.
		'add_fragment'       => '',
		'before_page_number' => '',
		'after_page_number'  => '',
	);

	$args = wp_parse_args( $args, $defaults );

	if ( ! is_array( $args['add_args'] ) ) {
		$args['add_args'] = array();
	}

	// Merge additional query vars found in the original URL into 'add_args' array.
	if ( isset( $url_parts[1] ) ) {
		// Find the format argument.
		$format       = explode( '?', str_replace( '%_%', $args['format'], $args['base'] ) );
		$format_query = isset( $format[1] ) ? $format[1] : '';
		wp_parse_str( $format_query, $format_args );

		// Find the query args of the requested URL.
		wp_parse_str( $url_parts[1], $url_query_args );

		// Remove the format argument from the array of query arguments, to avoid overwriting custom format.
		foreach ( $format_args as $format_arg => $format_arg_value ) {
			unset( $url_query_args[ $format_arg ] );
		}

		$args['add_args'] = array_merge( $args['add_args'], urlencode_deep( $url_query_args ) );
	}

	// Who knows what else people pass in $args.
	$total = (int) $args['total'];
	if ( $total < 2 ) {
		return;
	}
	$current  = (int) $args['current'];
	$end_size = (int) $args['end_size']; // Out of bounds? Make it the default.
	if ( $end_size < 1 ) {
		$end_size = 1;
	}
	$mid_size = (int) $args['mid_size'];
	if ( $mid_size < 0 ) {
		$mid_size = 2;
	}

	$add_args   = $args['add_args'];
	$r          = '<div class="flex justify-between py-4 my-8 items-center">';
	$page_links = array();
	$dots       = false;

	if ( $args['prev_next'] && $current && 1 < $current ) :
		$link = str_replace( '%_%', 2 == $current ? '' : $args['format'], $args['base'] );
		$link = str_replace( '%#%', $current - 1, $link );
		if ( $add_args ) {
			$link = add_query_arg( $add_args, $link );
		}
		$link .= $args['add_fragment'];

		$r .= sprintf(
			'<a href="%s" class="h-6 justify-center items-center gap-2 inline-flex">
				<div class="w-5 h-5 relative">
			  	<svg width="21" height="20" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg">
				  <path d="M16.3333 9.99999H4.66663M4.66663 9.99999L10.5 15.8333M4.66663 9.99999L10.5 4.16666" stroke="#1F1F1F" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/>
				</svg>
			  </div>
			  <div class="text-[#1e1e1e] text-base font-medium leading-normal hidden md:block">%s</div>
			</a>',
			/**
			 * Filters the paginated links for the given archive pages.
			 *
			 * @since 3.0.0
			 *
			 * @param string $link The paginated link URL.
			 */
			esc_url( apply_filters( 'paginate_links', $link ) ),
			$args['prev_text']
		);
	else:
		$r .= '<a href="#" class="h-6 cursor-not-allowed justify-center items-center content-center gap-2 inline-flex">
		</a>';
	endif;

	for ( $n = 1; $n <= $total; $n++ ) :
		if ( $n == $current ) :
			$page_links[] = sprintf(
				'<span aria-current="%s" class="w-10 h-10 bg-[var(--primary-color)] rounded-lg justify-center items-center inline-flex">
				  <div class="w-10 self-stretch p-3 rounded-lg justify-center items-center inline-flex">
				    <div class="text-center text-white text-sm font-medium leading-[21px]">%s</div>
				  </div>
				</span>',
				esc_attr( $args['aria_current'] ),
				$args['before_page_number'] . number_format_i18n( $n ) . $args['after_page_number']
			);

			$dots = true;
		else :
			if ( $args['show_all'] || ( $n <= $end_size || ( $current && $n >= $current - $mid_size && $n <= $current + $mid_size ) || $n > $total - $end_size ) ) :
				$link = str_replace( '%_%', 1 == $n ? '' : $args['format'], $args['base'] );
				$link = str_replace( '%#%', $n, $link );
				if ( $add_args ) {
					$link = add_query_arg( $add_args, $link );
				}
				$link .= $args['add_fragment'];

				$page_links[] = sprintf(
					'<a href="%s" class="w-10 h-10 bg-white rounded-lg justify-center items-center inline-flex">
					  <div class="w-10 self-stretch p-3 rounded-lg justify-center items-center inline-flex">
					    <div class="text-center text-black text-sm font-medium leading-[21px]">%s</div>
					  </div>
					</a>',
					/** This filter is documented in wp-includes/general-template.php */
					esc_url( apply_filters( 'paginate_links', $link ) ),
					$args['before_page_number'] . number_format_i18n( $n ) . $args['after_page_number']
				);

				$dots = true;
			elseif ( $dots && ! $args['show_all'] ) :
				$page_links[] = '<span class="realative bottom-0">' . __( '&hellip;' ) . '</span>';

				$dots = false;
			endif;
		endif;
	endfor;

	switch ( $args['type'] ) {
		case 'array':
			return $page_links;

		case 'list':
			$r .= "<ul class='page-numbers'>\n\t<li>";
			$r .= implode( "</li>\n\t<li>", $page_links );
			$r .= "</li>\n</ul>\n";
			break;

		default:
			$r .= "<div class='flex gap-1'>\n\t<div>";
			$r .= implode( "</div>\n\t<div>", $page_links );;
			$r .= "</div>\n</div>\n";
			break;
	}

	if ( $args['prev_next'] && $current && $current < $total ) :
		$link = str_replace( '%_%', $args['format'], $args['base'] );
		$link = str_replace( '%#%', $current + 1, $link );
		if ( $add_args ) {
			$link = add_query_arg( $add_args, $link );
		}
		$link .= $args['add_fragment'];

		$r .= sprintf(
			'<a href="%s" class="h-6 justify-center items-center gap-2 inline-flex">
			  <div class="text-[#1e1e1e] text-base font-medium leading-normal hidden md:block">%s</div>
			  <div class="w-5 h-5 relative">
			  	<svg width="21" height="20" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg">
				  <path d="M4.66663 9.99999H16.3333M16.3333 9.99999L10.5 4.16666M16.3333 9.99999L10.5 15.8333" stroke="#1F1F1F" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/>
				</svg>
			  </div>
			</a>',
			/** This filter is documented in wp-includes/general-template.php */
			esc_url( apply_filters( 'paginate_links', $link ) ),
			$args['next_text']
		);
	else:
	$r .= '<a href="#" class="h-6 cursor-not-allowed justify-center items-center gap-2 inline-flex">
	</a>';
	endif;

	$r .= '</div>';

	/**
	 * Filters the HTML output of paginated links for archives.
	 *
	 * @since 5.7.0
	 *
	 * @param string $r    HTML output.
	 * @param array  $args An array of arguments. See paginate_links()
	 *                     for information on accepted arguments.
	 */
	$r = apply_filters( 'paginate_links_output', $r, $args );

	return $r;
}

add_action("widgets_init", "twg_sidebar");

function twg_sidebar()
{
	register_sidebar(
	array(
		"name" => "Blog Sidebar",
		"id" => "sidebar-blog",
		"description" => "This is the Blog Sidebar.",
		"before_widget" => '<div class="widget-wrapper flex flex-col">',
		"after_widget" => "</div>"
	));
}

add_filter( 'the_content', 'add_ids_to_header_tags' );
function add_ids_to_header_tags( $content ) {

    $pattern = '#(?P<full_tag><(?P<tag_name>h\d)(?P<tag_extra>[^>]*)>(?P<tag_contents>[^<]*)</h\d>)#i';
    if ( preg_match_all( $pattern, $content, $matches, PREG_SET_ORDER ) ) {
        $find = array();
        $replace = array();
        foreach( $matches as $match ) {
            if ( strlen( $match['tag_extra'] ) && false !== stripos( $match['tag_extra'], 'id=' ) ) {
                continue;
            }
            $find[]    = $match['full_tag'];
            $id        = sanitize_title( $match['tag_contents'] );
            $id_attr   = sprintf( ' id="%s"', $id );
            $replace[] = sprintf( '<%1$s%2$s%3$s>%4$s</%1$s>', $match['tag_name'], $match['tag_extra'], $id_attr, $match['tag_contents']);
        }
        $content = str_replace( $find, $replace, $content );
    }
    return $content;
}

function hstngr_register_widget()
{
	register_widget( 'summary' );
}

add_action( 'widgets_init', 'hstngr_register_widget' );
class summary extends WP_Widget
{
	function __construct()
	{
		parent::__construct(
		// widget ID
		'summary',
		// widget name
		__('Sumário do post', ' summary_domain'),
		// widget description
		array( 'description' => __( 'Indexa todos os títulos do post', 'summary_domain' ), )
		);
	}
	public function widget( $args, $instance )
	{
		$title = apply_filters( 'widget_title', $instance['title'] );
		echo $args['before_widget'];
		//if title is present
		if ( ! empty( $title ) )
		echo $args['before_title'] . $args['after_title'];
		//output
		global $post;
        $post_id = $post->ID;
        $content = get_post_field('post_content', $post_id);

		preg_match_all( '@<h2.*?>(.*?)<\/h2>@', $content, $matches );
		$tags = $matches[1];

		foreach ($tags as $tag)
		{
			$sanitanized_tag = sanitize_title($tag);
			$html = <<<HTML
			<a href="#$sanitanized_tag" class="border-b border-[#F1F3F9] py-4 m-2">$tag</a>
			HTML;

			echo $html;
		}

		echo $args['after_widget'];
	}
	public function form( $instance )
	{
		if ( isset( $instance[ 'title' ] ) )
		$title = $instance[ 'title' ];
		else
		$title = __( 'Default Title', 'summary_domain' );
		?>
		<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		<?php
	}
	public function update( $new_instance, $old_instance )
	{
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		return $instance;
	}
}