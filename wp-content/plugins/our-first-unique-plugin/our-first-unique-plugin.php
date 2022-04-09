<?php
/*
  Plugin Name: Our Test Plugin
  Description: Super cool plugin.
  Version: 1.0
  Author: Tabbatha Plomaritas
  Author URI: www.google.com
*/
class WordCountAndTimePlugin {
 function __construct() {
  add_action('admin_menu', array($this,'adminPage'));
    add_action('admin_menu', array($this,'settings'));
 }

  function settings() {
    add_settings_section( 'wcp_first_section', null, null, 'word-count-settings-page');
    
    // location
    add_settings_field('wcp_location', 'Display Location', array($this, 'locationHTML'), 'word-count-settings-page', 'wcp_first_section');
    register_setting('wordcountplugin', 'wcp_location', array('sanitize_callback'=> array($this, 'sanitizeLocation'), 'default'=> '0'));
    
    //headline text
    add_settings_field('wcp_headline', 'Headline Text', array($this, 'headlineHTML'), 'word-count-settings-page', 'wcp_first_section');
    register_setting('wordcountplugin', 'wcp_headline', array('sanitize_callback'=> 'sanitize_text_field', 'default'=> 'Post Statistics'));

    //wordcount
    add_settings_field('wcp_wordcount', 'Word Count', array($this, 'wordcountHTML'), 'word-count-settings-page', 'wcp_first_section');
    register_setting('wordcountplugin', 'wcp_wordcount', array('sanitize_callback'=> 'sanitize_text_field', 'default'=> '1'));

    //charcount
    add_settings_field('wcp_charcount', 'Charecter Count', array($this, 'charcountHTML'), 'word-count-settings-page', 'wcp_first_section');
    register_setting('wordcountplugin', 'wcp_charcount', array('sanitize_callback'=> 'sanitize_text_field', 'default'=> '1'));

    //Read Time
    add_settings_field('wcp_readtime', 'Read Time', array($this, 'readtimeHTML'), 'word-count-settings-page', 'wcp_first_section');
    register_setting('wordcountplugin', 'wcp_readtime', array('sanitize_callback'=> 'sanitize_text_field', 'default'=> '1'));
  }

  function sanitizeLocation($input) {
    if ($input != '0' AND $input != '1') {
      add_settings_error('wcp_location', 'wcp_location_error', 'Display Location must be either beginning or end');
      return get_option('wcp_location');
    }
    return $input;
  }

  function readtimeHTML (){ ?>
    <input type="checkbox" name="wcp_readtime" value="1" <?php checked(get_option('wcp_readtime', '1')) ?>
  <?php }
  
  function charcountHTML (){ ?>
    <input type="checkbox" name="wcp_charcount" value="1" <?php checked(get_option('wcp_charcount', '1')) ?>
  <?php }

  function locationHTML (){ ?>
    <select name="wcp_location">
      <option value="0" <?php selected(get_option('wcp_location'), '0')?>>Beginning of Post</option>
      <option value="1" <?php selected(get_option('wcp_location'), '1')?>>End of Post</option>
    </select>
  <?php }

    function wordcountHTML (){ ?>
    <input type="checkbox" name="wcp_wordcount" value="1" <?php checked(get_option('wcp_wordcount', '1')) ?>
<?php }

  function headlineHTML (){ ?>
    <input type="text" name="wcp_headline" value="<?php echo esc_attr(get_option('wcp_headline'))?>">
<?php }


 function adminPage() {
  add_options_page('Word Count Settings', 'Word Count','manage_options','word-count-settings-page', array($this, 'ourHtml'));
}

  function ourHtml() { ?>
    <div class="wrap">
      <h1>Word Count Settings</h1>
      <form action="options.php" method="post">
      <?php
        settings_fields('wordcountplugin');
        do_settings_sections('word-count-settings-page');
        submit_button();
      ?>
      </form>
    </div>
  <?php } 
}

$wordCountAndTimePlugin = new WordCountAndTimePlugin();



