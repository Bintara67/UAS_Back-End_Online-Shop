<?php
class StocksModel {
    private $db;

    public function __construct($dbConnection) {
        $this->db = $dbConnection;
    }

    // Mendapatkan semua stok dengan paginasi
    public function getAllStocks($limit = 10, $offset = 0) {
        $query = "SELECT * FROM stock LIMIT :limit OFFSET :offset";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Mendapatkan stok berdasarkan ID produk
    public function getStockByProductId($productId) {
        $query = "SELECT * FROM stock WHERE product_id = :productId";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':productId', $productId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Menambahkan stok baru
    public function addStock($productId, $quantity) {
        try {
            $this->db->beginTransaction();
            $query = "INSERT INTO stock (product_id, quantity) VALUES (:productId, :quantity)";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':productId', $productId, PDO::PARAM_INT);
            $stmt->bindParam(':quantity', $quantity, PDO::PARAM_INT);
            $stmt->execute();
            $this->db->commit();
            return $this->db->lastInsertId();
        } catch (PDOException $e) {
            $this->db->rollBack();
            throw $e;
        }
    }

    // Memperbarui stok
    public function updateStock($productId, $quantity) {
        try {
            $this->db->beginTransaction();
            $query = "UPDATE stock SET quantity = :quantity WHERE product_id = :productId";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':productId', $productId, PDO::PARAM_INT);
            $stmt->bindParam(':quantity', $quantity, PDO::PARAM_INT);
            $stmt->execute();
            $this->db->commit();
            return $stmt->rowCount();
        } catch (PDOException $e) {
            $this->db->rollBack();
            throw $e;
        }
    }

    // Menghapus stok
    public function deleteStock($productId) {
        try {
            $this->db->beginTransaction();
            $query = "DELETE FROM stock WHERE product_id = :productId";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':productId', $productId, PDO::PARAM_INT);
            $stmt->execute();
            $this->db->commit();
            return $stmt->rowCount();
        } catch (PDOException $e) {
            $this->db->rollBack();
            throw $e;
        }
    }
}