<?php  

class MailSender 
{
	private static $email;
	
	public static function sendMail($mail, $msg, $replyUser = null, $theme = "Nova Senha!") 
    {
        
        self::$email = new Email($mail, $theme, $msg, null, $replyUser);

        if(self::$email->send()) {
            return true;
        } 

        Message::error('Erro ao enviar email!');
    }
}