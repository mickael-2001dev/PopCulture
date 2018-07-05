<?php  

class Form 
{

	public static function indexInput(array $indexForm, $excep = null)
    {
        $index = [];

        if(!$indexForm) {
        	Message::error("Nada foi enviado!");
            return false;
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


	public static function verifyInputIndexes($indexes) 
    {
        $fieldIsOk = true;

        foreach ($indexes as $key => $value) {
            if($value === "") {
                $fieldIsOk = false;
            }
        }

        if(!$fieldIsOk) {
            Message::error("Campos Vazios!");
            return false;
            die;
        }

        return true;
    }

}