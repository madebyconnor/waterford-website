<?php
    # include the API
    include('../../../../core/inc/api.php');
    
    $API  = new PerchAPI(1.0, 'perch_gallery');
    $Lang = $API->get('Lang');

    # include your class files
    include('../PerchGallery_Albums.class.php');
    include('../PerchGallery_Album.class.php');
    include('../PerchGallery_Images.class.php');
    include('../PerchGallery_Image.class.php');
    include('../PerchGallery_ImageVersions.class.php');
    include('../PerchGallery_ImageVersion.class.php');

    # Set the page title
    $Perch->page_title = $Lang->get('Gallery: Delete Album');


    # Do anything you want to do before output is started
    include('../modes/album.delete.pre.php');
    
    
    # Top layout
    include(PERCH_CORE . '/inc/top.php');

    
    # Display your page
    include('../modes/album.delete.post.php');
    
    
    # Bottom layout
    include(PERCH_CORE . '/inc/btm.php');
?>