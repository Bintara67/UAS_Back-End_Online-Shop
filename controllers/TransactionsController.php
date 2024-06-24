<?php
require_once 'services/TransactionsService.php';
require_once 'models/TransactionsModel.php';
class TransactionsController {
    private $transactionsService;

    public function __construct($dbConnection) {
        $transactionsModel = new TransactionsModel($dbConnection);
        $this->transactionsService = new TransactionsService($transactionsModel);
    }

    public function getAllTransactions($limit = 10, $offset = 0, $filter = []) {
        try {
            $transactions = $this->transactionsService->getAllTransactions($limit, $offset, $filter);
            return $transactions;
        } catch (Exception $e) {
            throw new Exception("Error deleting product: " . $e->getMessage());
        }
    }

    public function getTransactionById($transactionId) {
        try {
            $transaction = $this->transactionsService->getTransactionById($transactionId);
            return $transaction;
        } catch (Exception $e) {
            throw new Exception("Error deleting product: " . $e->getMessage());
        }
    }

    public function addTransaction($transactionData) {
        try {
            $transactionId = $this->transactionsService->addTransaction($transactionData);
            return $transactionId;
        } catch (Exception $e) {
            throw new Exception("Error deleting product: " . $e->getMessage());
        }
    }

// Menambahkan method updateTransaction ke dalam class TransactionsController
public function updateTransaction($transactionId, $updatedData) {
    try {
        return $this->transactionsService->updateTransaction($transactionId, $updatedData);
    } catch (Exception $e) {
        throw new Exception("Error deleting product: " . $e->getMessage());
    }
}

    public function deleteTransaction($transactionId) {
        try {
            return $this->transactionsService->deleteTransaction($transactionId);
        } catch (Exception $e) {
            throw new Exception("Error deleting product: " . $e->getMessage());
        }
    }
}