<?php
	if ($CurrentUser->logged_in() && $CurrentUser->has_priv('perch_gallery')) {
	    $this->register_app('perch_gallery', 'Gallery', 1, 'Basic image gallery', '2.8.6');
	    $this->add_setting('perch_gallery_basicUpload', 'Use basic uploader', 'checkbox', false);
	    $this->add_setting('perch_gallery_bucket_mode', 'Store images', 'select', 'single', array(
	    		array('label'=>'All in one resource bucket', 'value'=>'single'),
	    		array('label'=>'In one bucket per album', 'value'=>'dynamic'),
	    	));
	    $this->add_setting('perch_gallery_bucket', 'Default resource bucket', 'text', 'default');
	    $this->require_version('perch_gallery', '2.8');
	}
