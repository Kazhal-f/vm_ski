<?php
/*
$db = mysqli_connect("localhost", "root", "");
$sql = "CREATE DATABASE IF NOT EXISTS vm_ski CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;";
mysqli_query($db, $sql);*/

$db = mysqli_connect("localhost", "root", "", "vm_ski");

/*
mysqli_query($db, "CREATE TABLE IF NOT EXISTS Person (
    id int(8) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    Fornavn varchar(128),
    Etternavn varchar(128),
    Adresse varchar(128),
    PostNr varchar(10), 
    Poststed varchar(28),
    TelefonNr varchar(16) );"
    );

mysqli_query($db, "CREATE TABLE IF NOT EXISTS Utover ( 
    utoverId int(8) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    personId int(8) DEFAULT NULL,
    FOREIGN KEY (personId) REFERENCES Person(id),
    nasjonalitet varchar(16) NOT NULL,
    ovelseId int(8)DEFAULT NULL,
    FOREIGN KEY (ovelseId) REFERENCES Ovelse(ovelseId)
    );");

mysqli_query($db, "CREATE TABLE IF NOT EXISTS Publikum ( 
    publikumId int(8) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    personId int(8) DEFAULT NULL,
    FOREIGN KEY (personId) REFERENCES Person(id),
    BilettType varchar(16) NOT NULL ,
    ovelseId int(8)DEFAULT NULL,
    FOREIGN KEY (ovelseId) REFERENCES Ovelse(ovelseId)
    );");

mysqli_query($db, "CREATE TABLE IF NOT EXISTS Ovelse (
    ovelseId int(8) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    ovelse varchar(28),
    dato varchar(10), 
    tid varchar(10),
    sted varchar(28)
    );   
    ");*/
?>