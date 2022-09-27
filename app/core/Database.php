<?php

/**
 * database class
 */
class Database
{

	private function connect()
	{
		$dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";port=" . DB_PORT . "";

		$pdo = new PDO($dsn, DB_USER, DB_PASSWORD);
		$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_BOTH);
		return $pdo;
	}

	public function public_connect()
	{
		return $con = $this->connect();
	}
}

$db = new Database();

$conn = $db->public_connect();
