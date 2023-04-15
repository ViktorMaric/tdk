<?php

require_once "../restful.php";

class Appear extends Restful
{
    private $conn;

    public $id;
    public $openDate;
    public $dismissDate;
    public $lastTappedButton;
    public $isPurchased;
    public $userID;
    public $paywallVersion;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function create()
    {
        $stmt = $this->conn->prepare("INSERT Appear(id, userID, openDate, dismissDate, lastTappedButton, isPurchased, paywallVersion) VALUES(?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssss", $this->id, $this->userID, $this->openDate, $this->dismissDate, $this->lastTappedButton, $this->isPurchased, $this->paywallVersion);
        if ($this->bearerValidation()) {
            if ($stmt->execute()) {
                $this->respond(true);
            } else {
                // echo "problem with execution: ".$stmt->error;
                $this->respond(false);
            }
        } else {
            // echo "problem with token";
            $this->respond(false);
        }
    }
}
