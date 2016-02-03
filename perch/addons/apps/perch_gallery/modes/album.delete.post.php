<?php
   
    # Side panel
    echo $HTML->side_panel_start();
    echo $HTML->para('Delete a gallery album here.');
    echo $HTML->side_panel_end();
    
    
    # Main panel
    echo $HTML->main_panel_start(); 
    include('_subnav.php');

    echo $HTML->heading1('Deleting an Album');

    echo $Form->form_start();
    
    if ($message) {
        echo $message;
    }else{
        echo $HTML->warning_message('Are you sure you wish to delete the album %s? This will also remove all images contained within it.', $details['albumTitle']);
        echo $Form->form_start();
        echo $Form->hidden('albumID', $details['albumID']);
		echo $Form->submit_field('btnSubmit', 'Delete', $API->app_path());


        echo $Form->form_end();
    }
    
    echo $HTML->main_panel_end();

?>