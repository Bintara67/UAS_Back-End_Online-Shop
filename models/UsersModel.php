<?php
class UsersModel {
    private $db;
    private $hashCost = 12;

    public function __construct($database) {
        $this->db = $database;
    }

    private function hashPassword($password) {
        return password_hash($password, PASSWORD_BCRYPT, ['cost' => $this->hashCost]);
    }

    private function verifyPassword($password, $hash) {
        return password_verify($password, $hash);
    }

    public function getUserById($id) {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function getUserByEmail($email) {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function getAllUsers() {
        $result = $this->db->query("SELECT * FROM users");
        $users = [];
        while ($row = $result->fetch_assoc()) {
            $users[] = $row;
        }
        return $users;
    }

    public function addUser($name, $email, $password) {
        $passwordHash = $this->hashPassword($password);
        $stmt = $this->db->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $name, $email, $passwordHash);
        $stmt->execute();
        return $stmt->insert_id;
    }

    public function updateUser($id, $name, $email, $password) {
        $passwordHash = $this->hashPassword($password);
        $stmt = $this->db->prepare("UPDATE users SET name = ?, email = ?, password = ? WHERE id = ?");
        $stmt->bind_param("sssi", $name, $email, $passwordHash, $id);
        $stmt->execute();
        return $stmt->affected_rows;
    }

    public function deleteUser($id) {
        $stmt = $this->db->prepare("DELETE FROM users WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->affected_rows;
    }

    public function validateUser($email, $password) {
        $user = $this->getUserByEmail($email);
        if ($user && $this->verifyPassword($password, $user['password'])) {
            return $user; // Return user data if password is correct
        }
        return false; // Return false if user not found or password is incorrect
    }
}
?>