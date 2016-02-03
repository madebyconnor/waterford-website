<?php
    # Side panel
    echo $HTML->side_panel_start();
    echo $HTML->para('This page enables you to reorder your current albums.');
        
    echo $HTML->side_panel_end();
    
    
    # Main panel
    echo $HTML->main_panel_start();
    include('_subnav.php');

    echo '<a href="'.$HTML->encode($API->app_path().'/edit/').'" class="button add">'.$Lang->get('Add Album').'</a>';


    echo $HTML->heading1('Listing all albums');
    
    echo $Alert->output();

    /* ----------------------------------------- SMART BAR ----------------------------------------- */
    ?>
    <ul class="smartbar">
        <li><a href="<?php echo PerchUtil::html($API->app_path().'/'); ?>"><?php echo $Lang->get('Albums'); ?></a></li>
        <li class="selected fin"><a class="icon reorder" href="<?php echo PerchUtil::html($API->app_path().'/reorder/'); ?>"><?php echo $Lang->get('Reorder Albums'); ?></a></li>
    </ul>
     <?php echo $Alert->output(); ?>
    <?php
    /* ----------------------------------------- /SMART BAR ----------------------------------------- */


    
    if (PerchUtil::count($albums)) {
?>
    <form method="post" action="<?php echo PerchUtil::html($Form->action()); ?>">
    
<?php
    $Alert->set('notice', $Lang->get('Drag and drop the albums to reorder them.').' '. $Form->submit('reorder', 'Save Changes', 'button action'));
    $Alert->output();


    echo '<ol class="album-list sortable">';

    foreach($albums as $Album) {
        
        echo '<li><div class="page icon">';
            echo '<input type="text" name="a-'.$Album->id().'" value="'.$Album->albumOrder().'" />';
            echo $HTML->encode($Album->albumTitle()).'</div>';
        echo '</li>';
        
    }

    echo '</ol>';

    }
?>
    </form>
 <?php   
    echo $HTML->main_panel_end();
?>