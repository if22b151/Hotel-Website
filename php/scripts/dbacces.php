<?php
    function connect () {

        $host = "localhost";
        $user = "root";
        $password = "hotel-website";
        $dbName = "web_hotel";
    
        $mysqlGateway = new mysqli($host, $user, $password, $dbName);
    
        if($mysqlGateway->connect_error){
            print($mysqlGateway->connect_error);
            return false;
        }
    
        return $mysqlGateway;
    }
    /*
        function getData($mysqlGateway){
            $sql = "SELECT * FROM `DATA´";
            $result = $mysqlGateway->query($sql);
    
            $datalist = [];
            while($data = $result->fetch_assoc()){
                $datalist[] = $result;
            }
        }

*/

?>