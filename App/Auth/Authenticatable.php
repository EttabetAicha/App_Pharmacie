<?php
 
interface Authenticatable {
    public function getEmail();
    public function getPasswordHash();
    public function login($enteredEmail,$enteredPassword);
    public function register($data);
}
