<?php
// include_once '../config/database.php'; 
include_once 'models/UsersModel.php';
include_once 'services/UsersService.php';

class UsersController 
{
    private $usersService;

    public function __construct($conn)
    {
        $usersModel = new UsersModel(($conn));
        $this->usersService = new UsersService($usersModel);
    }

    public function readUsers()
    {
        $users = $this->usersService->fetchAllUsers();
        return json_encode($users);
    }

    public function addUser ()
    {
        $data = json_decode(file_get_contents("php:input"), true);
        $result = $this->usersService->addUser($data);
        if($result)
        {
            return json_encode(array("message"=>"Insert success"));
        }
        else
        {
            return json_encode(array("message"=>"Insert not success"));
        }
    }

    public function updateUser()
    {
        $data = json_decode(file_get_contents("php:input"), true);
        $result = $this->usersService->updateUser($data['id'], $data);
        if($result)
        {
            return json_encode(array("message"=>"Update success"));
        }
        else
        {
            return json_encode(array("message"=>"Update not success"));
        }
    }

    public function deleteUser()
    {
        $data = json_decode(file_get_contents("php:input"), true);
        $result = $this->usersService->deleteUser($data['id']);
        if($result)
        {
            return json_encode(array("message"=>"Delete success"));
        }
        else
        {
            return json_encode(array("message"=>"Delete not success"));
        }
    }
}