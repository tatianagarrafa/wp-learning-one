/*
    source: https://www.youtube.com/watch?v=_uk_clTGWlE&list=PLriKzYyLb28kpEnFFi9_vJWPf5-_7d3rX&index=8
*/

$(document).ready(function($){
    var mediaUploader;
    
    $('#upload-button').on('click', function(e){ //e for element, and here is #upload-button
        e.preventDefault();
        if(mediaUploader){
           mediaUploader.open();
            return;
        }
        
        mediaUploader = wp.media.frames.file_frame = wp.media({
            titile: 'Choose your picture',
            button: {
                text: 'Choose your picture'
            },
            //user can't chose multiple pictures, only one
            multiple: false
        });
        
        mediaUploader.on('select', function(){
            attachment = mediaUploader.state().get('selection').first().toJSON();
            $('#profile-picture').val(attachment.url);
            $('#profile-picture-preview').css('background-image', 'url(' + attachment.url + ')');            
        });
    
        mediaUploader.open();
    });
});