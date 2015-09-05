<?php 

//function add_mshortcode($tag ,$func, $par){
	//do sometings...
// 	add_shortcode( $tag, $func);
//}
function as_gen()
    {
        global $as_gen;
        
        if( !isset($as_gen) )
        {
            $as_gen = new As_Generator();
        }
        
        return $as_gen;
    }

    as_gen();

class As_Generator {

    /**
     * Constructor
     */
    function __construct() {
        add_action( 'media_buttons', array( __CLASS__, 'button' ), 1000 );
        add_action('wp_enqueue_media', array( __CLASS__,'include_media_button_js_file'),10);
    }

    /**
     * Generator button
     */
    public static function button() {
        echo '<a href="#" id="insert-my-media" class="button">Add my media</a>';
    }

    public static function include_media_button_js_file() {
        wp_enqueue_script('media_button', plugins_url().'/automagic-shortcodes/core/shortcodesMCE.js', array('jquery'), '1.0', true);
    }
    
}
?>


