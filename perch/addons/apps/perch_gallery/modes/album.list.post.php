<?php
    # Side panel
    echo $HTML->side_panel_start();
    echo $HTML->para('This page lists your current albums. You can add a new album or add new images to an existing album.');
        
    echo $HTML->side_panel_end();
    
    
    # Main panel
    echo $HTML->main_panel_start();
    include('_subnav.php');

    if ($CurrentUser->has_priv('perch_gallery.album.create')) echo '<a href="'.$HTML->encode($API->app_path().'/edit/').'" class="button add">'.$Lang->get('Add Album').'</a>';


    echo $HTML->heading1('Listing all albums');
    
    /* ----------------------------------------- SMART BAR ----------------------------------------- */
    ?>
    <ul class="smartbar">
        <li class="selected"><a href="<?php echo PerchUtil::html($API->app_path().'/'); ?>"><?php echo $Lang->get('Albums'); ?></a></li>
        <li class="fin"><a class="icon reorder" href="<?php echo PerchUtil::html($API->app_path().'/reorder/'); ?>"><?php echo $Lang->get('Reorder Albums'); ?></a></li>
    </ul>
     <?php echo $Alert->output(); ?>
    <?php
    /* ----------------------------------------- /SMART BAR ----------------------------------------- */


    
    if (PerchUtil::count($albums)) {
?>
    <table class="d">
        <thead>
            <tr>
                <th><?php echo $Lang->get('Album'); ?></th>
                <th><?php echo $Lang->get('Slug'); ?></th>
                <th><?php echo $Lang->get('Images'); ?></th>
                <th class="action"></th>
            </tr>
        </thead>
        <tbody>
<?php
    foreach($albums as $Album) {
?>
            <tr>
                <td class="primary"><a href="<?php echo $API->app_path(); ?>/images/?id=<?php echo $HTML->encode(urlencode($Album->id())); ?>" class="edit"><?php echo $HTML->encode($Album->albumTitle()); ?></a></td>
                <td><?php echo $HTML->encode((string)$Album->albumSlug()); ?></td>
                <td><?php echo $HTML->encode((string)$Album->imageCount()); ?></td>
                <td><a href="<?php echo $API->app_path(); ?>/delete/?id=<?php echo $HTML->encode(urlencode($Album->id())); ?>" class="delete"><?php echo $Lang->get('Delete'); ?></a></td>
            </tr>

<?php   
    }
?>
        </tbody>
    </table>
<?php    
    }else{
        echo $HTML->warning_message('You can start by %screating an album%s', '<a href="'.$HTML->encode($API->app_path().'/edit/').'">', '</a>');   
    }
    
    echo $HTML->main_panel_end();
?>