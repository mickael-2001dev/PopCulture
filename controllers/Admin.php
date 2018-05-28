<?php 

class Admin extends Controller
{

    protected $login;

    public function __construct() 
    {
        parent::__construct();
        $this->view->setTemplate('admin');
        $this->login = new Login();
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
                    $this->reload();
                    die;
                }

                if($this->login->verifyLogin(new User($indexes['user'], $indexes['pass']))) {

                    if($indexes['continue']) {
                        $this->login->createCookies();
                    }


                    $this->login->createSession();


                    if($this->login->verifyPassword($indexes['user'])) {
                    
                        $this->location('Admin/changePassword');
                        die;
                    }

                    if($this->login->verifyNewPassword($indexes['user'], $indexes['pass'])){

                        $this->location('Admin/changePassword');
                        die;    
                            
                    }
                        
                } else {
                    $data['msg'] = "Login ou Senha invalidos!";
                }
      
            } else {
                $data['msg'] = "Preencha todos os campos!";
            }

        } else {
            $numbers = $this->numbesrGenerator(1,20);
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


	public function changePassword() 
    {
	
        $data = null;  
        $work = null;

        if(filter_input(INPUT_POST,'update')) {
        	//$this->view->load('update-password', $data);	
        	
            $indexes = $this->indexInput($_POST);
            if($indexes['new-pass'] == $indexes['repeat-pass']){
            	if($this->validatePassword($indexes['new-pass'])){
		            if($this->login->updatePassword($indexes['user'], $indexes['new-pass'])) {
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

	private function validatePassword($pass)
	{
		$return = false;

		$letters = preg_replace("/.*?([A-z]*).*?/i", "$1", $pass);
		$numbers = preg_replace("/.*?([0-9]*).*?/", "$1", $pass);

		$totalLetters = strlen($letters);
		$totalNumbers = strlen($numbers);

		$total = $totalLetters + $totalNumbers;

		if($total >= 4) {
			$return = true;
		}

		return $return;
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
	
    private function numbesrGenerator($begin, $end) 
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
}
