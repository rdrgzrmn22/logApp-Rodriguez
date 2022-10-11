<?php
require('../config/config.php');
require('../config/db.php');
require('vendor/autoload.php');
$faker = Faker\Factory::create();

for ($i = 0; $i < 100; $i++) {

    $fake_email = mysqli_real_escape_string($conn, $faker->companyEmail);
    $lname = mysqli_real_escape_string($conn, $faker->lastName);
    $fname = mysqli_real_escape_string($conn, $faker->firstName);
    $fake_userName = mysqli_real_escape_string($conn, $faker->userName);
    $fake_password = mysqli_real_escape_string($conn, $faker->password);


    $query = "INSERT INTO useraccount(email, lastname, firstname, userName, password) VALUES('$fake_email', '$lname', '$fname', '$fake_userName', '$fake_password')";

    if (mysqli_query($conn, $query)) {
        echo "email is: $fake_email</>";
        echo "lastname is: $lname</br>";
        echo "firstname is: $fname</br>";
        echo "username is: $fake_userName</br>";
        echo "password is: $fake_password</br>";
        echo "Successfully inserted new data</br></br>";
    } else {
        echo 'ERROR: ' . mysqli_error($conn);
    }
}
