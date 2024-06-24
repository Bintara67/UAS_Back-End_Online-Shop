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
            // Return transactions
        } catch (Exception $e) {
            // Handle exception
        }
    }

    public function getTransactionById($transactionId) {
        try {
            $transaction = $this->transactionsService->getTransactionById($transactionId);
            // Return transaction
        } catch (Exception $e) {
            // Handle exception
        }
    }

    public function addTransaction($transactionData) {
        try {
            $transactionId = $this->transactionsService->addTransaction($transactionData);
            // Return transactionId
        } catch (Exception $e) {
            // Handle exception
        }
    }

// Menambahkan method updateTransaction ke dalam class TransactionsController
public function updateTransaction($transactionId, $updatedData) {
    try {
        $result = $this->transactionsService->updateTransaction($transactionId, $updatedData);
        // Return result
    } catch (Exception $e) {
        // Handle exception
    }
}

    public function deleteTransaction($transactionId) {
        try {
            $result = $this->transactionsService->deleteTransaction($transactionId);
            // Return result
        } catch (Exception $e) {
            // Handle exception
        }
    }
}