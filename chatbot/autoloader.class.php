<?php

namespace mvc\autoloader;

set_include_path(implode(PATH_SEPARATOR, $setting['include_path']));	// include paths
$setting['include_path']= null;	// clear memmory

if(function_exists('spl_autoload_register')){							// autoload
	// note anonymous function don't get cleared by garbage collertion!
	spl_autoload_register(function($className){
		// $file_name = 'class_'.strtolower(array_pop(explode('\\', $class_name))).'.php';
		try{ // check if file exist first!
			if(!require_once str_replace('\\', DS, $className).".php"){
				require_once str_replace('\\', DS, $className).".class.php";
			}
			if(!class_exists($className)){
				throw new Exception($className." not loaded: file found!");
			}
			//var_dump($className);
		} catch (Exception $e) {
			echo $e;
		}
	});
}else{
	function __autoload($className){
		if(!require_once str_replace('\\', DS, $className).".php"){
			require_once str_replace('\\', DS, $className).".class.php";
		}
		if(!class_exists($className)){
			die($className." not loaded: file found!");
		}
	}
}
