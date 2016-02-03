<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
	<title>Perch 2 Server Compatibility Test Suite</title>
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
                        <p class="alert-success">PASS: You're all set!</p>
                        <p>Your server appears to meet the basic requirements for running Perch. Hurray!</p>
                        
                        <p>The test database table has been removed.</p>

                        <?php
                            if (!extension_loaded('gd') && !extension_loaded('imagick')) {
                        ?>
                            <p class="alert-notice pad">Note: No image resize functionality</p>
                            <p>Your server has no capability for resizing images. This isn't required to use Perch, 
                                but ask your host to enable <strong>GD</strong> or <strong>ImageMagick</strong> 
                                if you need to resize images.</p>
                            
                        <?php
                            } // image check 
                        ?>
                        
                        <?php
                            if (!function_exists('json_encode')) {
                        ?>
                            <p class="alert-notice pad">Note: No native JSON support</p>
                            <p>Your server does not have <a href="http://php.net/manual/en/book.json.php">JSON</a> enabled. Perch will run without, but it will be slower. You should ask your host to <strong>enable native JSON functions</strong> in PHP.</p>
                            
                        <?php
                            } // json
                        ?>

                        <?php
                            if (!function_exists('filter_input')) { 
                        ?>
                            <p class="alert-notice pad">Note: No filter support</p>
                            <p>Your server does not have <a href="http://php.net/manual/en/book.filter.php">Filter</a> enabled. It is not required, but is strongly recommended. You should ask your host to <strong>enable Filter support</strong> for PHP.</p>
                            
                        <?php
                            } // filter
                        ?>
                            
                        <?php
                            if (ini_get('safe_mode')) { 
                        ?>
                            <p class="alert-notice pad">Note: Safe Mode may be enabled</p>
                            <p>It looks like PHP <a href="http://php.net/manual/en/features.safe-mode.php">Safe Mode</a> may be enabled on your server. Safe Mode is not as good as its name suggests, and has been removed from more recent versions of PHP. If you're able to, we recommend <strong>turning Safe Mode off</strong> completely.</p>
                            
                        <?php
                            } // filter
                        ?>

                        <p class="return"><a href="http://grabaperch.com/buy">Return to the Perch website &raquo;</a>
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