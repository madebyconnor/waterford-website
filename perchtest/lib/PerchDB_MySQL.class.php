<?php

class PerchDB_MySQL
{
	private $link     = false;
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
		$dns_opts = array();
		$dns_opts['host'] 	= PERCH_DB_SERVER;
		$dns_opts['dbname'] = PERCH_DB_DATABASE;

		if (PERCH_DB_PORT) 	 $dns_opts['port'] 	 	  = (int)PERCH_DB_PORT;
		if (PERCH_DB_SOCKET) $dns_opts['unix_socket'] = PERCH_DB_SOCKET;
		

		$dsn = 'mysql:';

		foreach($dns_opts as $key=>$val) {
			$dsn .= "$key=$val;";
		}

		$opts = NULL;

		if (PERCH_DB_CHARSET) {
			$opts = array(1002 => "SET NAMES '".PERCH_DB_CHARSET."'");
		}

		try {
			$this->link = new PDO($dsn, PERCH_DB_USERNAME, PERCH_DB_PASSWORD, $opts);
		} 
		catch (PDOException $e) {
			
			switch(PERCH_ERROR_MODE) 
		    {
		        case 'ECHO':
		            if (!$this->errored) {
		                echo 'Could not connect to the database. Please check that the username and password are correct.';
		                $this->errored = true;
		            }
		            break;
		            
		        default:
		        	$this->error_msg = $e->getMessage();
		            $this->errored = true;
		            break;
		    }

			return false;
		}

		
	}
	
	public function close_link() 
	{
		$this->link = null;
	}
	
	public function get_link() 
	{    
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
		
		try {
			$result = $link->exec($sql);
			self::$queries++;
		}
		catch (PDOException $e) {
			$this->errored = true;
			$this->error_msg = $e->getMessage();
			return false;
		}
		
		if ($link->errorCode() && $link->errorCode()!='0000') {
			$err = $link->errorInfo();
			$this->errored = true;
			$this->error_msg = $err[2];
			return false;
		}

		$newid	= $link->lastInsertId();

		if (!$newid) {
		    self::$queries++;
			return $result;
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
				$escape = $link->quote($value);
				break;
			case 'NULL':
				$escape = 'NULL';
				break;
			default:
				$escape = $link->quote($value);
		}

		return $escape;
	}

	public function get_client_info()
	{
		$link = $this->get_link();
		return $link->getAttribute(PDO::ATTR_CLIENT_VERSION);
	}

	public function get_server_info()
	{
		$link = $this->get_link();
		return $link->getAttribute(PDO::ATTR_SERVER_VERSION);
	}
	
}

?>