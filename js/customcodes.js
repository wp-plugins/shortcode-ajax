(function() {  
    tinymce.create('tinymce.plugins.shortcode_ajax', {  
        init : function(ed, url) {  
            ed.addButton('shortcode_ajax', {  
                title : 'Shortcode Ajax',  
                image : url+'/image.png',  
                onclick : function() {  
                     ed.selection.setContent('[shortcode_ajax]' + ed.selection.getContent() + '[/shortcode_ajax]');  
  
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('shortcode_ajax', tinymce.plugins.shortcode_ajax);  
})();  