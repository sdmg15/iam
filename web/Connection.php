<?php

/**
	@classname : Connection
	@author: Sonkeng Maldini(sdmg15)

Connection to the database.
**/

Abstract class Connection {

	private $base;

	public function __construct($host,$dbname,$user,$pw){

		$this->base = new PDO('mysql:host='.$host.';dbname='.$dbname.';charset=utf8', $user,$pw);
		$this->base->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	}

	public function getBase(){
		return $this->base;
	}
}
