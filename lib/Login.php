<?php

class Login 
{

    private $logged;
    private $session;
    private $cookie;
    private $user;
    private $model;

    public function __construct() 
    {
        $this->session = new Session();
        $this->cookie = new Cookie();
        $this->model = new UserModel();
        $this->logged = false;
    }

    public function verifyLogin($user) 
    {
        $this->user = $this->model->getUserByLogin($user->getUsername());
        //$test = $this->user;
        //var_dump($test);
        if($this->user){
            //echo $this->user->getPassword().'<br>';
            //echo md5($user->getPassword());
            if ($this->user->getPassword() == md5($user->getPassword())) {
                $this->logged = true;
            }
        }

        return $this->logged;
    }

    public function verifyPassword($username) 
    {
        $return = false;
        
        $this->user = $this->model->getUserByLogin($username);

        $dateUpdate = new DateTime($this->user->getDtupdate());
        $dateToday = new DateTime();
        $interval = $dateToday->diff($dateUpdate);

        //var_dump($interval);

        if($interval->days >= 60) {
            $return = true;
        }

        return $return;
    }

    public function verifyNewPassword($username, $pass)
    {

        $return = false;
        $this->user = $this->model->getUserByLogin($username);

        if($this->user->getTempPassword() == $pass) {
            $return = true;
        }

        return $return;
    }

    public function updatePassword($username, $pass) 
    {
        $this->user = $this->model->getUserByLogin($username);
       
        return $this->model->updatePassword($pass, $this->user->getId());
    }

    public function updateTempPassword($username, $email, $pass) 
    {
        $this->user = $this->model->getUserByEmailLogin($username, $email);
        
        return $this->model->updateTempPassword($pass, $this->user->getId());
    }

    /*public function showEmail($username)
    {
        $this->user =  $this->model->getUserByLogin($username);

        return $this->user->getEmail();
    }*/

    public function createSession() 
    {
        $this->session->setSessionUser($this->user);
    }

    public function createCookies() 
    {
        $this->cookie->setCookieUser($this->user);
    }

    public function getSession() 
    {
        $this->session->getSessionUser();
    }

    public function getCookie() 
    {
        $this->cookie->getCookieUser();
    }
    
    public function getLoggedUser()
    {
        if($this->session->isSessionExist()){
            return $this->getSession();
        }elseif($this->cookie->isCookieExist()){
            return $this->getCookie();
        }
    }

    public function isLogged() 
    {
        if($this->session->isSessionExist() || $this->cookie->isCookieExist()){
            $this->logged = true;
        }else{
            $this->logged = false;
        }
        return $this->logged;
    }
    
    public function logout()
    {
        $this->session->destroySession();
        $this->cookie->destroyCookie();
    }
}
