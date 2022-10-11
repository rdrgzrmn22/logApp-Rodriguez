<?php
require('vendor/autoload.php');
require_once('../config/config.php');
require_once('../config/db.php');

$faker = Faker\Factory::create();


for ($i = 1; $i <= 20; $i++) {

    $fake_cc_type = mysqli_real_escape_string($conn, $faker->creditCardType);
    $fake_cc_number = mysqli_real_escape_string($conn, $faker->creditCardNumber);
    $fake_cc_exp_date = mysqli_real_escape_string($conn, $faker->creditCardExpirationDateString);
    $fake_uid_number =  mysqli_real_escape_string($conn, $faker->unique()->numberBetween($min = 1, $max = 100));

    $query = "INSERT INTO carddetail(creditCardType, creditCardNumber, creditCardExpirationDate, userIdNumber) VALUES('$fake_cc_type', '$fake_cc_number', '$fake_cc_exp_date', '$fake_uid_number')";
    // echo "$fake_uid_number\n";

    if (mysqli_query($conn, $query)) {
        echo "successfully inserted new data</br>";
    } else {
        echo "insert data unsuccessful</br>";
        echo 'ERROR: ' . mysqli_error($conn);
    }
}
