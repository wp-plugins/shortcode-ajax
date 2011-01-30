
function reload_shortcut(shortcode){
 jQuery.post(
  MyAjax.ajaxurl,
  {
    action : 'shortcode_ajax',
    code: shortcode,
  },
  function( response ) {
    //alert(response)
    shortcode_ajax = JSON.parse(response),
    jQuery('#shortcode_ajax_content').html(shortcode_ajax.html);
  }
);

}