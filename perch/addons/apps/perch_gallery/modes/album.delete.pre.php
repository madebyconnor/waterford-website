<?php
    
    $GalleryAlbums = new PerchGallery_Albums($API);

    $HTML = $API->get('HTML');
    $Form = $API->get('Form');
	$Form->require_field('albumID', 'Required');
	
	$message = false;
	
	if (isset($_GET['id']) && $_GET['id']!='') {
	    $Album = $GalleryAlbums->find($_GET['id']);
	}else{
	    PerchUtil::redirect($API->app_path());
	}
	

    if ($Form->submitted()) {
    	$postvars = array('albumID');
		
    	$data = $Form->receive($postvars);
    	
    	$Album = $GalleryAlbums->find($data['albumID']);
    	
    	if (is_object($Album)) {
    	    $Album->delete();
            PerchUtil::redirect($API->app_path());
        }else{
            $message = $HTML->failure_message('Sorry, that album could not be deleted.');
        }
    }

    
    
    $details = $Album->to_array();



?>