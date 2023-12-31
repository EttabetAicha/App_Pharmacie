<?php
 
interface Authenticatable {
    public function getEmail();
    public function getPasswordHash();
    public function login($enteredPassword);
    public function register($data);
}
