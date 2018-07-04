<?php

class Controller 
{
    public function __construct() 
    {

        include 'config.php';
        $this->config = $config;
        $this->view = new View();
    }

    public function route($query = null) {
        $class = null;
        $this->query = $query;
        if ($this->query) {
            $this->query = explode('/', $this->query);
            $class_name = mb_convert_case($this->query[0], MB_CASE_TITLE, 'UTF-8');
            if (count($this->query) > 1) {
                $method = $this->query[1];
            } else {
                $method = null;
            }
            $param = (count($this->query) > 2) ? $this->query[2] : null;
            if (class_exists($class_name)) {
                $class = new $class_name;
                if ($class instanceof Controller) {
                    if (method_exists($class, $method)) {
                        if ($param) {
                            $class->$method($param);
                        } else {
                            $class->$method();
                        }
                    } else {
                        if ($method === null or $method === "") {
                            if(method_exists($class, "index")){
                                $class->index();
                            } else {
                                $this->view->index(); 
                            }
                        } else {
                            $class = new Error404();
                            $class->error();
                       }
                    }
                }
            }
        }
        if ($this->query === null) {
            $class = new $this->config->defaultClass;
            $class->index();
        } elseif (!$class) {
            $class = new Error404();
            $class->error();            
        }
    }
    
    protected function reload()
    {
        header('Location: '.$_SERVER['HTTP_REFERER']);
    }


    protected function location($location = null)
    {

        if($location == null) {
            $location = 'Admin';
        }

        header('Location: http://localhost/PopCulture/app/'.$location);
    } 

    protected function sendMail($mail, $msg, $replyUser = null, $theme = "Nova Senha!") 
    {
        
        //var_dump($msg);
        $mail = new Email($mail, $theme, $msg, null, $replyUser);
        if($mail->send()) {
            return true;
        } else {
            return false;
        }

    }

    protected function indexInput(array $indexForm, $excep = null)
    {
        $index = [];

        if(!$indexForm) {
            die;
        }   

        if($excep) {
            foreach ($indexForm as $key => $value) {
                
                if($key !== $excep){
                    $index [$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_STRING); 
                } 

                $index[$excep] = filter_input(INPUT_POST, $excep);
            }

            return $index;
            die;
        }

        foreach ($indexForm as $key => $value) {
             $index [$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_STRING);
        }

        return $index;
    }  


}


