<?php 



/**
 * 
 */
class Database
{
	private $serverName;
	private $username;
	private $password;
	private $databaseName;
	private $conn;
	function __construct()
	{
		# code...
		$this->serverName = 'localhost';
		$this->username = 'root';
		$this->password = 'gct165201b';
		$this->databaseName = 'db_voteinfo';
		$this->conn = null;
	}



	// connect to database by calling this function.

	function connect() {
		$this->conn = mysqli_connect($this->serverName, $this->username, $this->password, $this->databaseName);
		return $this->conn;
	}
}