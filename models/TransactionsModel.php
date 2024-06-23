<?php
class TransactionsModel {
    private $db;

    public function __construct($dbConnection) {
        $this->db = $dbConnection;
    }

    // Mendapatkan semua transaksi dengan paginasi dan opsi filter
    public function getAllTransactions($limit = 10, $offset = 0, $filter = []) {
        $query = "SELECT * FROM transactions WHERE 1=1";
        $params = [];

        // Menambahkan filter berdasarkan status
        if (isset($filter['status'])) {
            $query .= " AND status = :status";
            $params[':status'] = $filter['status'];
        }

        // Menambahkan filter berdasarkan tanggal
        if (isset($filter['date_from']) && isset($filter['date_to'])) {
            $query .= " AND created_at BETWEEN :date_from AND :date_to";
            $params[':date_from'] = $filter['date_from'];
            $params[':date_to'] = $filter['date_to'];
        }

        $query .= " ORDER BY created_at DESC LIMIT :limit OFFSET :offset";
        $params[':limit'] = $limit;
        $params[':offset'] = $offset;

        $stmt = $this->db->prepare($query);
        foreach ($params as $key => &$val) {
            $stmt->bindParam($key, $val);
        }
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Mendapatkan transaksi berdasarkan ID dengan detailnya
    public function getTransactionById($transactionId) {
        $query = "SELECT t.*, td.product_id, td.quantity, td.price FROM transactions t
                  LEFT JOIN transaction_details td ON t.id = td.transaction_id
                  WHERE t.id = :transactionId";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':transactionId', $transactionId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Menambahkan transaksi baru dengan validasi dan logika bisnis
    public function addTransaction($transactionData) {
        try {
            $this->db->beginTransaction();

            // Validasi data transaksi
            if (empty($transactionData['user_id']) || empty($transactionData['items'])) {
                throw new Exception("Data transaksi tidak lengkap.");
            }

            $query = "INSERT INTO transactions (user_id, total_price, status) VALUES (:user_id, :total_price, :status)";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':user_id', $transactionData['user_id'], PDO::PARAM_INT);
            $stmt->bindParam(':total_price', $transactionData['total_price'], PDO::PARAM_STR);
            $stmt->bindParam(':status', $transactionData['status'], PDO::PARAM_STR);
            $stmt->execute();
            $transactionId = $this->db->lastInsertId();

            // Menambahkan detail transaksi
            foreach ($transactionData['items'] as $item) {
                if (empty($item['product_id']) || empty($item['quantity'])) {
                    throw new Exception("Detail produk tidak lengkap.");
                }
                $query = "INSERT INTO transaction_details (transaction_id, product_id, quantity, price) VALUES (:transaction_id, :product_id, :quantity, :price)";
                $stmt = $this->db->prepare($query);
                $stmt->bindParam(':transaction_id', $transactionId, PDO::PARAM_INT);
                $stmt->bindParam(':product_id', $item['product_id'], PDO::PARAM_INT);
                $stmt->bindParam(':quantity', $item['quantity'], PDO::PARAM_INT);
                $stmt->bindParam(':price', $item['price'], PDO::PARAM_STR);
                $stmt->execute();
            }

            $this->db->commit();
            return $transactionId;
        } catch (PDOException $e) {
            $this->db->rollBack();
            throw $e;
        } catch (Exception $e) {
            $this->db->rollBack();
            throw $e;
        }
    }

    // Menghapus transaksi dengan validasi
    public function deleteTransaction($transactionId) {
        try {
            $this->db->beginTransaction();
            $query = "DELETE FROM transaction_details WHERE transaction_id = :transactionId";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':transactionId', $transactionId, PDO::PARAM_INT);
            $stmt->execute();

            $query = "DELETE FROM transactions WHERE id = :transactionId";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':transactionId', $transactionId, PDO::PARAM_INT);
            $stmt->execute();

            $this->db->commit();
            return $stmt->rowCount();
        } catch (PDOException $e) {
            $this->db->rollBack();
            throw $e;
        }
    }
}