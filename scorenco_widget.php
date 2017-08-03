<?php
/*
Plugin Name: Score n'co Widget
Plugin URI: https://scorenco.com
Description: Installez directement sur votre site Wordpress un widget créé sur Score n'co.
Author: Score n'co
Version: 1.2
Author URI: https://scorenco.com
*/
// Block direct requests

if ( !defined('ABSPATH') )
    die('-1');

function init_scorenco_widget() {
    register_widget( 'Scorenco_Widget' );
}

add_action('widgets_init', 'init_scorenco_widget');

/**
 * Adds Scorenco_Widget widget.
 */
class Scorenco_Widget extends WP_Widget {

    protected $scripts = array();
    /**
     * Register widget with WordPress.
     */
    function __construct() {
        parent::__construct(
            'Scorenco_Widget', // Base ID
            __('Widget Score n\'co', 'text_domain'), // Name
            array( 'description' => __( 'Un widget automatique Score n\'co', 'text_domain' ), ) // Args
        );

        wp_enqueue_script( 'iframeResizer', plugins_url( 'scripts/iframeResizer.min.js', __FILE__ ), array(), null, true );
        wp_enqueue_script( 'resize', plugins_url( 'scripts/resize.js', __FILE__ ), array(), null, true );

        $this->scripts['iframeResizer'] = false;
        $this->scripts['resize'] = false;

        add_action( 'wp_print_footer_scripts', array( &$this, 'remove_scripts' ) );

        //add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_resizer' ) );
    }
    /**
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()
     *
     * @param array $args     Widget arguments.
     * @param array $instance Saved values from database.
     */
    public function widget( $args, $instance ) {

        if ( isset( $instance[ 'title' ] ) ) {
            $title = $instance[ 'title' ];
        }
        else {
            $title = __( '', 'text_domain' );
        }
        if ( isset( $instance[ 'height' ] ) && !empty( $instance[ 'height' ] ) ) {
            $height = 'height="'.$instance[ 'height' ].'" ';
            $option = __( '', 'text_domain' );
            $scrolling = __( '', 'text_domain' );
        }
        else {
            $height = __( '', 'text_domain' );
            $option = __( '?auto_height=true', 'text_domain' );
            $scrolling = __( 'scrolling="no"', 'text_domain' );
            $this->scripts['iframeResizer'] = true;
            $this->scripts['resize'] = true;
        }
        
        ?>
        <iframe
            id="<?php echo $title; ?>"
            <?php echo $height; ?>
            <?php echo $scrolling; ?>
            src="https://scorenco.com/widget/<?php echo $title; ?>/<?php echo $option; ?>"
            style="display: block; width: 100%; overflow: auto; margin: auto; border-width: 0px;">
        </iframe>

        <?php
    }
    /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     *
     * @param array $instance Previously saved values from database.
     */
    public function form( $instance ) {
        if ( isset( $instance[ 'title' ] ) ) {
            $title = $instance[ 'title' ];
        }
        else {
            $title = __( '', 'text_domain' );
        }
        if ( isset( $instance[ 'height' ] ) ) {
            $height = $instance[ 'height' ];
        }
        else {
            $height = __( '400', 'text_domain' );
        }
        ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Identifiant du widget :' ); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'height' ); ?>"><?php _e( 'Hauteur du widget :' ); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id( 'height' ); ?>" name="<?php echo $this->get_field_name( 'height' ); ?>" type="number" value="<?php echo esc_attr( $height ); ?>">
        </p>
        <p>
            <a href="https://scorenco.com/admin/widgets/?wordpress=1" target="_blank">
                Espace d'administration
            </a>
        </p>
        <?php 
    }

    public function remove_scripts() {
        foreach ( $this->scripts as $script => $keep ) {
            if ( ! $keep ) {
                // It seems dequeue is not "powerful" enough, you really need to deregister it
                wp_deregister_script( $script );
            }
        }
    }

    /**
     * Sanitize widget form values as they are saved.
     *
     * @see WP_Widget::update()
     *
     * @param array $new_instance Values just sent to be saved.
     * @param array $old_instance Previously saved values from database.
     *
     * @return array Updated safe values to be saved.
     */
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        $instance['height'] = ( ! empty( $new_instance['height'] ) ) ? strip_tags( $new_instance['height'] ) : '';
        return $instance;
    }
} // class Scorenco_Widget