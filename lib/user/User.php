<?php

namespace Lib\User;


use App\Configuration\BaseConfiguration;
use Helper\Hash;
use System\DB;

class User
{
    private $connection;
    private $conf;

    public function __construct()
    {
        $this->connection = DB::connection();
        $this->conf = new BaseConfiguration();
    }

    public function enterUser($login, $password)
    {
        $hash = Hash::get();
        $user = $this->checkUserOriginal($login, $password);

        if($user)
        {
            $user_id = $user['id'];
            $user_role = $user['role'];

            $_SESSION['login'] = $login;
            $_SESSION['hash'] = $hash;
            $_SESSION['id'] = $user_id;
            $_SESSION['role'] = $user_role;

            $this->connection
//                ->prepare("UPDATE user SET hash = :hash WHERE login = :login")
//                ->execute(array('hash' => $hash, 'login' => $login));
                ->query("UPDATE user SET hash = '$hash' WHERE id = '$user_id'");
            return 1;
        }else{
            return 0;
        }
//        throw new \Exception("enter error");
    }

    public function addUser($login, $password, $mail)
    {
        $login  = htmlspecialchars($login);
        $password = md5(htmlspecialchars($password).$this->conf->get('sold'));
        $mail = htmlspecialchars($mail);

        if(!$this->checkUserInform('login', $login))
        {
            $this->connection
                ->prepare("INSERT INTO user (login, password, mail) VALUE (:login, :password, :mail, :role)")
                ->execute(array('login' => $login, 'password' => $password, 'mail' => $mail, 'role' => 'user'));
        }
//        throw new \Exception("enter error");
    }

    public function checkUserInform($line, $search)
    {
        $search  = htmlspecialchars($search);
        $data = DB::connection()
            ->query("SELECT * FROM user WHERE $line = '$search'")
            ->fetchAll(\PDO::FETCH_ASSOC);

        $res = ($data) ? true : false;
        return $res;
    }

    private function checkUserOriginal($login, $password)
    {
        $login  = htmlspecialchars($login);
        $password = md5(htmlspecialchars($password).$this->conf->get('sold'));
        $data = DB::connection()
            ->query("SELECT id, role FROM user WHERE login = '$login' AND password = '$password'")
            ->fetchAll(\PDO::FETCH_ASSOC);

        $res = ($data) ? $data[0] : false;
        return $res;
    }
}