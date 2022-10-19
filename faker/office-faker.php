<?php

    require('vendor/autoload.php');
    require_once('config\config.php');
    require_once('config\db.php');
    

    $faker = Faker\Factory::create('en_PH');
    for ($i = 1; $i <= 200; $i++) {

        $companyname = mysqli_real_escape_string($conn, $faker->company);
        $contactnum = mysqli_real_escape_string($conn, $faker->phoneNumber);
        $email = mysqli_real_escape_string($conn, $faker->email);
        $address = mysqli_real_escape_string($conn, $faker->optional($weight=.9, $default='')->streetAddress);
        $city = mysqli_real_escape_string($conn, $faker->optional($weight=.9, $default='')->city);
        $country = mysqli_real_escape_string($conn, $faker->optional($weight=.9, $default='')->country);
        $postal = mysqli_real_escape_string($conn, $faker->postcode);


        $sql = "INSERT INTO record_app.office(name, contactnum, email, address, city, country, postal) VALUES ('$companyname','$contactnum','$email','$address','$city', '$country', '$postal')";
        mysqli_query($conn, $sql);
    }   

?>