<?php

namespace chatbot\model;
use \PDO;

// security check if file is directly called
if(!defined('APPLICATION_PATH')) die();

// Database wrapper (PDO)
class database extends \PDO{

	private static $instance;// = null;

	// private function __construct(array &$setting=NULL){ // breaks with extends \PDO<- check
	public function __construct(array &$setting=NULL){

        try { // if sqlite!
			// get database file from config
			parent::__construct("sqlite:".APPLICATION_PATH."/cache/database.sql");
        } catch (\PDOException $e) {
			var_dump($e);
            trigger_error($e->getMessage());
            return false;
        }
	}

	private function connect(){

	}

	public static function getInstance(){
		if(self::$instance!==null){
			die("nope!"); // report!
		}elseif(!isset(self::$instance)){
			self::$instance = new database();
		}
		return self::$instance;
	}

}

