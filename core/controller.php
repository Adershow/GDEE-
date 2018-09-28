<?php 
 /**
  * 
  */
 class Controller{
 	public function loadView($viewName){
 		require 'view/'.$viewName.".php";
 	}
 	
 }