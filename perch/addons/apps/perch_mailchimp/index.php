<?php
    # include the API
    include('../../../core/inc/api.php');
    
    $API  = new PerchAPI(1.0, 'perch_mailchimp');
    $Lang = $API->get('Lang');

    # include your class files
    include('MailChimp.class.php');
    include('PerchMailchimp_Subscribers.class.php');
    include('PerchMailchimp_Subscriber.class.php');
    include('PerchMailchimp_Stats.class.php');
    include('PerchMailchimp_Stat.class.php');
    include('PerchMailchimp_Campaigns.class.php');
    include('PerchMailchimp_Campaign.class.php');
    include('PerchMailchimp_Util.class.php');
    # Set the page title
    $Perch->page_title = $Lang->get('MailChimp');


    # Do anything you want to do before output is started
    include('modes/subscribers.pre.php');
    
    
    # Top layout
    include(PERCH_CORE . '/inc/top.php');

    
    # Display your page
    include('modes/subscribers.post.php');
    
    
    # Bottom layout
    include(PERCH_CORE . '/inc/btm.php');
?>