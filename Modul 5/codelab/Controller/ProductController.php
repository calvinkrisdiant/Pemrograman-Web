<?php

namespace app\Controller;

// Include the correct file name: "ApiResponsesFormatter.php" instead of "ApiResponseFormatter.php"
include "codelab/Traits/ApiResponsesFormatter.php";
// Include the correct file name: "Product.php" instead of "Products.php"
include 'codelab/Models/Product.php';

use app\Traits\ApiResponseFormatter;
use codelab\Models\Product;
use codelab\Traits\ApiResponsesFormatter; // Correct the namespace

class ProductController
{
  // Use the correct trait name: "ApiResponsesFormatter" instead of "ApiResponseFormatter"
  use ApiResponseFormatter

  public function index()
  {
    $productModel = new Product();
    $response = $productModel->findAll();
    return $this->apiResponse(200, "success", $response);
  }

  public function getById($id)
  {
    $productModel = new Product();
    $response = $productModel->findById($id);
    return $this->apiResponse(200, "success", $response);
  }

  public function insert()
  {
    $jsonInput = file_get_contents('php://input');
    $inputData = json_decode($jsonInput, true);
    if (json_last_error()) {
      return $this->apiResponse(400, "error invalid input", null);
    }

    $productModel = new Product();
    $response = $productModel->create([
      "product_name" => $inputData['product_name']
    ]);

    return $this->apiResponse(200, "success", $response);
  }

  public function update($id)
  {
    $jsonInput = file_get_contents('php://input');
    $inputData = json_decode($jsonInput, true);

    if (json_last_error()) {
      return $this->apiResponse(400, "error invalid input", null);
    }

    $productModel = new Product();
    $response = $productModel->update([
      "product_name" => $inputData['product_name']
    ], $id);

    return $this->apiResponse(200, "success", $response);
  }

  public function delete($id)
  {
    $productModel = new Product();
    $response = $productModel->destroy($id);

    return $this->apiResponse(200, "success", $response);
  }
}
