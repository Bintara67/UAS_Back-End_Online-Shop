<?php
class ProductsModel {
    private $db;

    public function __construct($dbConnection) {
        $this->db = $dbConnection;
    }

    // Mendapatkan semua produk dengan paginasi
    public function getAllProducts($limit = 10, $offset = 0) {
        $query = "SELECT * FROM products LIMIT :limit OFFSET :offset";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Mendapatkan produk berdasarkan ID
    public function getProductById($id) {
        $query = "SELECT * FROM products WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Menambahkan produk baru
    public function addProduct($productData) {
        $query = "INSERT INTO products (name, description, price) VALUES (:name, :description, :price)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':name', $productData['name'], PDO::PARAM_STR);
        $stmt->bindParam(':description', $productData['description'], PDO::PARAM_STR);
        $stmt->bindParam(':price', $productData['price'], PDO::PARAM_STR);
        $stmt->execute();
        return $this->db->lastInsertId();
    }

    // Memperbarui produk
    public function updateProduct($id, $productData) {
        $query = "UPDATE products SET name = :name, description = :description, price = :price WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':name', $productData['name'], PDO::PARAM_STR);
        $stmt->bindParam(':description', $productData['description'], PDO::PARAM_STR);
        $stmt->bindParam(':price', $productData['price'], PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->rowCount();
    }

    // Menghapus produk
    public function deleteProduct($id) {
        $query = "DELETE FROM products WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->rowCount();
    }

    // Mencari produk berdasarkan nama
    public function searchProducts($searchTerm) {
        $query = "SELECT * FROM products WHERE name LIKE :searchTerm";
        $stmt = $this->db->prepare($query);
        $searchTerm = "%$searchTerm%";
        $stmt->bindParam(':searchTerm', $searchTerm, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}