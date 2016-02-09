<?php 
  $domain        = 'http://'.$_SERVER["HTTP_HOST"];
  $url           = $domain.$_SERVER["REQUEST_URI"];
  $sitename      = "Waterford Kamhlaba UWCSA";
  $twittername   = "@WaterfordUWCSA";

  PerchSystem::set_var('domain',$domain);
  PerchSystem::set_var('url',$url);
  PerchSystem::set_var('sitename',$sitename);
  PerchSystem::set_var('twittername',$twittername);  

  perch_page_attributes(array(        
    'template' => 'head.html'
  )); 
  ?>
