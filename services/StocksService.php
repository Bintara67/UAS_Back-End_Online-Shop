<?php
require_once 'models/StocksModel.php';

class StocksService {
    private $stocksModel;

    public function __construct($dbConnection) {
        $this->stocksModel = new StocksModel($dbConnection);
    }

    // Mendapatkan semua stok dengan penanganan error
    public function getAllStocks($limit = 10, $offset = 0) {
        try {
            return $this->stocksModel->getAllStocks($limit, $offset);
        } catch (Exception $e) {
            throw new Exception("Error getting all stocks: " . $e->getMessage());
        }
    }

    // Mendapatkan stok berdasarkan ID produk dengan validasi
    public function getStockByProductId($productId) {
        try {
            if (empty($productId)) {
                throw new InvalidArgumentException("Product ID is required");
            }
            return $this->stocksModel->getStockByProductId($productId);
        } catch (Exception $e) {
            throw new Exception("Error getting stock by product ID: " . $e->getMessage());
        }
    }

    // Menambahkan stok baru dengan transaksi
    public function addStock($productId, $quantity) {
        try {
            if ($quantity <= 0) {
                throw new InvalidArgumentException("Quantity must be greater than zero");
            }
            return $this->stocksModel->addStock($productId, $quantity);
        } catch (Exception $e) {
            throw new Exception("Error adding stock: " . $e->getMessage());
        }
    }

    // Memperbarui stok dengan pengecekan kuantitas
    public function updateStock($productId, $quantity) {
        try {
            if ($quantity < 0) {
                throw new InvalidArgumentException("Quantity cannot be negative");
            }
            return $this->stocksModel->updateStock($productId, $quantity);
        } catch (Exception $e) {
            throw new Exception("Error updating stock: " . $e->getMessage());
        }
    }

    // Menghapus stok dengan penanganan error
    public function deleteStock($productId) {
        try {
            return $this->stocksModel->deleteStock($productId);
        } catch (Exception $e) {
            throw new Exception("Error deleting stock: " . $e->getMessage());
        }
    }
}