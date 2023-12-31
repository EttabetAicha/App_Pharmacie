<?php

class PatientEnLigne extends UserDAO implements Authenticatable {
    public function login($enteredPassword) {
        $storedPasswordHash = UserDAO::getUserByEmail($this->getEmail())->getPasswordHash();

        return password_verify($enteredPassword, $storedPasswordHash);
    }

    public function register($data) {
        return UserDAO::createUser($data['full_name'], $data['email'], $data['password']);
    }
}