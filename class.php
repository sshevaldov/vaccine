<?php
class Auth
{
    public function __construct($login,  $password)
    {
        $this->login = $login;
        $this->password = $password;
    }

    public function teset($a)
    {
        echo $a->login;
    }
}
$a = new Auth('qwe', '123');
echo $a->password;

