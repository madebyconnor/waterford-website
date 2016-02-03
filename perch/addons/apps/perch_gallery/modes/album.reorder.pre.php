<?php
    

    $HTML = $API->get('HTML');
    
    $GalleryAlbums = new PerchGallery_Albums($API);
    
    $Form = $API->get('Form');

    if ($Form->submitted()) {
   		$items = $Form->find_items('a-');
   		if (PerchUtil::count($items)) {
   			foreach($items as $albumID=>$albumOrder) {
   				$Album = $GalleryAlbums->find($albumID);
   				if (is_object($Album)) {
   					$data = array('albumOrder'=>$albumOrder);
   					$Album->update($data);
   				}
   			}

   			$Alert->set('success', $Lang->get('Album orders successfully updated.'));
   		}
    }
    
    $albums = $GalleryAlbums->return_all();
?>