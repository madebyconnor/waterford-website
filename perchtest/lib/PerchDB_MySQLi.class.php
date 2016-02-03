<?php

class PerchDB_MySQLi
{
    private $link 		= false;
	public $errored   = false;
	public $error_msg = false;
	
	static public $queries    = 0;
	

	function __construct()
	{
		if (!defined('PERCH_DB_CHARSET')) 	define('PERCH_DB_CHARSET', 'utf8');
		if (!defined('PERCH_DB_PORT')) 		define('PERCH_DB_PORT', NULL);
		if (!defined('PERCH_DB_SOCKET')) 	define('PERCH_DB_SOCKET', NULL);
	}
    
	function __destruct() 
	{
		$this->close_link();
	}
		
	public function open_link() 
	{
		try {
			$this->link = new mysqli(PERCH_DB_SERVER, PERCH_DB_USERNAME, PERCH_DB_PASSWORD, PERCH_DB_DATABASE, PERCH_DB_PORT, PERCH_DB_SOCKET);
		} catch (Exception $e) {
			
		}

		if ($this->link->connect_errno) {
		    switch(PERCH_ERROR_MODE) 
		    {
		        case 'SILENT':
		            break;
		            
		        case 'ECHO':
		            if (!$this->errored) {
		                echo 'Could not connect to the database. Please check that the username and password are correct.';
		                $this->errored = true;
		            }
		            break;
		            
		        default:
		        	$this->errored = true;
					$this->error_msg = $link->error;
		            break;
		    }

			return false;
		}

		if (PERCH_DB_CHARSET && !$this->link->set_charset(PERCH_DB_CHARSET)) {
		}
		
	}
	
	public function close_link() 
	{
		if ($this->link && $this->link->ping()) {
			$this->link->close();
			unset($this->link);
			$this->link  = false;
		}
	}
	
	public function get_link() 
	{
	    if ($this->link && !$this->link->ping()) {
            $this->link = false;
        }
	    
		if (!$this->link) {
			$this->open_link();
		}
		
		return $this->link;
	}
	
	public function execute($sql) 
	{
		$this->errored = false;

		
		$link = $this->get_link();
	    if (!$link) return false;
		
		$result = $link->query($sql);
		self::$queries++;
		
		if ($link->errno) {
			$this->errored = true;
			$this->error_msg = $link->error;
			return false;
		}
		
		$newid	= $link->insert_id;
		
		if (!$newid) {
		    self::$queries++;
			return $link->affected_rows;
		}
		
		return $newid;
		
	}
	

	public function pdb($value)
	{
		// Stripslashes
		if (get_magic_quotes_runtime()) {
			$value = stripslashes($value);
		}
		
		$link = $this->get_link();
	    if (!$link) return false;

		// Quote
		switch(gettype($value)) {
			case 'integer':
			case 'double':
				$escape = $value;
				break;
			case 'string':
				$escape = "'" . $link->escape_string($value) . "'";
				break;
			case 'NULL':
				$escape = 'NULL';
				break;
			default:
				$escape = "'" . $link->escape_string($value) . "'";
		}

		return $escape;
	}
	
	
	public function get_client_info()
	{
		$link = $this->get_link();
		return $link->client_info;
	}

	public function get_server_info()
	{
		$link = $this->get_link();
		return $link->server_info;
	}
	
}

?>