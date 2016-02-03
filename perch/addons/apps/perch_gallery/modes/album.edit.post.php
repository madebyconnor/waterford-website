<?php  
    # Side panel
    echo $HTML->side_panel_start();
     echo $HTML->para('Edit your album here.');
    echo $HTML->side_panel_end();
    
    
    # Main panel
    echo $HTML->main_panel_start(); 
    include('_subnav.php');

    if ($albumID) echo '<a href="'.$HTML->encode($API->app_path().'/images/upload/?album_id='.$albumID).'" class="button add">'.$Lang->get('Add Image').'</a>';


        echo $HTML->heading1($heading1);


        if ($message) echo $message;    

        $filter = 'options';

if (is_object($Album)) {        
        /* ----------------------------------------- SMART BAR ----------------------------------------- */
        
        ?>

        <ul class="smartbar">
            <li class="<?php echo ($filter=='images'?'selected':''); ?>"><a href="<?php echo $HTML->encode($API->app_path().'/images/?id='.$Album->id()); ?>"><?php echo $Lang->get('Images'); ?></a></li>
            <li class="<?php echo ($filter=='options'?'selected':''); ?>"><a href="<?php echo $HTML->encode($API->app_path().'/edit/?id='.$Album->id()); ?>"><?php echo $Lang->get('Album Options'); ?></a></li>
        </ul>
        
        <?php

        /* ----------------------------------------- /SMART BAR ----------------------------------------- */
}

        $template_help_html = $Template->find_help();
        if ($template_help_html) {
            echo $HTML->heading2('Help');
            echo '<div id="template-help">' . $template_help_html . '</div>';
        }


        echo $HTML->heading2('Album details');
        echo $Form->form_start('content-edit');
            echo $Form->text_field('albumTitle', 'Title', isset($details['albumTitle'])?$details['albumTitle']:false, 'xl');
    		echo $Form->fields_from_template($Template, $details, $GalleryAlbums->static_fields);
            echo $Form->text_field('albumOrder', 'Position in album list', isset($details['albumOrder'])?$details['albumOrder']:false, 'order xs');
            echo $Form->hidden('albumID', isset($details['albumID'])?$details['albumID']:false);
            echo $Form->submit_field('btnSubmit', 'Save', $API->app_path());
        echo $Form->form_end();
    echo $HTML->main_panel_end();

    
?>