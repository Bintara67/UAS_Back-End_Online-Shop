<?php
include_once 'models/UsersModel.php';

class UsersService
{
    private $conn;
    private $usersModel;

    public function __construct(UsersModel $usersmodel)
    {
        $this->usersModel = $usersmodel;
    }

    public function fetchAllUsers()
    {
        // $users = new UsersModel($this->conn);
        // $stmt = $users->readAllUsers();
        $stmt = $this->usersModel->readAllUsers();
        $users_array = array();
        $users_array["records"] = array();
        while ($rows = $stmt->fetch(PDO::FETCH_ASSOC))
        {
            extract($rows);
            $user_item = array (
                "id" => $id,
                "first_name" => $first_name,
                "last_name" => $last_name,
                "username" => $username,
                "email" => $email
            );
            array_push($users_array["records"], $user_item);
        }

        return $users_array;
    }
    public function addUser($data)
    {
        try {
            if (empty($data['first_name']) || empty($data['last_name']) || empty($data['username']) || empty($data['email'])) {
                throw new Exception("Data pengguna tidak lengkap");
            }
            $existingUser = $this->usersModel->getUserByUsernameOrEmail($data['username'], $data['email']);
            if (!empty($existingUser)) {
                throw new Exception("Pengguna dengan nama pengguna atau email tersebut sudah ada");
            }
            $stmt = $this->usersModel->insertUser($data);
            if ($stmt) {
                return true;
            } else {
                throw new Exception("Gagal menambahkan pengguna baru");
            }
        } catch (Exception $e) {
            throw new Exception("Error adding user: " . $e->getMessage());
        }
    }

    public function updateUser($id, $data)
    {
        try {
            if (empty($id)) {
                throw new Exception("ID pengguna tidak ditemukan");
            }
            $existingUser = $this->usersModel->getUserById($id);
            if (empty($existingUser)) {
                throw new Exception("Pengguna tidak ditemukan");
            }
            $stmt = $this->usersModel->updateUser($id, $data['first_name'], $data['last_name'], $data['email']);
            if ($stmt) {
                return true;
            } else {
                throw new Exception("Gagal mengupdate pengguna");
            }
        } catch (Exception $e) {
            throw new Exception("Error updating user: " . $e->getMessage());
        }
    }

    public function deleteUser($id)
    {
        try {
            if (empty($id)) {
                throw new Exception("ID pengguna tidak ditemukan");
            }
            $existingUser = $this->usersModel->getUserById($id);
            if (empty($existingUser)) {
                throw new Exception("Pengguna tidak ditemukan");
            }
            $stmt = $this->usersModel->deleteUser($id);
            if ($stmt) {
                return true;
            } else {
                throw new Exception("Gagal menghapus pengguna");
            }
        } catch (Exception $e) {
            throw new Exception("Error deleting user: " . $e->getMessage());
        }
    }

}