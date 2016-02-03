<?php
    
    $HTML = $API->get('HTML');
    
	$GalleryAlbums = new PerchGallery_Albums($API);

    // Try to update
    if (file_exists('update.php')) include('update.php');


    
   
    
    $albums = $GalleryAlbums->return_all();
    
	
    // Install
    if ($albums == false) {
    	$GalleryAlbums->attempt_install();
    }
       
    

?>