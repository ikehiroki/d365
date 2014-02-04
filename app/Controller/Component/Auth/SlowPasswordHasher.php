<?php

App::uses('AbstractPasswordHasher', 'Controller/Component/Auth');
App::uses('Security', 'Utility');

class SlowPasswordHasher extends AbstractPasswordHasher {

    public function hash($password) {
        return password_hash($password, PASSWORD_BCRYPT, ['cost' => 13]);
   }

    public function check($password, $hashedPassword) {
        return password_verify($password, $hashedPassword);
    }

}
