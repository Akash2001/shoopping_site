<?php
function createDb(){
    $server="localhost";
    $username="root";
    $password="";
    $dbname="shopping_site";

    $con=new mysqli($server,$username,$password);


    if($con->connect_errno)
    {
         echo"ERROR WHILE CONNECTING TO THE DATABASE !".$con->connect_error;
         exit();
    }else{
        $sql="CREATE DATABASE IF NOT EXISTS $dbname";

        if($con->query($sql)){
            $con= new mysqli($server,$username,$password,$dbname);

            $sql="create table if not exists users
            (
               fname varchar(30) not null,
               mname varchar(30) not null,
               lname varchar(30) not null,
               email varchar(100) not null,
               password varchar(30) not null,
               primary key(email)
            );";

            if($con->query($sql)){
                $sql="create table if not exists mobiles(
                    id int AUTO_INCREMENT,
                    name varchar(30) not null,
                    price numeric(6,2) not null,
                    description varchar(1000) not null,
                    imageName varchar(40) not null,
                    primary key(id)
                 );";
                 if($con->query($sql)){
                     $sql="create table if not exists mobile_cart
                     (
                         email varchar(50) not null,
                         id int not null
                     );";
                     if($con->query($sql)){
                         return $con;
                     }else{
                         echo "Error in craeating mobile_carrt table";
                     }

                 
                 }else{
                     echo "Error in creating mobiles table";
                 }
            }else{
                echo "Error in creating users table";
            }
        }else{
            echo "Error in creating database";
        }
    }
}
?>