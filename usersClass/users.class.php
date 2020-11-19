<?php
include_once 'data.class.php';

class Users extends Data
{
    protected function getUser($email)
    {
        $sql = "SELECT * FROM users WHERE email = '$email';";
        $stmt = $this->connect();

        $results = $stmt->query($sql);
        $row = $results->fetch_assoc(); //list

        $results->free();
        $stmt->close();

        if ($row === NULL) {
            return false;
        }
        echo $row["email"];

        return $row;
    }

    protected function setUser($username, $email, $pwd)
    {
        //$hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (username,email,pwd) VALUES ('$username','$email','$pwd');"; //Placeholders values
        $stmt = $this->connect();
        if ($stmt->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $stmt->error;
        }

        $stmt->close();
    }
}
