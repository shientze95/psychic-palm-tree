<<?php
define('DB_HOST','localhost');
define('DB_NAME','assignment1');
define('DB_USER','root');
define('DB_PASSWORD','');

/*Create the connection to the MYSQL server*/
$con=mysql_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME) or die("Failed to connect to MySQL: " . mysql_error());

if(mysql_select_db(DB_NAME,$con))
{

}
else
{
    /*Creates the Database and tables in PHP*/
    $db = "CREATE DATABASE assignment1";
    $sq2 = "CREATE TABLE Customer (
    Customer_Email VARCHAR(30) PRIMARY KEY,
    Customer_Name VARCHAR(40) NOT NULL,
    Customer_Password VARCHAR(255) NOT NULL,
    Customer_PhoneNo INT(12)
    )";
    $sq3 ="CREATE TABLE booking(Gen_num int(255) AUTO_INCREMENT,Customer_email varchar(25),Customer_name varchar(25),Customer_num char(255),Unit_num int(255),Street_num int(255),
    Street_name varchar(25),suburb varchar(25),Des_suburb varchar(25),Pickup_date varchar(25),Pickup_time varchar(25)
    ,Gen_date varchar(25),Gen_time varchar(25),status char(255) Default 'Unassigned',Primary key(Gen_num),
    foreign key(Customer_email) references customer(Customer_Email));";
    /*Checks if databse query is true and connect to the databse. Afte that, the queries for the tables*/
    if (mysql_query($db,$con))
    {
        $connect_db = mysql_select_db(DB_NAME,$con) or die("Failed to connect to MySQL: " . mysql_error());
        //SQL SHOW THAT TABLE CREATED SUCCESFULLY
        mysql_query($sq2,$con);
        mysql_query($sq3,$con);
    }
}
 ?>
