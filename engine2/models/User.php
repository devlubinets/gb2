<?php

namespace models;

class User extends Model
{
    public $id;
    public $login;
    public $pass;


    public function getTableName() {
        return 'users';
    }

}