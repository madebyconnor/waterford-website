<?php
   
    # Side panel
    echo $HTML->side_panel_start();
        echo $HTML->para('You can update the details for this image, or replace it by uploading a new image in its place.');    

    echo $HTML->side_panel_end();
    
    
    # Main panel
    echo $HTML->main_panel_start(); 
    include('_subnav.php');

    if(is_object($Image)) {
        echo '<a href="'.$HTML->encode($API->app_path().'/images/upload/?album_id='.$albumID).'" class="button add">'.$Lang->get('Add Image').'</a>';
    }
   
    echo $HTML->heading1($heading1);

    
        if ($message) echo $message;    


        /* ----------------------------------------- SMART BAR ----------------------------------------- */
        
        ?>

        <ul class="smartbar">
            <li class="selected">
            <span class="set">
                <a class="sub" href="<?php echo $HTML->encode($API->app_path().'/images/?id='.$Album->id()); ?>"><?php echo $Lang->get('Album ‘%s’', $Album->albumTitle()); ?></a>
                <span class="sep icon"></span> 
                <a ><?php echo $Lang->get('Image'); ?></a>
            </span>
            </li>
            <li><a href="<?php echo $HTML->encode($API->app_path().'/edit/?id='.$Album->id()); ?>"><?php echo $Lang->get('Album Options'); ?></a></li>
        </ul>
        
        <?php

        /* ----------------------------------------- /SMART BAR ----------------------------------------- */
    



        
        $template_help_html = $Template->find_help();
        if ($template_help_html) {
            echo $HTML->heading2('Help');
            echo '<div id="template-help">' . $template_help_html . '</div>';
        }
    
        echo $HTML->heading2('Image details');
    
        echo $Form->form_start('content-edit');

            echo $Form->text_field('imageAlt', 'Title', isset($details['imageAlt'])?$details['imageAlt']:false, 'xl');

            
        
        	
        	
        	
        	
			
    		echo $Form->fields_from_template($Template, $details, $Images->static_fields);
		
            if(is_object($Image)) {
                //display admin thumb
                $PreviewVersion = $Image->get_version('admin_preview');
                $OriginalVersion = $Image->get_version('original');
                if(is_object($PreviewVersion)) {
                    echo '<div class="field">
                            <a class="preview" href="'.$OriginalVersion->path().'">
                            <img src="'.$PreviewVersion->path().'" alt="'.$Image->imageAlt().'" height="'.$PreviewVersion->versionHeight().'" width="'.$PreviewVersion->versionWidth().'" />
                            </a>
                         </div>';
                }
            }

            echo $Form->image_field('upload', 'Image', false);

            echo $Form->text_field('imageOrder', 'Position in album', isset($details['imageOrder'])?$details['imageOrder']:false, 'order xs');

            echo $Form->hidden('albumID', isset($details['albumID'])?$details['albumID']:false);
			echo $Form->hidden('imageID', isset($details['imageID'])?$details['imageID']:false);
            echo $Form->submit_field('btnSubmit', 'Save', $API->app_path().'/images/?id='.$albumID);

        echo $Form->form_end();
    
        
    echo $HTML->main_panel_end();

    
?>