<?php
require_once 'services/ProductsService.php';

class ProductsController {
    private $productsService;

    public function __construct($dbConnection) {
        $productsModel = new ProductsModel($dbConnection);
        $this->productsService = new ProductsService($productsModel);
    }

    public function getAllProducts($limit = 10, $offset = 0) {
        try {
            return $this->productsService->getAllProducts($limit, $offset);
        } catch (Exception $e) {
            throw new Exception("Error fetching all products: " . $e->getMessage());
        }
    }

    public function getProductById($id) {
        try {
            return $this->productsService->getProductById($id);
        } catch (Exception $e) {
            throw new Exception("Error fetching product by ID: " . $e->getMessage());
        }
    }

    public function addProduct($productData) {
        try {
            return $this->productsService->addProduct($productData);
        } catch (Exception $e) {
            throw new Exception("Error adding product: " . $e->getMessage());
        }
    }

    public function updateProduct($id, $productData) {
        try {
            return $this->productsService->updateProduct($id, $productData);
        } catch (Exception $e) {
            throw new Exception("Error updating product: " . $e->getMessage());
        }
    }

    public function deleteProduct($id) {
        try {
            return $this->productsService->deleteProduct($id);
        } catch (Exception $e) {
            throw new Exception("Error deleting product: " . $e->getMessage());
        }
    }

    public function searchProducts($searchTerm) {
        try {
            return $this->productsService->searchProducts($searchTerm);
        } catch (Exception $e) {
            throw new Exception("Error searching products: " . $e->getMessage());
        }
    }
}