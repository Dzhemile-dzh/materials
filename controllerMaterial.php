<?php

include './db/connection.php';
include './model/Material.php';

$name = filter_var($_POST['name'], FILTER_SANITIZE_SPECIAL_CHARS);
$description = filter_var($_POST['description'], FILTER_SANITIZE_SPECIAL_CHARS);
$unit = filter_var($_POST['unit'], FILTER_SANITIZE_SPECIAL_CHARS);
$quantity = filter_var($_POST['quantity'], FILTER_VALIDATE_FLOAT);
$price = filter_var($_POST['price'], FILTER_VALIDATE_FLOAT);
$document = $_FILES['document'];

if (!$quantity || !$price || !$name || !$description || !$unit) {
    echo json_encode([
        'success' => false,
        'message' => "Invalid input.Make sure they are valid floating point numbers."
    ]);
    exit;
}

$target_dir = "documents/";
$target_file = $target_dir . basename($_FILES["document"]["name"]);

if (move_uploaded_file($_FILES["document"]["tmp_name"], $target_file)) {
    $document = $target_file;
    $material = [
        'name' => $name,
        'description' => $description,
        'quantity' => $quantity,
        'unit' => $unit,
        'price' => $price,
        'document' => $document,
    ];

    $existingData = file_get_contents('data.json');
    $existingArray = json_decode($existingData, true);
    $existingArray[] = $material;
    file_put_contents('data.json', json_encode($existingArray));
    
    $response = Material::addMaterial($conn, $name, $description, $quantity, $unit, $price, $document);
    echo json_encode($response);
} else {
    echo json_encode([
        'success' => false,
        'message' => "Sorry, there was an error uploading your file."
    ]);
}

?>
