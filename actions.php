<?php
$DB_HOST        = "localhost";
$DB_USER        = "david";
$DB_PASSWORD    = "123123";
$DB_NAME        = "contacts";

$tblContacts = 'contacts';

$pdo = new PDO('mysql:host='.$DB_HOST.';dbname='.$DB_NAME.';charset=utf8mb4', $DB_USER, $DB_PASSWORD);

$name           = $_POST['name'];
$company_name   = $_POST['company_name'];
$email          = $_POST['email'];
$phone          = $_POST['phone'];
$skype          = $_POST['skype'];
$region         = $_POST['region'];
$is_subscribe   = $_POST['is_subscribe'];
$updated_at = date('Y-m-d H:i:s');


$stmt = $pdo->prepare("INSERT INTO `{$tblContacts}` SET
						  `name` = :u_name,
						  `company_name` = :company_name,
						  `email` = :email,
						  `phone` = :phone,
						  `skype` = :skype,
						  `region` = :region,
						  `is_subscribe` = :is_subscribe,
						  `updated_at` = :updated_at
						  ");
$insert = $stmt->execute(array(
    ":u_name" => $name,
    ":company_name" => $company_name,
    ":email" => $email,
    ":phone" => $phone,
    ":skype" => $skype,
    ":region" => $region,
    ":is_subscribe" => $is_subscribe,
    ":updated_at" => $updated_at
));

if ($insert) {
    $output['success'] = true;
    echo json_encode($output);
    exit;

} else {
    $output['success'] = false;
    $output['msg'] = 'Database error occurred';
    echo json_encode($output);
    exit;

}