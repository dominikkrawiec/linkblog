<?php

include('Controller.php');

class Redirectcontroller extends Controller {
    private $conn;

    public function __construct($linkId = false){
        $this->conn = $this->DbConnect();
    }

    public function getSingleLinkById($linkId){
        $sql = "SELECT * from link WHERE id = $linkId";
        $singleLink = $this->getData($this->conn, $sql, 1);

        return $this->redirectToExternal($singleLink);
    }

    public function redirectToExternal($singleLink){

        while($row = mysqli_fetch_array($singleLink)) {
            $externalLink = $row['url'];
        }

        if($externalLink != NULL){
            header("Location: ".$externalLink,TRUE,301);
        } else return false;

        return true;
        
    }
}


?>