<?php

define('DB_Conn', TRUE);

require_once '../DB/DBConn.php';


try {
    $query = "CREATE TABLE IF NOT EXISTS `app_user`(
`id` INT NOT NULL AUTO_INCREMENT,
 `Email` VARCHAR(100) NULL,
 `Password` VARCHAR(20) NULL,
 `IP_Address` VARCHAR(100) NULL,
 `Type` VARCHAR(10) NULL,
 Primary Key(`id`)
)";
    $conn->exec($query);
    echo "Table app_user created successfully!!";
} catch (PDOException $e) {
    echo $query . "<br>" . $e->getMessage();
}


//$query = "INSERT INTO app_user SET Email = 'vivek@ayamtech.in', Password = 'dev123456', Type = 'admin'";
//$r = $conn->prepare($query);
//$r->execute();
//if (!$r) {
//    echo "Admin Not Crated!!<br>";
//} else {
//    echo 'Admin Created Successfully';
//}
//


try {
    $query = "CREATE TABLE IF NOT EXISTS `Enquiery`(
`id` INT NOT NULL AUTO_INCREMENT, 
  `Name` VARCHAR(100) NULL ,
  `Email` VARCHAR(100) NULL ,
  `Phone` VARCHAR(20) NULL ,
  `Message` VARCHAR(1000) NULL ,
  `Time` VARCHAR(20) NULL ,
  `Date` VARCHAR(20) NULL ,
  Primary Key(`id`)
)";
    $conn->exec($query);
    echo "Table Enquiery created successfully!!<br>";
} catch (PDOException $e) {
    echo $query . "<br>" . $e->getMessage();
}

try {
    $query = "CREATE TABLE IF NOT EXISTS `About`(
`id` INT NOT NULL AUTO_INCREMENT, 
  `Title` VARCHAR(200) NULL ,
  `Description` VARCHAR(10000) NULL ,
  `IP_Address` VARCHAR(100) NULL ,
  `Status` VARCHAR(10) NULL ,
  `DateTime` datetime NULL ,
  Primary Key(`id`)
)";
    $conn->exec($query);
    echo "Table About created successfully!!<br>";
} catch (PDOException $e) {
    echo $query . "<br>" . $e->getMessage();
}

try {
    $table = "Services";
    $query = "CREATE TABLE IF NOT EXISTS `$table`(
`id` INT NOT NULL AUTO_INCREMENT, 
  `Title` VARCHAR(1000) NULL ,
  `Files` VARCHAR(100) NULL ,
  `Description` VARCHAR(10000) NULL ,
  `IP_Address` VARCHAR(100) NULL ,
  `Status` VARCHAR(10) NULL ,
  `DateTime` datetime NULL ,
  Primary Key(`id`)
)";
    $conn->exec($query);
    echo "Table $table created successfully!!<br>";
} catch (PDOException $e) {
    echo $query . "<br>" . $e->getMessage();
}
try {
    $table = "Images";
    $query = "CREATE TABLE IF NOT EXISTS `$table`(
`id` INT NOT NULL AUTO_INCREMENT, 
  `Category` VARCHAR(100) NULL ,
  `Title` VARCHAR(1000) NULL ,
  `Files` VARCHAR(100) NULL ,
  `Description` VARCHAR(5000) NULL ,
  `Img_Status` VARCHAR(50) NULL ,
  `IP_Address` VARCHAR(100) NULL ,
  `Status` VARCHAR(10) NULL ,
  `DateTime` datetime NULL ,
  Primary Key(`id`)
)";
    $conn->exec($query);
    echo "Table $table created successfully!!<br>";
} catch (PDOException $e) {
    echo $query . "<br>" . $e->getMessage();
}
//try {
//    $table = "Member";
//    $query = "CREATE TABLE IF NOT EXISTS `$table`(
//`id` INT NOT NULL AUTO_INCREMENT, 
//  `Name` VARCHAR(50) NULL ,
//  `Designation` VARCHAR(20) NULL ,
//  `Facebook` VARCHAR(100) NULL ,
//  `Twitter` VARCHAR(100) NULL ,
//  `Linkedin` VARCHAR(100) NULL ,
//  `Files` VARCHAR(100) NULL ,
//  `IP_Address` VARCHAR(100) NULL ,
//  `Status` VARCHAR(10) NULL ,
//  `DateTime` datetime NULL ,
//  Primary Key(`id`)
//)";
//    $conn->exec($query);
//    echo "Table $table created successfully!!<br>";
//} catch (PDOException $e) {
//    echo $query . "<br>" . $e->getMessage();
//}
//try {
//    $table = "Appointment";
//    $query = "CREATE TABLE IF NOT EXISTS `$table`(
//`id` INT NOT NULL AUTO_INCREMENT, 
//  `Name` VARCHAR(100) NULL ,
//  `Address` VARCHAR(300) NULL ,
//  `City` VARCHAR(100) NULL ,
//  `Mobile` VARCHAR(20) NULL ,
//  `Telephone` VARCHAR(20) NULL ,
//  `Email` VARCHAR(100) NULL ,
//  `Message` VARCHAR(1000) NULL ,
//  `IP_Address` VARCHAR(100) NULL ,
//  `Status` VARCHAR(10) NULL ,
//  `DateTime` datetime NULL ,
//  Primary Key(`id`)
//)";
//    $conn->exec($query);
//    echo "Table $table created successfully!!<br>";
//} catch (PDOException $e) {
//    echo $query . "<br>" . $e->getMessage();
//}
try {
    $table = "Contact";
    $query = "CREATE TABLE IF NOT EXISTS `$table`(
`id` INT NOT NULL AUTO_INCREMENT, 
  `Address` VARCHAR(300) NULL ,
  `Mobile` VARCHAR(100) NULL ,
  `Telephone` VARCHAR(20) NULL ,
  `Email` VARCHAR(100) NULL ,
  `Facebook` VARCHAR(100) NULL ,
  `Twitter` VARCHAR(100) NULL ,
  `Linkedin` VARCHAR(100) NULL ,
  `IP_Address` VARCHAR(100) NULL ,
  `Status` VARCHAR(10) NULL ,
  `DateTime` datetime NULL ,
  Primary Key(`id`)
)";
    $conn->exec($query);
    echo "Table $table created successfully!!<br>";
} catch (PDOException $e) {
    echo $query . "<br>" . $e->getMessage();
}
try {
    $table = "Testimonial";
    $query = "CREATE TABLE IF NOT EXISTS `$table`(
`id` INT NOT NULL AUTO_INCREMENT, 
  `Name` VARCHAR(100) NULL ,
  `City` VARCHAR(50) NULL ,
  `Files` VARCHAR(100) NULL ,
  `Description` VARCHAR(1000) NULL ,
  `IP_Address` VARCHAR(100) NULL ,
  `Status` VARCHAR(10) NULL ,
  `DateTime` datetime NULL ,
  Primary Key(`id`)
)";
    $conn->exec($query);
    echo "Table $table created successfully!!<br>";
} catch (PDOException $e) {
    echo $query . "<br>" . $e->getMessage();
}
try {
    $table = "Category";
    $query = "CREATE TABLE IF NOT EXISTS `$table`(
`id` INT NOT NULL AUTO_INCREMENT, 
  `Category` VARCHAR(100) NULL ,
  `IP_Address` VARCHAR(100) NULL ,
  `Status` VARCHAR(10) NULL ,
  `DateTime` datetime NULL ,
  Primary Key(`id`)
)";
    $conn->exec($query);
    echo "Table $table created successfully!!<br>";
} catch (PDOException $e) {
    echo $query . "<br>" . $e->getMessage();
}
?>