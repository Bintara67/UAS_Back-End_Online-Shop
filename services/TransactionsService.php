<?php
require_once 'models/TransactionsModel.php';

class TransactionsService {
    private $transactionsModel;

    public function __construct($dbConnection) {
        $this->transactionsModel = new TransactionsModel($dbConnection);
    }

    // Mendapatkan semua transaksi dengan penanganan error
    public function getAllTransactions($limit = 10, $offset = 0, $filter = []) {
        try {
            $transactions = $this->transactionsModel->getAllTransactions($limit, $offset, $filter);
            return $transactions;
        } catch (Exception $e) {
            throw new Exception("Error fetching transactions: " . $e->getMessage());
        }
    }

    // Mendapatkan transaksi berdasarkan ID dengan penanganan error
    public function getTransactionById($transactionId) {
        try {
            $transaction = $this->transactionsModel->getTransactionById($transactionId);
            if (empty($transaction)) {
                throw new Exception("Transaction not found");
            }
            return $transaction;
        } catch (Exception $e) {
            throw new Exception("Error fetching transaction by ID: " . $e->getMessage());
        }
    }

    // Menambahkan transaksi baru dengan validasi dan penanganan error
    public function addTransaction($transactionData) {
        try {
            if (empty($transactionData['user_id']) || empty($transactionData['items'])) {
                throw new Exception("Incomplete transaction data");
            }
            $transactionId = $this->transactionsModel->addTransaction($transactionData);
            return $transactionId;
        } catch (Exception $e) {
            throw new Exception("Error adding transaction: " . $e->getMessage());
        }
    }

        // Menyunting transaksi dengan validasi dan penanganan error
    public function updateTransaction($transactionId, $updatedData) {
        try {
            $result = $this->transactionsModel->updateTransaction($transactionId, $updatedData);
            return $result;
        } catch (Exception $e) {
            throw new Exception("Error updating transaction: " . $e->getMessage());
        }
    }

    // Menghapus transaksi dengan penanganan error
    public function deleteTransaction($transactionId) {
        try {
            $result = $this->transactionsModel->deleteTransaction($transactionId);
            if ($result == 0) {
                throw new Exception("No transaction found to delete");
            }
            return $result;
        } catch (Exception $e) {
            throw new Exception("Error deleting transaction: " . $e->getMessage());
        }
    }
}