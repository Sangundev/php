<?php // IDEA:
require_once("helpers.php");
class User 
{
    private $userName;
    private $userEmail;
    private $userID;
    private $status;
    
    public function __construct($newUser, $email)
    {
        $this->userName = $newUser;
        $this->userEmail = $email;
        $this->userID = GetNextUserID();
        $this->status = 1;
    }
    public function __destruct()
    {
        $this->userName = NULL;
        $this->userEmail = NULL;
        $this->status = NULL;
        $this->userID = NULL;
    }
    public function GetUserName()
    {
        return $this->userName;
    }
    public function GetUserEmail()
    {
        return $this->userEmail;
    }
    public function GetUserID()
    {
        return $this->userName;
    }
    public function GetStatus()
    {
        return $this->status;
    }
    public function SetUerName($input){
        if($input > 1 || $input < 0){
            return false;
    }
    $this->status = $input;
    return true;

    }
}
?>