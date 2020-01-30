<?php
/**
* Child theme functions.php
*/

// Lesezeit anzeigen
function theme_slug_reading_time( $post = null, $wpm = 275 ) {

    // Get content and clean it.
    $content = get_post_field( 'post_content', $post );
    $content = strip_tags( strip_shortcodes( $content ) );

    // Get word count.
    $word_count = str_word_count( $content );

    // Calculate reading time.
    $reading_time = ceil( $word_count / $wpm );

    return sprintf( esc_html__( 'Vorraussichtliche Lesezeit: %s min', 'theme-slug' ), $reading_time );
}

// author meta im post
function add_author_meta() {

    if (is_single()){
        global $post;
        $author = get_the_author_meta('user_nicename', $post->post_author);
        echo "<meta name=\"author\" content=\"$author\">";
    }
}
add_action( 'wp_enqueue_scripts', 'add_author_meta' );

//Disable Pointers
// Plugin URI: https://github.com/lumpysimon/wp-disable-pointers
$lumpy_disable_pointers = new lumpy_disable_pointers;
class lumpy_disable_pointers {
	public function __construct() {
		add_action( 'admin_init', array( $this, 'remove_action' ) );
	}

	function remove_action() {
		remove_action( 'admin_enqueue_scripts', array( 'WP_Internal_Pointers', 'enqueue_scripts' ) );
	}
} 

//heartbeat api auf 60sec stellen
function wptuts_heartbeat_settings( $settings ) {
    $settings['interval'] = 60; //Anything between 15-60
    return $settings;
}
add_filter( 'heartbeat_settings', 'wptuts_heartbeat_settings' );

//mediathek plugin reverknüpfen
function upload_columns($columns) {
	unset($columns['parent']);
	$columns['better_parent'] = __( 'Parent' );
	return $columns;
}

function media_custom_columns($column_name, $id) {
	$post = get_post($id);
	
	if ( $column_name != 'better_parent' )
		return;
	
	if ( $post->post_parent > 0 ) {
		if ( get_post($post->post_parent) )
			$title = _draft_or_post_title($post->post_parent);
		?>
		<strong>
			<a href="<?php echo get_edit_post_link( $post->post_parent ); ?>"><?php echo $title ?></a>
		</strong>, <?php echo get_the_time( get_option('date_format') ); ?>
		<br />
		<a class="hide-if-no-js" onclick="findPosts.open('media[]','<?php echo $post->ID ?>');return false;" href="#the-list"><?php _e( 'Re-', 'textdomain' ); _e('Attach'); ?></a>
		<?php
	} else {
		_e( '(Unattached)' ); ?>
		<br />
		<a class="hide-if-no-js" onclick="findPosts.open('media[]','<?php echo $post->ID ?>');return false;" href="#the-list"><?php _e('Attach'); ?></a>
	<?php
	}
}
add_filter( 'manage_upload_columns', 'upload_columns' );
add_action( 'manage_media_custom_column' , 'media_custom_columns', 0, 2 );

//change login logo
function my_login_logo_one() { 
?> 
<style type="text/css"> 
body.login div#login h1 a {
background-image: url(https://360kompakt.de/wp-content/uploads/2019/12/360-Kompakt.png);   
background-size: 410px;
height: 78px;
width: 410px;
} 
</style>
 <?php 
} add_action( 'login_enqueue_scripts', 'my_login_logo_one' );

// login header homepage url
add_filter( 'login_headerurl', 'loginlogo_url' ); 
function loginlogo_url($url) 
{
  return home_url(); 
} 

//no website in comment
//add_filter( 'get_comment_author_link', 'rv_remove_comment_author_link', 10, 3 );
function rv_remove_comment_author_link( $return, $author, $comment_ID ) {
    return $author;
}
add_filter('get_comment_author_url', 'rv_remove_comment_author_url');
function rv_remove_comment_author_url() {
    return false;
}
function remove_website_field($fields) {
   unset($fields['url']);
   return $fields;
}
add_filter('comment_form_default_fields', 'remove_website_field');


// Automatisches Löschen des Autoptimize-Cache, wenn er über 128 MB kommt.
if (class_exists('autoptimizeCache')) {
    $myMaxSize = 128000; # Du kannst diesen Wert auf niedriger ändern, wenn du nur begrenzten Serverplatz hast.
    $statArr=autoptimizeCache::stats(); 
    $cacheSize=round($statArr[1]/1024);
    
    if ($cacheSize>$myMaxSize){
       autoptimizeCache::clearall();
       header("Refresh:0"); # Aktualisiert die Seite, damit Autoptimize neue Cache-Dateien erstellen kann
    }
}
