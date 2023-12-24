<?php 

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// Custom Post Type Portfolio Initialize Class
class CustomPostTypePortfolio {

    private static $instance = null;

	public static function instance() {
        if ( is_null( self::$instance ) ) self::$instance = new self();
        
		return self::$instance;
	}

    public function __construct() {

        add_action( 'init', array( $this, 'register_custom_post_type' ) );

        add_action( 'init', array( $this, 'create_custom_taxonomies' ), 0 );

        add_action( 'add_meta_boxes', array( $this, 'add_portfolio_media_meta_box' ) );

        add_action( 'save_post', array( $this, 'save_portfolio_media_meta_box' ) );

        add_action( 'admin_enqueue_scripts', array( $this, 'enqueue' ) );
    
    }

    /**
     * Register a custom post type called "portfolio".
     */
    public function register_custom_post_type() {
        $text_domain =  wp_get_theme()->get( 'TextDomain' ); // Get text domain for translations
     
        $labels = array(
            'name'                  => _x( 'Portfolio', 'Post type general name', $text_domain ),
            'singular_name'         => _x( 'Portfolio', 'Post type singular name', $text_domain ),
            'menu_name'             => _x( 'Portfolio', 'Admin Menu text', $text_domain ),
            'name_admin_bar'        => _x( 'Portfolio', 'Add New on Toolbar', $text_domain ),
            'add_new'               => __( 'Add New Portfolio', $text_domain ),
            'add_new_item'          => __( 'Add New Portfolio', $text_domain ),
            'new_item'              => __( 'New Portfolio', $text_domain ),
            'edit_item'             => __( 'Edit Portfolio', $text_domain ),
            'view_item'             => __( 'View Portfolio', $text_domain ),
            'all_items'             => __( 'All Portfolio', $text_domain ),
            'search_items'          => __( 'Search Portfolio', $text_domain ),
            'parent_item_colon'     => __( 'Parent Portfolio:', $text_domain ),
            'not_found'             => __( 'No portfolio found.', $text_domain ),
            'not_found_in_trash'    => __( 'No portfolio found in Trash.', $text_domain ),
            'featured_image'        => _x( 'Portfolio Featured Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', $text_domain ),
            'set_featured_image'    => _x( 'Set featured image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', $text_domain ),
            'remove_featured_image' => _x( 'Remove featured image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', $text_domain ),
            'use_featured_image'    => _x( 'Use as featured image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', $text_domain ),
            'archives'              => _x( 'Portfolio', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', $text_domain ),
            'insert_into_item'      => _x( 'Insert into portfolio', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', $text_domain ),
            'uploaded_to_this_item' => _x( 'Uploaded to this portfolio', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', $text_domain ),
            'filter_items_list'     => _x( 'Filter portfolio list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', $text_domain ),
            'items_list_navigation' => _x( 'Portfolio list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', $text_domain ),
            'items_list'            => _x( 'Portfolio list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', $text_domain ),
        );
     
        $args = array(
           'label'                 => __( 'portfolio', $text_domain ),
           'description'           => __( 'portfolio for your site', $text_domain ),
           'labels'                => $labels,
           'supports'              => array( 'title', 'thumbnail' ),
           // 'taxonomies'            => array( 'category', 'post_tag' ),
           'hierarchical'          => false,
           'public'                => true,
           'show_ui'               => true,
           'show_in_menu'          => true,
           'menu_position'         => 5,
           'menu_icon'             => 'dashicons-portfolio',
           'show_in_admin_bar'     => true,
           'show_in_nav_menus'     => true,
           'can_export'            => true,
           'has_archive'           => true,
           'exclude_from_search'   => false,
           'publicly_queryable'    => true,
            'rewrite'            => array( 'slug' => 'portfolio' ),
           'capability_type'       => 'post',
        );
     
        register_post_type( 'portfolio', $args );
    }


    /**
     * Register a Custom Taxonomy
     */
    public function create_custom_taxonomies() {
        $text_domain =  wp_get_theme()->get( 'TextDomain' ); // Get text domain for translations
    
        // Custom Taxonomy: Portfolio Category
        $labels = array(
            'name' => _x('Portfolio Categories', $text_domain),
            'singular_name' => _x('Portfolio Category', $text_domain),
            'search_items' => __('Search Portfolio Categories', $text_domain),
            'all_items' => __('All Portfolio Categories', $text_domain),
            'parent_item' => __('Parent Portfolio Category', $text_domain),
            'parent_item_colon' => __('Parent Portfolio Category:', $text_domain),
            'edit_item' => __('Edit Portfolio Category', $text_domain),
            'update_item' => __('Update Portfolio Category', $text_domain),
            'add_new_item' => __('Add New Portfolio Category', $text_domain),
            'new_item_name' => __('New Portfolio Category Name', $text_domain),
            'menu_name' => __('Portfolio Categories', $text_domain),
        );
    
        $args = array(
            'labels' => $labels,
            'hierarchical' => true,
            'show_ui' => true,
            'show_admin_column' => true,
            'query_var' => true,
            'rewrite' => array('slug' => 'portfolio-category'),
        );
    
        register_taxonomy('portfolio_category', array('portfolio'), $args);
    
        // Custom Taxonomy: Portfolio Tag
        $labels = array(
            'name' => _x('Portfolio Tags', $text_domain),
            'singular_name' => _x('Portfolio Tag', $text_domain),
            'search_items' => __('Search Portfolio Tags', $text_domain),
            'all_items' => __('All Portfolio Tags', $text_domain),
            'edit_item' => __('Edit Portfolio Tag', $text_domain),
            'update_item' => __('Update Portfolio Tag', $text_domain),
            'add_new_item' => __('Add New Portfolio Tag', $text_domain),
            'new_item_name' => __('New Portfolio Tag Name', $text_domain),
            'menu_name' => __('Portfolio Tags', $text_domain),
        );
    
        $args = array(
            'labels' => $labels,
            'hierarchical' => false,
            'show_ui' => true,
            'show_admin_column' => true,
            'query_var' => true,
            'rewrite' => array('slug' => 'portfolio-tag'),
        );
    
        register_taxonomy('portfolio_tag', array('portfolio'), $args);
    }


    /**
     * Add custom meta box for Portfolio Media
     */
    public function add_portfolio_media_meta_box() {
        add_meta_box(
            'portfolio_media_meta_box', // ID
            'Portfolio', // Title
            array($this, 'render_portfolio_media_meta_box'), // Callback
            'portfolio', // Post type
            'normal', // Screen ('normal', 'advanced', 'side')
            'high' // Context ('high', 'core', 'default', 'low')
        );
    }

    
    /**
     * Render Portfolio Media Meta Box Controls Output in the Editor
     */
    public function render_portfolio_media_meta_box($post) {
        
        wp_nonce_field('portfolio_media_meta_box', 'portfolio_media_meta_box_nonce');

        // Retrieve the current value of the media meta box
        $media_data = get_post_meta( $post->ID, '_media_data', true );
        $media_data = json_decode( $media_data, true );
        
        ?>
        <!-- Output HTML for the media meta box -->
        <div id="media-upload-container">
            <div id="media-upload-controller">
                <!-- <h4>Portfolio Upload:</h4> -->
                <input type="hidden" id="media_data" name="media_data" value="<?php echo esc_attr(json_encode($media_data)); ?>">
                <button class="button button-primary" id="add_media_button">Add Portfolio</button>
            </div>
            <div id="media-upload-preview-container">
                <?php
                // Display selected media
                if ($media_data) {
                    foreach ($media_data as $media_item) {
                        echo '<div class="media-upload-preview">';
                        if ( $media_item['type'] === 'image' ) { ?>
                            <div class="thumbnail">
                                <img src="<?php echo esc_url( $media_item['url'] ); ?>" alt="Image">
                            </div>
                            <a class="remove" href="#">Remove</a>
                        <?php
                        } elseif ( $media_item['type'] === 'audio' ) { ?>
                            <audio controls>
                                <source src="<?php echo esc_url( $media_item['url'] ); ?>" type="audio/mp3">
                            </audio>
                            <a class="remove" href="#">Remove</a>
                        <?php
                        } elseif ( $media_item['type'] === 'video' ) { ?>
                            <video controls>
                                <source src="<?php echo esc_url( $media_item['url'] ); ?>" type="video/mp4">
                            </video>
                            <a class="remove" href="#">Remove</a>
                        <?php
                        }
                        echo '</div>';
                    }
                }
                ?>
            </div>
        </div>
    <?php
    }


    /**
     * Save the data from the Portfolio Media Meta Box when the post is saved
     */
    public function save_portfolio_media_meta_box($post_id) {
        // Save data when the post is saved
        if ( defined('DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;

        // Nonce is either not set or not valid
        if ( !isset( $_POST['portfolio_media_meta_box_nonce'] ) || !wp_verify_nonce( $_POST['portfolio_media_meta_box_nonce'], 'portfolio_media_meta_box') ) return;

        
        // Save the media_data value
        if ( isset( $_POST['media_data'] ) ) {
            update_post_meta( $post_id, '_media_data', sanitize_text_field( $_POST['media_data'] ) );
        }
    }

    
    /**
     * Enqueue Custom styles and Scripts
     */
    public function enqueue() {
        // Enqueue your styles
        wp_enqueue_style( 'custom-post-type-portfolio-style', PORTFOLIO_DIR_URI . '/portfolio/assets/css/portfolio.css', array(), '1.0.0', 'all' );

        // Enqueue your scripts
        wp_enqueue_script( 'custom-post-type-portfolio-script', PORTFOLIO_DIR_URI . '/portfolio/assets/js/portfolio.js', array(), '1.0.0', true );
    }

}
CustomPostTypePortfolio::instance();
