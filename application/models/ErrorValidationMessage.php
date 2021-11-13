<?php 

class ValidationsEnum extends CI_Model{
    private $isError;
    private $errorMessage;

    public function __construct($isError, $errorMessage){
        $this->isError = $isError;
        $this->errorMessage = $errorMessage;
    }

    public function getIsError(){
        return $this->isError;
    }

    public function getErrorMessage(){
        return $this->errorMessage;
    }
    
}