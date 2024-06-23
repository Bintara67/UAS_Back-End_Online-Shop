<?php
require_once 'models/ProductsModel.php';

class ProductsService {
    private $productsModel;

    public function __construct($dbConnection) {
        $this->productsModel = new ProductsModel($dbConnection);
    }

    // Mendapatkan semua produk dengan paginasi
    public function getAllProducts($limit = 10, $offset = 0) {
        try {
            return $this->productsModel->getAllProducts($limit, $offset);
        } catch (Exception $e) {
            throw new Exception("Error fetching all products: " . $e->getMessage());
        }
    }

    // Mendapatkan produk berdasarkan ID
    public function getProductById($id) {
        try {
            $product = $this->productsModel->getProductById($id);
            if (!$product) {
                throw new Exception("No product found with ID $id");
            }
            return $product;
        } catch (Exception $e) {
            throw new Exception("Error fetching product by ID: " . $e->getMessage());
        }
    }

    // Menambahkan produk baru
    public function addProduct($productData) {
        if (!$this->validateProductData($productData)) {
            throw new Exception("Invalid product data provided");
        }
        try {
            $productId = $this->productsModel->addProduct($productData);
            return $productId;
        } catch (Exception $e) {
            throw new Exception("Error adding product: " . $e->getMessage());
        }
    }

    // Memperbarui produk
    public function updateProduct($id, $productData) {
        if (!$this->validateProductData($productData, true)) {
            throw new Exception("Invalid product data provided for update");
        }
        try {
            $updatedRows = $this->productsModel->updateProduct($id, $productData);
            return $updatedRows > 0;
        } catch (Exception $e) {
            throw new Exception("Error updating product: " . $e->getMessage());
        }
    }

    // Menghapus produk
    public function deleteProduct($id) {
        try {
            $deletedRows = $this->productsModel->deleteProduct($id);
            return $deletedRows > 0;
        } catch (Exception $e) {
            throw new Exception("Error deleting product: " . $e->getMessage());
        }
    }

    // Mencari produk berdasarkan nama
    public function searchProducts($searchTerm) {
        try {
            return $this->productsModel->searchProducts($searchTerm);
        } catch (Exception $e) {
            throw new Exception("Error searching products: " . $e->getMessage());
        }
    }

    // Validasi data produk
    private function validateProductData($data, $isUpdate = false) {
        if ($isUpdate && empty($data['id'])) {
            return false;
        }
        return !empty($data['name']) && !empty($data['description']) && isset($data['price']);
    }
}