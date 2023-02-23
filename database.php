<?php
class Database
{
    private $db_host;
    private $db_user;
    private $db_password;
    private $db_db;
    private $db_port;
    private $mysqli;
    public function __construct()
    {
        $this->mysqli_connect();
    }
    //method
    private function mysqli_connect()
    {
        $this->db_host = 'sql209.epizy.com';
        $this->db_user = 'epiz_31365402';
        $this->db_password = 'UqMmUZQCNCK2';
        $this->db_db = 'epiz_31365402_vtca';
        $this->db_port = 3306;
        $this->mysqli = @new mysqli(
            $this->db_host,
            $this->db_user,
            $this->db_password,
            $this->db_db,
            $this->db_port
        );
        if ($this->mysqli->connect_error) {
            echo 'Errno: ' . $this->mysqli->connect_errno;
            echo '<br>';
            echo 'Error: ' . $this->mysqli->connect_error;
            exit();
        }
        return $this->mysqli;
    }


    public function get_row($email)
    {
        $sql = "SELECT memberemail, memberpass FROM members WHERE memberemail = '$email' AND memberstatus=1";
        $result = $this->mysqli->query($sql);
        $row = $result->fetch_array(MYSQLI_NUM);
        return $row;
    }



    public function get_count($email)
    {
        $sql = "SELECT memberemail, memberpass FROM members WHERE memberemail = '$email' AND memberstatus=1 ";
        $result = $this->mysqli->query($sql);
        $count = $result->num_rows;
        return $count;
    }



    public function Insert($name, $email, $password, $i)
    {
        $sql = "INSERT INTO members(membername,memberemail,memberpass,memberstatus) VALUE('$name','$email','$password',$i)";
        $check = $this->mysqli->query($sql);
        return $check;
    }


    public function close()
    {
        $this->mysqli->close();
    }


    public function get_name($email)
    {
        $sql = "SELECT membername FROM members WHERE memberemail = '$email' AND memberstatus=1";
        $result = $this->mysqli->query($sql);
        $count = $result->num_rows;
        if ($count == 1) {
            $row = $result->fetch_assoc();
            $name = $row['membername'];
            return $name;
        }
    }
    public function del($memberid)
    {
        $sql = "UPDATE members SET memberstatus=0 WHERE memberid=$memberid";
        $check = $this->mysqli->query($sql);
        return $check;
    }


    public function edit($memberid)
    {
        if (isset($_POST["edit"])) {
            $membername = $_POST["name"];
            $memberpass = $_POST["password"];
            $pass = $_POST["password2"];
            $email = $_POST["email"];
            $checkpass = $_POST["checkpassword"];
            $password = password_hash($memberpass, PASSWORD_DEFAULT);
            $sql = "SELECT memberpass FROM members WHERE memberid=$memberid";
            $result = $this->mysqli->query($sql);
            $row = $result->fetch_array(MYSQLI_NUM);
            if ($memberpass == $pass) {
            }
            if (password_verify($checkpass, $row[0])) {
                if ($memberpass == $pass) {
                    $sql = "UPDATE members SET membername='$membername',memberpass='$password',memberemail='$email' WHERE memberid=$memberid";
                    $check = $this->mysqli->query($sql);
                }
                return $check;
            } else {
                $check = "Password mismatched";
                return $check;
            }
        }
    }

    public function get_member($memberid)
    {
        $sql = "SELECT membername,memberemail, memberpass FROM members WHERE memberid=$memberid";
        $result = $this->mysqli->query($sql);
        $row = $result->fetch_array(MYSQLI_NUM);
        return $row;
    }
}
