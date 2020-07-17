<?php
    interface Authenticator{
    	//lab 2 methods
    	//7.
    	public function hashPassword();
    	public function isPasswordCorrect($con);
    	public function login($con);
    	public function logout();
        public function createFormErrorSessions();
    }

?>