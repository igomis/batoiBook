<?php

namespace App;

class User
{

    public static function table()
    {
        return "users";
    }

    public static function login($email, $password)
    {
        $connection = new Connection();
        $result = $connection->sql(self::class, [
            'email' => $email,
        ])[0];
        if ($result && password_verify($password, $result->password)) {
            return $result;
        } else {
            return false;
        }
    }

    public static function register($email, $password, $nick)
    {
        $connection = new Connection();
        return $connection->insert(self::table(), [
            'email' => $email,
            'password' => password_hash($password, PASSWORD_BCRYPT),
            'nick' => $nick
        ])[0];
    }
}
