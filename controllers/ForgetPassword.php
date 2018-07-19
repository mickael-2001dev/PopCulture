<?php  

class ForgetPassword extends Controller
{
	
	public function __construct()
	{
		parent::__construct();
        $this->view->setTemplate('admin');
        $this->login = new Login();	
	}

	public function index() 
	{
	
         $this->view->load('forgot-password'); 
       
	}

    public function sendMyTempPassword()
    {
        $httpResponse = false;

        $index = Form::indexInput($_POST);
        $newPass = Form::tempPasswordGenerator(8);

        if($this->login->updateTempPassword($index['user'], $index['email'], $newPass)) {
            $httpResponse = true;

            $email = $index['email'];
            $msg = 'A sua senha é: '.$newPass;
            MailSender::sendMail($email, $msg);


            print $httpResponse;
            die;
        }
                
        if(!$httpResponse) {
            Message::error('Erro ao enviar senha temporária!');
        }
         
    }

	/*private function indexInput(array $indexForm)
    {
        $index = [];

        foreach ($indexForm as $key => $value) {
            $index [$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_STRING);
        }

        return $index;
    }  

   

	/*private function sendMail($mail, $msg, $replyUser = null, $theme = "Nova Senha!") 
    {
     	//var_dump($msg);
        $mail = new Email($mail, $theme, $msg, null, $replyUser);
        if($mail->send()) {
            return true;
        } else {
            return false;
        }

    }*/

}