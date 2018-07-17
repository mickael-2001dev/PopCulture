<?php 
class Admin extends Controller
{

    protected $login;
    private $user;
    private $imagem;

    public function __construct() 
    {
        parent::__construct();
        $this->view->setTemplate('admin');
        $this->login = new Login();
        $this->model = new UserModel();
        $this->imagem = new ImagemModel();
  

        if(!$this->login->isLogged()) {
            $this->doLogin();
            die;
        }
     
   

    }
        
    public function index()
    {
        $this->view->load('header');
        $this->view->load('nav');
        $this->view->load('index');
        $this->view->load('footer');
    } 

    public function login() {
        $this->view->load('login2');

      
    }

    public function doLogin()
    {
       

        if($_POST) {
            $indexes = Form::indexInput($_POST);

            $this->verifySessionCaptcha($indexes);
              
           
            if($this->login->verifyLogin(new User($indexes['user'], $indexes['pass']))) {

                // if($indexes['continue']) {
                    // $this->login->createCookies();
                // }

                $this->login->createSession();

                $this->verifyThePasswords($indexes);

                print $this->login->isLogged();        
            } else {
                Message::error('Usuário ou senha incorretos!');
            }

        } else {
            $numbers = $this->numbersGenerator(1, 20);
            Session::createSessionByArray($numbers);
            $this->login();
        }

       
       
        
    }

    public function logout()
    {
        $this->login->logout();
        header('location:' . $this->config->base_url . 'home');
    }  

    
    public function changePassword($id) 
    {
    
        $data = null;  
        $work = null;
        //$this->login->logout();

        $user = $this->model->getUserById($id);
       
        $user = $user->getUsername();
      

        if(filter_input(INPUT_POST,'update')) {
            //$this->view->load('update-password', $data);  
            
           


            $indexes = Form::indexInput($_POST);
            if($indexes['new-pass'] == $indexes['repeat-pass']){

                $validatePassUser = new User($user, $indexes['new-pass']);

                if($validatePassUser->validatePassword()){
                    if($this->login->updatePassword($user, $indexes['new-pass'])) {
                        $this->location();
                    } else {
                        $data['msg'] = "Não foi possivel atualizar a senha!";
                    }
                } else {
                    $data['msg'] = "A senha precisa possuir 4 letras e 4 números!"; 
                }
            } else {
               $data['msg'] = "Senhas não conferem!";
            }
        }

        if(!$work) {
            $this->view->load('update-password', $data);
        } 
        
    }
    
    private function numbersGenerator($begin, $end) 
    {
        $number1 = rand($begin, $end);
        $number2 = rand($begin, $end);
        $soma = $number1 + $number2;

        $numbers = [
            'num1'=>$number1,
            'num2'=>$number2,
            'soma'=>$soma
        ];

        return $numbers;
    }


    private function verifySessionCaptcha($indexes)
    {
        if($indexes['soma'] != Session::getSession('soma')){
            $numbers = $this->numbersGenerator(1,20);
            //Session::createSessionByArray($numbers);
            Message::error('Soma incorreta, calcule novamente');
            die;      
        }
    }

    private function verifyThePasswords($indexes) 
    {


        if($this->login->verifyPassword($indexes['user'])) {
                           
            $user =  $this->model->getUserByLogin($indexes['user']);
      
            print $user->getId();
            die;
        }

        if($this->login->verifyNewPassword($indexes['user'], $indexes['pass'])){

            $user =  $this->model->getUserByLogin($indexes['user']);
        
            print $user->getId();
            die;
                                
        }
    }

    
  
    protected function saveImagem($image)
    {
        $types = ['image/jpeg', 'image/png', 'image/gif'];

        $insert = true;
        $upload = new Image($image, $types);

        if($upload->saveImage() !== true) {
            $insert = false;
            $data['msg'] = $upload->saveImage();
            $this->error($data); 
        }

        if($insert) {
            if($this->imagem->insert($upload->getName())){
                return true;
            }
        } 

    }

}

/*
class Admin extends Controller
{

    protected $login;
    private $user;
    private $imagem;

    public function __construct() 
    {
        parent::__construct();
        $this->view->setTemplate('admin');
        $this->login = new Login();
        $this->model = new UserModel();
        $this->imagem = new ImagemModel();
  

        if(!$this->login->isLogged()) {
            $this->login();
            die;
        }
     
   

    }
        
    public function index()
    {
        $this->view->load('header');
        $this->view->load('nav');
        $this->view->load('index');
        $this->view->load('footer');
    } 

    public function login()
    {
        $data = null;
       

        if(filter_input(INPUT_POST,'login')) {
            $indexes = Form::indexInput($_POST);

           
              
            	if($indexes['soma'] != Session::getSession('soma')){
                    $data['msg'] = "Captcha Incorreto! Tente novamente!";
                    $numbers = $this->numbersGenerator(1,20);
                    $this->createSessionSoma($numbers);
                  
                } else {

                    if($this->login->verifyLogin(new User($indexes['user'], $indexes['pass']))) {

                        if($indexes['continue']) {
                            $this->login->createCookies();
                        }


                        $this->login->createSession();


                        if($this->login->verifyPassword($indexes['user'])) {
                           
                            $user =  $this->model->getUserByLogin($indexes['user']);

                       
                            $this->location('Admin/changePassword/'.$user->getId());
                            die;
                        }

                        if($this->login->verifyNewPassword($indexes['user'], $indexes['pass'])){

                            $user =  $this->model->getUserByLogin($indexes['user']);

                       
                            $this->location('Admin/changePassword/'.$user->getId());
                            die;
                                
                        }
                        
                 } else {
                        $data['msg'] = "Login ou Senha invalidos!";
                    }

                }

               
      
         

        } else {
            $numbers = $this->numbersGenerator(1,20);
            $this->createSessionSoma($numbers);
        }

        if($this->login->isLogged()) {
            $this->reload();
        } else {
            $this->view->load('login2', $data);
        }
       
        
    }

    public function logout()
    {
        $this->login->logout();
        header('location:' . $this->config->base_url . 'Admin');
    }  


	public function changePassword($id) 
    {
	
        $data = null;  
        $work = null;
        //$this->login->logout();

        $user = $this->model->getUserById($id);
       
        $user = $user->getUsername();
      

        if(filter_input(INPUT_POST,'update')) {
        	//$this->view->load('update-password', $data);	
        	
           


            $indexes = Form::indexInput($_POST);
            if($indexes['new-pass'] == $indexes['repeat-pass']){

                $validatePassUser = new User($user, $indexes['new-pass']);

            	if($validatePassUser->validatePassword()){
		            if($this->login->updatePassword($user, $indexes['new-pass'])) {
		            	$this->location();
			        } else {
			            $data['msg'] = "Não foi possivel atualizar a senha!";
				    }
				} else {
					$data['msg'] = "A senha precisa possuir 4 letras e 4 números!";	
				}
	        } else {
	           $data['msg'] = "Senhas não conferem!";
	        }
        }

        if(!$work) {
        	$this->view->load('update-password', $data);
        } 
       	
	}
	
    private function numbersGenerator($begin, $end) 
    {
        $number1 = rand($begin, $end);
        $number2 = rand($begin, $end);
        $soma = $number1 + $number2;

        $numbers = [
            'num1'=>$number1,
            'num2'=>$number2,
            'soma'=>$soma
        ];

        return $numbers;
    }

    private function createSessionSoma($numbers) {
        Session::createSessionByArray($numbers);
    }
    
  
    protected function saveImagem($image)
    {
        $types = ['image/jpeg', 'image/png', 'image/gif'];

        $insert = true;
        $upload = new Image($image, $types);

        if($upload->saveImage() !== true) {
            $insert = false;
            $data['msg'] = $upload->saveImage();
            $this->error($data); 
        }

        if($insert) {
            if($this->imagem->insert($upload->getName())){
                return true;
            }
        } 

    }

    */



























































    