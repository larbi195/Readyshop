<?php

class User {
    
    // unused variable
    static private $table = "users";
    /**
     * Les propriétés de la classe User reflètent les colonnes de la base de donnée (table users)
     */
    public $id;
    public $fullname;
    public $email;
    private $password;
    public $created_at;
    public $last_login_ip;
    public $last_login;
    
    
    function __construct($array_data) {
        foreach($array_data as $key => $value) {
            if (property_exists($this, $key)) {
                $this->$key = $value; 
            }  
        }
    }
    
    function setPassword($clearPassword) {
        /*
        ===> solution A: utiliser hash()
        
        $this->password = hash('sha256', $clearPassword);
        
        */
        /*
        ===> solution B: utiliser password_hash et password_verify
        
        $this->password = password_hash($clearPassword, PASSWORD_BCRYPT);
        
        */
    }
    
    function verifPassword($clearPassword) {
        /*
        solution A:
        
        return hash('sha256', $clearPassword) === $this->password;
        */
        /*
        solution B:
        
        return password_verify($clearPassword, $this->password);
        */
    }
    
    function save() {
        global $pdo;
        
        $stmh = $pdo->prepare("UPDATE users SET email = :email, password = :password, fullname = :fullname, last_login = :last_login, last_login_ip = :last_login_ip WHERE id = :id");
        $stmh->execute([
            "email"=> $this->email,
            "password" => $this->password,
            "fullname" => $this->fullname,
            "last_login" => $this->last_login,
            "last_login_ip" => $this->last_login_ip,
            "id" => $this->id
        ]);
    }
    
    function create($data) {
        global $pdo;
        
        $stmh = $pdo->prepare("INSERT INTO users (email, password, fullname, last_login, last_login_ip) VALUES(:email, :password, :fullname, :last_login, :last_login_ip)");
        $stmh->execute([
            "email"=> $this->email,
            "password" => $this->password,
            "fullname" => $this->fullname,
            "last_login" => $this->last_login,
            "last_login_ip" => $this->last_login_ip
        ]);
        
        return $pdo->lastInsertId();
    }
    
    static function getById($id) {
        global $pdo;
        
        $stmh = $pdo->prepare("SELECT * FROM users WHERE id = ?");
        $stmh->execute([$id]);
        
        $data = $stmh->fetch();
        if ($data) {
            return new User($data);
        }
        return false;
    }
}
