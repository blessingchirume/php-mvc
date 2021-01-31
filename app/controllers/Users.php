<?php

class Users extends Controller
{

    public function __construct()
    {
    }
    public function index($data=[])
    {
        $user = $this->model('User');

       //$user->name = $name;
        $data = json_decode(@file_get_contents('php://input'),true);
        $this->view('Users/index',$data);
        
    }
    // get user login details //
    public function UserLogin($username = '', $password = '')
    {
        $mysqli = new mysqli('localhost', 'root', '', 'foundation');
        $data   = [];
        $count  = 0;

        if ($mysqli) {
            $sql = "select * from users where U_Username='$username' and U_Password='$password'";

            if ($result = $mysqli->query($sql)) {
                while ($row = $result->fetch_assoc()) {
                    $data = $row;
                    $count++;
                }
                echo json_encode($data);
            } else {
                echo json_encode($mysqli->error);
            }
        }
    }
    // get all users from the database //
    public function GetAllUsers()
    {
        $mysqli = new mysqli('localhost', 'root', '', 'foundation');
        $data   = [];
        $count  = 0;

        if ($mysqli) {
            $sql = "select * from users";

            if ($result = $mysqli->query($sql)) {
                while ($row = $result->fetch_assoc()) {
                    $data[$count] = $row;
                    $count++;
                    //echo json_encode($data);
                }

                echo json_encode($data);
            } else {
                echo json_encode($mysqli->error);
            }
        }
    }
    // verify if user is member before adding //
    public function VerifyUser($name = '', $surname = '')
    {
        $mysqli = new mysqli('localhost', 'root', '', 'foundation');
        $data   = [];
        $count  = 0;

        if ($mysqli) {
            $sql = "select * from members where name='$name' and surname='$surname'";

            if ($result = $mysqli->query($sql)) {
                while ($row = $result->fetch_assoc()) {
                    $data = $row;
                    $count++;
                }
                echo json_encode($data);
            } else {
                echo json_encode($mysqli->error);
            }
        }
    }
    // adding a new member to the database //
    public function createNewUser($data=[])
    {        
        ModelConnect::Create('users');
    }

    public function getName($name)
    {
        echo "my name is " .$name ;
    }

}
