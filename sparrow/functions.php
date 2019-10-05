<?php

    add_action('wp_enqueue_scripts', 'my_script_and_style');
    add_action('after_setup_theme', 'register_menu');
    add_action('widgets_init', 'add_my_sidebars');

    add_filter( 'excerpt_more', 'new_excerpt_more' );
    // удаляет H2 из шаблона пагинации
    add_filter('navigation_markup_template', 'my_navigation_template', 10, 2 );
    add_filter('document_title_separator','my_sep');

    add_action('init', 'my_custom_init');
    add_action( 'init', 'create_taxonomy' );

    add_action('wp_ajax_send_mail',        'send_mail');
    add_action('wp_ajax_nopriv_send_mail', 'send_mail');

    add_action( 'wp_head', 'wp_site_icon', 99 );

    function my_script_and_style(){
        wp_enqueue_style('style', get_stylesheet_uri());
        wp_enqueue_style('fontawesome', get_template_directory_uri().'/assets/css/font-awesome/css/font-awesome.min.css',false, time());
        wp_enqueue_style('default', get_template_directory_uri().'/assets/css/default.css',false, time());
        wp_enqueue_style('fonts', get_template_directory_uri().'/assets/css/fonts.css',['fontawesome'], time());
        wp_enqueue_style('layout', get_template_directory_uri().'/assets/css/layout.css',false, time());
        wp_enqueue_style('media-queries', get_template_directory_uri().'/assets/css/media-queries.css',false, time());

        wp_enqueue_script('modernizr', get_template_directory_uri().'/assets/js/modernizr.js', 'jquery' , '1',false);
        wp_deregister_script( 'jquery-core' );
        wp_register_script( 'jquery-core', '//ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js');
	    wp_enqueue_script( 'jquery' );
        wp_enqueue_script('jquery-migrate', get_template_directory_uri().'/assets/js/jquery-migrate-1.2.1.min.js','jquery' , '1',true);
        wp_enqueue_script('jquery.flexslider', get_template_directory_uri().'/assets/js/jquery.flexslider.js', 'jquery', '1',true);
        wp_enqueue_script('doubletaptogo', get_template_directory_uri().'/assets/js/doubletaptogo.js','jquery', '1',true);
        wp_enqueue_script('init', get_template_directory_uri().'/assets/js/init.js', 'jquery', '1',true);
        wp_enqueue_script('form', get_template_directory_uri().'/assets/js/form.js', 'jquery', time(),true);
    };

    function register_menu(){
        register_nav_menu('main_menu','Главное меню');
        register_nav_menu('footer_menu', 'Подвальное меню 1');
        register_nav_menu('social', 'Социальные сети');
        add_theme_support( 'title-tag' );
        add_theme_support( 'post-thumbnails', array( 'post','portfolio','slider' ) );   
        add_theme_support( 'post-formats', array( 'aside', 'video' ) );   
    };

    function add_my_sidebars(){
        register_sidebar( array(
            'name'          => 'Правый сайдбар',
            'id'            => "right_sidebar",
            'description'   => '',
            'before_widget' => '<div id="%1$s" class="widget link-list %2$s">',
            'after_widget'  => "</div>\n",
            'before_title'  => '<h5 class="widget-title">',
            'after_title'   => "</h5>\n",
        ) );
        register_sidebar( array(
            'name'          => 'Главный сайдбар',
            'id'            => "top_sidebar",
            'description'   => '',
            'before_widget' => '<div id="%1$s" class="columns %2$s">',
            'after_widget'  => "</div>\n",
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => "</h2>\n",
        ) );
    }

    function new_excerpt_more( $more ){
        global $post;
        return '<a href="'. get_permalink($post) . '">  читать дальше <i class="fa fa-arrow-circle-o-right"></i></a>';
    };

    function my_navigation_template( $template, $class ){
      
        return '
        <nav class="col full pagination navigation %1$s" role="navigation">
            <ul class="nav-links">%3$s</ul>
        </nav>    
        ';
    };

    function my_sep(){
        return ' | ';
    };

    function my_custom_init(){
        register_post_type('portfolio', array(
            'labels'             => array(
                'name'               => 'Портфолио', // Основное название типа записи
                'singular_name'      => 'Работа портфолио', // отдельное название записи типа Book
                'add_new'            => 'Добавить новую',
                'add_new_item'       => 'Добавить новую работу',
                'edit_item'          => 'Редактировать работу',
                'new_item'           => 'Новая работа',
                'view_item'          => 'Посмотреть работу',
                'search_items'       => 'Найти работу',
                'not_found'          =>  'Работ не найдено',
                'not_found_in_trash' => 'В корзине работ не найдено',
                'parent_item_colon'  => '',
                'menu_name'          => 'Портфолио',
            ),
            'menu_icon'          => 'dashicons-images-alt',
            'public'             => true,
            'publicly_queryable' => true,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'query_var'          => true,
            'rewrite'            => true,
            'capability_type'    => 'post',
            'has_archive'        => true,
            'hierarchical'       => false,
            'menu_position'      => 4,
            'supports'           => array('title','author','thumbnail','excerpt'),
            'taxonomies'         => array('skills'),
        ) );

        register_post_type('slider', array(
            'labels'             => array(
                'name'               => 'Слайдер', // Основное название типа записи
                'singular_name'      => 'Слайд', // отдельное название записи типа Book
                'add_new'            => 'Добавить новый',
                'add_new_item'       => 'Добавить новый слайд',
                'edit_item'          => 'Редактировать слайд',
                'new_item'           => 'Новый слайд',
                'view_item'          => 'Посмотреть слайд',
                'search_items'       => 'Найти слайд',
                'not_found'          =>  'Слайдов не найдено',
                'not_found_in_trash' => 'В слайдов не найдено',
                'parent_item_colon'  => '',
                'menu_name'          => 'Слайдер',
            ),
            'menu_icon'          => 'dashicons-images-alt2',
            'public'             => true,
            'publicly_queryable' => true,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'query_var'          => true,
            'rewrite'            => true,
            'capability_type'    => 'post',
            'has_archive'        => true,
            'hierarchical'       => false,
            'menu_position'      => 4,
            'supports'           => array('title','excerpt','thumbnail'),
        ) );
    };

    function create_taxonomy(){

        // список параметров: wp-kama.ru/function/get_taxonomy_labels
        register_taxonomy( 'skills', [ 'portfolio' ], [ 
            'label'                 => '', // определяется параметром $labels->name
            'labels'                => [
                'name'              => 'Навыки',
                'singular_name'     => 'Навык',
                'search_items'      => 'Найти навык',
                'all_items'         => 'Все навыки',
                'view_item '        => 'Открыть навык',
                'parent_item'       => 'Родительский навык',
                'parent_item_colon' => 'Родительский навык:',
                'edit_item'         => 'Изменить навык',
                'update_item'       => 'Обновить навык',
                'add_new_item'      => 'Добавить новый навык',
                'new_item_name'     => 'Имя нового навыка',
                'menu_name'         => 'Навыки',
            ],
            'description'           => 'Навыки, которве использовались для создания проекта', // описание таксономии
            'public'                => true,
            // 'publicly_queryable'    => null, // равен аргументу public
            // 'show_in_nav_menus'     => true, // равен аргументу public
            // 'show_ui'               => true, // равен аргументу public
            // 'show_in_menu'          => true, // равен аргументу show_ui
            // 'show_tagcloud'         => true, // равен аргументу show_ui
            // 'show_in_quick_edit'    => null, // равен аргументу show_ui
            'hierarchical'          => false,

            'rewrite'               => true,
            //'query_var'             => $taxonomy, // название параметра запроса
            'capabilities'          => array(),
            'meta_box_cb'           => null, // html метабокса. callback: `post_categories_meta_box` или `post_tags_meta_box`. false — метабокс отключен.
            'show_admin_column'     => false, // авто-создание колонки таксы в таблице ассоциированного типа записи. (с версии 3.5)
            'show_in_rest'          => null, // добавить в REST API
            'rest_base'             => null, // $taxonomy
            // '_builtin'              => false,
            //'update_count_callback' => '_update_post_term_count',
        ] );
    };

    

    function send_mail(){
        $contactName = $_POST['contactName'];
        $contactEmail = $_POST['contactEmail'];
        $contactSubject = $_POST['contactSubject'];
        $contactMessage = $_POST['contactMessage'];

        // подразумевается что $to, $subject, $message уже определены...
        $to = get_option('admin_email');
        // удалим фильтры, которые могут изменять заголовок $headers
        remove_all_filters( 'wp_mail_from' );
        remove_all_filters( 'wp_mail_from_name' );

        $headers = array(
            'From: Me Myself <'. $contactEmail.'>',
            'content-type: text',
            'Cc: '.$contactName .' <jqc@wordpress.org>',
            'Cc: iluvwp@wordpress.org', // тут можно использовать только простой email адрес
        );

        wp_mail( $to, $contactSubject, $contactMessage, $headers );
        wp_die();

    };
?>