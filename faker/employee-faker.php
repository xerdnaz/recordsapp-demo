<?php

    require('vendor/autoload.php');
    require_once('config\config.php');
    require_once('config\db.php');
    

    $faker = Faker\Factory::create('en_PH');
    for ($i = 1; $i <= 200; $i++) {

        $lastname = mysqli_real_escape_string($conn, $faker->lastname);
        $firstname = mysqli_real_escape_string($conn, $faker->firstname);
        $officeid = mysqli_real_escape_string($conn, $faker->numberBetween($min = 1, $max = 10));
        $address = mysqli_real_escape_string($conn, $faker->optional($weight=.9, $default='')->streetAddress);

        $sql = "INSERT INTO record_app.employee(lastname, firstname, office_id, address) VALUES ('$lastname','$firstname','$officeid', '$address')";
        mysqli_query($conn, $sql);
    }   

?>