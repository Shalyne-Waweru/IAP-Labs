<?php
    interface Authenticator{
    	//methods
    	public function hashPassword();
    	public function isPasswordCorrect();
    	public function login();
    	public function logout();
        public function createFormErrorSessions();
    }

?>