<?php

require_once "../restful.php";

class AppUser extends Restful
{
    private $conn;

    public $id;
    public $appName;
    public $os;
    public $createdAt;

    // Constructor with DB
    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function create()
    {
        $stmt = $this->conn->prepare("INSERT AppUser(id, appName, os, createdAt) VALUES(?, ?, ?, ?)");
        $stmt->bind_param("ssss", $this->id, $this->appName, $this->os, $this->createdAt);
        if($this->bearerValidation()) {
            if ($stmt->execute()) {
                $this->respond(true);
            } else {
                $this->respond(false);
            }
        } else {
            $this->respond(false);
        }
    }
    
}
