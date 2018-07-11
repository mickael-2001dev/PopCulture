<?php

class Cookie 
{

    private $time;

    public function __construct($time = 1) 
    {
        $this->time = time() + $time*86400;
    }

    public function setCookieUser($user) 
    {
        $this->setCookie('username', $user->getUsername());
        $this->setCookie('password', $user->getPassword());
        $this->setCookie('email', $user->getEmail());
    }

    public function setCookieUserJson($user) 
    {
        $this->setCookie('login', json_encode($user));
    }

    public function getCookieUser() 
    {
        if ($this->isCookieExist()) {
            $username = filter_input(INPUT_COOKIE, 'username');
            $email = filter_input(INPUT_COOKIE, 'email');
            $password = filter_input(INPUT_COOKIE, 'password');
            if ($nome && $login && $senha)
                return new User($username,$password,$email);
            else
                return false;
        }else {
            return false;
        }
    }

    public function getCookieUserJson() 
    {
        if ($this->isCookieExist()) {
            $login = filter_input(INPUT_COOKIE, 'username');
            if ($login) {
                $user = json_decode($login);
                if (is_a($user, 'user')) {
                    return $user;
                }
                else{
                    return false;
                }
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function setCookie($nome, $valor) 
    {
        setcookie($nome, $valor, $this->time,'/');
    }

    public function getCookie($nome) 
    {
        return filter_input(INPUT_COOKIE, $nome);
    }

    public function isCookieExist($login = 'username') 
    {
         return (filter_input(INPUT_COOKIE,$login))?true:false; 
    }

    public function destroyCookie() 
    {        
        setcookie('username', null, -1,'/');
        setcookie('password', null, -1,'/');
        setcookie('email', null, -1,'/');
    }
}
