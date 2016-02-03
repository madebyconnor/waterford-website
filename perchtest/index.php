<?php
    header('Location: step1.php');
    exit;
?><!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
	<title>Perch Server Compatibility Test Suite</title>
	<link rel="stylesheet" href="assets/compat.css" type="text/css" />
</head>
<body>
    <div id="content">  
        <div id="compat">
            <div id="hd">
                <img src="assets/logo.png" alt="Logo" />
            </div>
            <div class="bd">
                <div class="inner">
                    <p class="alert-failure">Sorry, your server doesn't run PHP</p>
                    <p>
                        It doesn't look like your server understands PHP. You will not be able to run Perch.
                    </p>
                </div>
            </div>
        
        </div>
        <div id="footer">
    		<div class="credit">
    			<p><a href="http://grabaperch.com"><img src="assets/perch.gif" width="35" height="12" alt="Perch" /></a>
    			by <a href="http://edgeofmyseat.com">edgeofmyseat.com</a></p>
    		</div>

        	</div>
        
    </div>
</body>
</html>
