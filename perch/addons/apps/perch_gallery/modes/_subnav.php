<?php
	echo $HTML->subnav($CurrentUser, array(
		array('page'=>array(
					'perch_gallery',
					'perch_gallery/edit',
					'perch_gallery/reorder',
					'perch_gallery/delete',
					'perch_gallery/images',
					'perch_gallery/images/upload',
					'perch_gallery/images/edit'
			), 'label'=>'Albums')
	));
?>