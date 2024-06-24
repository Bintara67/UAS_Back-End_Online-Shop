<?php
require_once 'services/StocksService.php';

class StocksController {
    private $stocksService;

    public function __construct($dbConnection) {
        $this->stocksService = new StocksService($dbConnection);
    }

    public function getAllStocks($limit = 10, $offset = 0) {
        try {
            return $this->stocksService->getAllStocks($limit, $offset);
        } catch (Exception $e) {
            throw new Exception("Error getting all stocks: " . $e->getMessage());
        }
    }

    public function getStockByProductId($productId) {
        try {
            if (empty($productId)) {
                throw new InvalidArgumentException("Product ID is required");
            }
            return $this->stocksService->getStockByProductId($productId);
        } catch (Exception $e) {
            throw new Exception("Error getting stock by product ID: " . $e->getMessage());
        }
    }

    public function addStock($productId, $quantity) {
        try {
            if ($quantity <= 0) {
                throw new InvalidArgumentException("Quantity must be greater than zero");
            }
            return $this->stocksService->addStock($productId, $quantity);
        } catch (Exception $e) {
            throw new Exception("Error adding stock: " . $e->getMessage());
        }
    }

    public function updateStock($productId, $quantity) {
        try {
            if ($quantity < 0) {
                throw new InvalidArgumentException("Quantity cannot be negative");
            }
            return $this->stocksService->updateStock($productId, $quantity);
        } catch (Exception $e) {
            throw new Exception("Error updating stock: " . $e->getMessage());
        }
    }

    public function deleteStock($productId) {
        try {
            return $this->stocksService->deleteStock($productId);
        } catch (Exception $e) {
            throw new Exception("Error deleting stock: " . $e->getMessage());
        }
    }
}