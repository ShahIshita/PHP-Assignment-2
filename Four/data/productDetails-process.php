<?php
try {
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        throw new Exception("Invalid request!");
    }

    $productName = $_POST['productName'];
    $productPrice = $_POST['productPrice'];
    $productImage = $_FILES['productImage'];
    $productDescription = $_POST['productDescription'];
    $productStatus = $_POST['productStatus'];

    $productData = [
        'productName' => $productName,
        'productPrice' => $productPrice,
        'productImage' => time() . '-' . $productImage['name'],
        'productDescription' => $productDescription,
        'productStatus' => $productStatus,
    ];

    $uploadDirectory = '../uploads/';
    if (!file_exists($uploadDirectory) && !mkdir($uploadDirectory, 0777, true)) {
        throw new Exception("Failed to create upload directory!");
    }


    $targetFilePath = $uploadDirectory . $productData['productImage'];
    if (!move_uploaded_file($productImage['tmp_name'], $targetFilePath)) {
        throw new Exception("Failed to move uploaded file!");
    }

    $dataFolder = '../history';
    if (!file_exists($dataFolder) && !mkdir($dataFolder, 0777, true)) {
        throw new Exception("Failed to create data folder!");
    }

    $filename = $dataFolder . '/products-list.json';
    if (!file_exists($filename)) {
        if (!file_put_contents($filename, '[]')) {
            throw new Exception("Failed to create products.json file!");
        }
    }

    $existingData = json_decode(file_get_contents($filename), true);

    $existingData[] = $productData;

    if (!file_put_contents($filename, json_encode($existingData, JSON_PRETTY_PRINT))) {
        throw new Exception("Failed to write to products.json file!");
    }

    http_response_code(201);
    echo json_encode([
        "message" => "Product added successfully",
        "status" => 201,
        "productData" => $productData,
    ]);

} catch (Exception $e) {
    http_response_code(500);
    echo "Error: " . $e->getMessage();
}
?>


