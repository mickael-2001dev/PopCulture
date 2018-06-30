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
            $indexes = $this->indexInput($_POST);

            if($indexes['user'] && $indexes['pass'] && $indexes['soma'])  {

            	if($indexes['soma'] != $_SESSION['soma']){
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
                $data['msg'] = "Preencha todos os campos!";
            }

        } else {
            $numbers = $this->numbersGenerator(1,20);
            $this->createSessionSoma($numbers);
        }

        if($this->login->isLogged()) {
            $this->reload();
        } else {
            $this->view->load('login', $data);
        }
       
        
    }

    public function logout()
    {
        $this->login->logout();
        header('location:' . $this->config->base_url . 'Admin');
    }  

    protected function indexInput(array $indexForm)
    {
        $index = [];

        foreach ($indexForm as $key => $value) {
            
            if($key == 'article'){
                $index['article'] = filter_input(INPUT_POST, 'article');
            } else {
                $index [$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_STRING);
            }

         

        }

        return $index;
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
        	
           


            $indexes = $this->indexInput($_POST);
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

	
    private function sendMail($mail, $msg, $replyUser = null, $theme = "Nova Senha!") 
    {
     	var_dump($msg);
        $mail = new Email($mail, $theme, $msg, null, $replyUser);
        if($mail->send()) {
            return true;
        } else {
            return false;
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
        $_SESSION['num1'] = $numbers['num1'];
        $_SESSION['num2'] = $numbers['num2'];
        $_SESSION['soma'] = $numbers['soma'];
    }
    
    protected function error(array $data){
        $this->view->load('error', $data);
    } 

    protected function success(array $data){
        $this->view->load('success', $data);
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


 /*$type_image = false;
        $dir = 'views/img/'.$image['name'];
        //var_dump($image);
        foreach($types as $type){
            if($image['type'] == $type){
               $type_image = true;
            }
        }
        //var_dump($dir);
        if($type_image){
            if(move_uploaded_file($image['tmp_name'], $dir)){
                if($this->imagem->insert($image['name'])){
                    return true;
                }
            } else {
                $data['msg'] = "Não foi possível realizar o upload de imagem!";
                $this->error($data);
            } 
        } else {
            $data['msg'] = "Extensão não suportada!";
            $this->error($data); 
        }*/