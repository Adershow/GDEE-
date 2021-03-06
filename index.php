<?php
require 'modelo/DAO/Banco.php';
spl_autoload_register(function($class){
	if(file_exists('controle/'.$class.'.php')){
		require 'controle/'.$class.'.php';
	}
	else if(file_exists('modelo/'.$class.'.php')){
		require 'modelo/'.$class.'.php';
	}
	else if(file_exists('core/'.$class.'.php')){
		require 'core/'.$class.'.php';
	}
});

$core = new Core();
$core->run();