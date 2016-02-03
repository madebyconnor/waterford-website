<?php
   
    # Side panel
    echo $HTML->side_panel_start();
        echo $HTML->para('Upload one or more new images. If an upload does not work as expected, it could be that the image is too large for your server to handle. Try downsizing the image first.');
    echo $HTML->side_panel_end();
    
    
    # Main panel
    echo $HTML->main_panel_start(); 
    include('_subnav.php');

        echo $HTML->heading1('Uploading Images');
    
    
        if ($message) echo $message;    
        
        $template_help_html = $Template->find_help();
        if ($template_help_html) {
            echo $HTML->heading2('Help');
            echo '<div id="template-help">' . $template_help_html . '</div>';
        }
    
        echo $HTML->heading2('Upload images');
        
        $className = 'sectioned';
    
        if ($Settings->get('perch_gallery_basicUpload')->settingValue()) $className .= ' basic';
    
        echo $Form->form_start('imageupload', $className);
            $id = 'upload';
            $label = 'Image';
            
            echo $Form->image_field('upload', 'Image', false);

            echo $Form->hidden('albumID', $albumID);
            echo $Form->hidden('success', $API->app_path().'/images/?id='.$albumID.'&uploaded=true');
            echo $Form->submit_field('btnSubmit', 'Upload', $API->app_path().'/');
        echo $Form->form_end();
    
        
    echo $HTML->main_panel_end();

    
?>