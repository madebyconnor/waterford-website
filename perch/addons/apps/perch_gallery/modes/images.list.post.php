<?php  
    # Side panel
    echo $HTML->side_panel_start();
        echo $HTML->para('This page lists the images in this album.');
    echo $HTML->side_panel_end();
    
    
    # Main panel
    echo $HTML->main_panel_start();
    include('_subnav.php');

    if ($CurrentUser->has_priv('perch_gallery.image.upload')) echo '<a href="'.$HTML->encode($API->app_path().'/images/upload/?album_id='.$albumID).'" class="button add">'.$Lang->get('Add Image').'</a>';

    echo $HTML->heading1('Editing ‘%s’', $Album->albumTitle());
    
    if ($message) echo $message; 
    


        /* ----------------------------------------- SMART BAR ----------------------------------------- */
        
        ?>

        <ul class="smartbar">
            <li class="<?php echo ($filter=='images'?'selected':''); ?>">
                <a href="<?php echo $HTML->encode($API->app_path().'/images/?id='.$Album->id()); ?>"><?php echo $Lang->get('Images'); ?></a>
            </li>
            <li class="<?php echo ($filter=='options'?'selected':''); ?>"><a href="<?php echo $HTML->encode($API->app_path().'/edit/?id='.$Album->id()); ?>"><?php echo $Lang->get('Album Options'); ?></a></li>
        </ul>
        
        <?php

        /* ----------------------------------------- /SMART BAR ----------------------------------------- */
    
    
    if (PerchUtil::count($images)) {

    echo $HTML->heading2('Album images');

    echo $Form->form_start();

    echo '<div class="field">';
    echo '<ul class="image-list" data-albumid="'.$albumID.'">';

    foreach($images as $Image) {

        if (is_object($Image)) {
            $admin_thumb = $Image->image_admin_thumb();
            if (is_object($admin_thumb)) {
?>
    <li data-id="<?php echo $Image->id(); ?>">
	    <a href="<?php echo $HTML->encode($API->app_path()); ?>/images/edit/?album_id=<?php echo $HTML->encode(urlencode($albumID)); ?>&amp;id=<?php echo $HTML->encode(urlencode($Image->id())); ?>" class="img">
    	    <?php 
    	        if (is_object($Image)) {
                    echo '<img src="'.$admin_thumb->path().'" alt="'.$HTML->encode($Image->imageAlt()).'" />';
    	        }
    	    ?>
    	</a>
    	<input type="checkbox" name="batch[]" value="<?php echo $Image->id(); ?>" />
    </li>
<?php   
            } // is object admin thumb
        } // is object Image

    }
    echo '</ul></div>';
        
        
        $opts = array();
        $opts[] = array('label'=>'', 'value'=>'');
        $opts[] = array('label'=>$Lang->get('Delete'), 'value'=>'delete');

        echo $Form->field_start('action');
        echo $Form->label('action', 'With selected images');
        echo $Form->select('action', $opts, false);
        echo $Form->submit('btnSubmit', 'Submit', 'delete');
        
        echo $Form->field_end('action');
        
        echo $Form->form_end();

    }else{
        echo $HTML->warning_message('Start by %sadding some images%s to your album', '<a href="'.$HTML->encode($API->app_path().'/images/upload/?album_id='.$albumID).'">', '</a>');
        
    }
    
    echo $HTML->main_panel_end();
?>