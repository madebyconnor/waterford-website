<?php
    include('lib/PerchDB.class.php');

    $fail = false;
    $reasons = array();
    $debug = array();
    
    // Session test
    if(session_id() == "") { 
        session_start(); 
    }
    $_SESSION['PERCH_COMPAT']++;
    
    $db_server   = (isset($_POST['db_server']) ? $_POST['db_server'] : false);
    $db_database = (isset($_POST['db_database']) ? $_POST['db_database'] : false);
    $db_username = (isset($_POST['db_username']) ? $_POST['db_username'] : false);
    $db_password = (isset($_POST['db_password']) ? $_POST['db_password'] : false);
    $db_port     = (isset($_POST['db_port']) && $_POST['db_port']!='' ? $_POST['db_port'] : NULL);


    // check we have all fields
    if ($db_server == false || $db_database == false || $db_username == false || $db_password == false) {
        $fail = true;
        $reasons[] = "Please provide a full set of database details.";
        $reasons[] = "<strong>Server</strong> is the name or IP address of the server that runs MySQL. This is often <code>localhost</code> but not always. Check with your host.";
        $reasons[] = "<strong>Database</strong> is the name of the database to use. When adding a new database, some hosting control panels prepend the account name to the name you specify, so double check.";
        $reasons[] = "<strong>Username</strong> is the login name of a database user with permissions to use that database.";
        $reasons[] = "<strong>Password</strong> is that user's password.";
    }else{

        define('PERCH_DB_SERVER', $db_server);
        define('PERCH_DB_DATABASE', $db_database);
        define('PERCH_DB_USERNAME', $db_username);
        define('PERCH_DB_PASSWORD', $db_password);
        define('PERCH_DB_PORT', $db_port);
        define('PERCH_ERROR_MODE', 'SILENT');

        $DB = PerchDB::fetch();


        // Can you Connect4? It's easy and fun! Just use your head, Connect4 and you've won! Make a connection, MAKE A CONNECTION!
        $link = $DB->get_link();
    
        if (!$link) {
    	    $fail = true;
    	    $reasons[] = "We could not connect to the database with the information provided.";
    	    $reasons[] = "That most likely means that one or more of the database settings is incorrect.";
    	    $reasons[] = "Another possibility is that your database server could be down, but that's less likely. Check your settings first.";
    	    $debug[]   = $DB->error_msg;
    	}
	

	    if (!$fail) {
        	// Try to create a table
        	$sql    = "CREATE TABLE `perch_compatibility_test` (
              `id` int(11) NOT NULL auto_increment,
              `item_value` varchar(255) default NULL,
              PRIMARY KEY  (`id`)
            ) ENGINE=MyISAM DEFAULT CHARSET=utf8";

            $result = $DB->execute($sql);
            if ($DB->errored) {
                $fail = true;
                $reasons[] = "The test table could not create a table. That probably means the user account doesn't have <code>CREATE</code> permissions set.";
                $debug[] = $DB->error_msg;
        	}
        }
    
    	
	    if (!$fail) {
            // Try an INSERT
            $sql = "INSERT INTO perch_compatibility_test(item_value) VALUES('test')";
            $result = $DB->execute($sql);
            if ($DB->errored) {
                $fail = true;
                $reasons[] = "New data couldn't be inserted into the table. Check that you have <code>INSERT</code> permissions.";
                $debug[] = $DB->error_msg;
            }
    
        }
    
    	
	    if (!$fail) {
            // Try an UPDATE
            $sql = "UPDATE perch_compatibility_test SET item_value='test2' WHERE item_value='test'";
            $result = $DB->execute($sql);
            if ($DB->errored) {
                $fail = true;
                $reasons[] = "Data could not be updated in the table. Check that you have <code>UPDATE</code> permissions.";
                $debug[] = $DB->error_msg;
            }
        }
    
    	
	    if (!$fail) {
            // Try a DELETE
            $sql = "DELETE FROM perch_compatibility_test WHERE item_value='test2'";
            $result = $DB->execute($sql);
            if ($DB->errored) {
                $fail = true;
                $reasons[] = "Data could not be deleted from the test table. Check that you have <code>DELETE</code> permissions.";
                $debug[] = $DB->error_msg;
            }
    
        }
    
    	
	    if ($link) {
            // Try and clear up - may not be possible, that's ok
            $sql = "DROP TABLE perch_compatibility_test";
            $result = $DB->execute($sql);
    
        }
    
    	
	    if (!$fail) {
    
            // Check the MySQL version
            $version_string = $DB->get_server_info();
            $v_parts = explode('.', $version_string);
            if ((int) $v_parts[0] < 5) {
                $fail = true;
                $reasons[] = "Perch needs at least MySQL version 5.0 for new installations. You have $version_string.";
            }
            /* for testing minor version, when we used to require 4.1. Not necessary with 5.0
            else{
                if ((int) $v_parts[0] == 5 && (int) $v_parts[1] < 0) {
                    $fail = true;
                    $reasons[] = "Perch needs at least MySQL version 5.0 for new installations. You have $version_string.";
                }
            }
            */
        }
    
    }
    
    if (!isset($_SESSION['PERCH_COMPAT']) || !intval($_SESSION['PERCH_COMPAT'])>1) {
        $fail = true;
        $reasons[] = "PHP Sessions are not functioning as expected.";
    }
    
    if (!$fail) {
        header('Location: pass.php');
        exit;
    }
    

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
                        <p class="alert-failure">The test has been unsuccessful</p>

                        <h2>Reason</h2>
                        <ul>
                            <?php
                                foreach($reasons as $reason) {
                                    echo '<li>' . $reason . '</li>';
                                }
                            ?>
                        </ul>
                        
                        <?php
                            if (count($debug)) {
                        ?>
                        
                        
                        <div class="errors">
                            <h2>Error message</h2>
                            <ul>
                                <?php
                                    foreach($debug as $msg) {
                                        echo '<li>' . $msg . '</li>';
                                    }
                                ?>
                            </ul>
                        </div>
                        <?php
                            }
                        
                        ?>

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