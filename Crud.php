<?php
    interface Crud{
    	//methods
    	public function save($con);
    	public function readAll($con);
    	public function readUnique();
    	public function search();
    	public function removeOne();
    	public function removeAll();
    	//lab 2 methods 
        //5.
    	public function validateForm();
    	public function createFormErrorSessions();
    }

?>