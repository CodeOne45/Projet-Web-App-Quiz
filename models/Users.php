<?php

class Users
{
    protected function getUser($email)
    {
        $sql = "SELECT * FROM users WHERE email = '$email';";
        $stmt = Database::getInstance();

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
        $sql = "INSERT INTO users (username,email,pwd) VALUES ('$username','$email','$pwd');"; //TODO use bind
        $stmt = Database::getInstance();

        if ($stmt->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $stmt->error; //TODO change echo
        }

        $stmt->close();
    }
}
