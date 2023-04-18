<?php
    $firstname=$_POST['firstname'];
    $lastname=$_POST['lastname'];
    $idnumber=$_POST['idnumber'];
    $email=$_POST['email'];
    $contactnumber=$_POST['contactnumber'];
    $department=$_POST['department'];

    $conn = new mysqli('localhost','root','','registration');
    if($conn->connect_error){
        die('Connection Failed : '.$conn->connect_error);
    }else{
        $stmt=$conn->prepare("insert into registration(firstname, lastname, idnumber, email, contactnumber, department)
        values(?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssis",$firstname, $lastname, $idnumber, $email, $contactnumber, $department);
        $stmt->execute();
        header('location:regsuc.html');
        
        $stmt->close();
        $conn->close();
    }
?>