<?php

include_once __DIR__ . "/../autoload.php";

class User extends CRUD{
    public function registerUser($username, $email, $password){
        //sanitise inputs to prevent XSS attacks
        $username = Sanitiser::sanitise($username);
        $email = Sanitiser::sanitise($email);
        $password = Sanitiser::sanitise($password);

        if(!empty($username) && !empty($email) && !empty($password)){
            //Search the database to see if a user exists with the same name or email
            $search_query = "SELECT * FROM users WHERE username = :username AND email = :email";
            $bind_parameters = [":username" => $username, ":email" => $email];
            $result = $this->fetchAllRecords($query, $bind_parameters);

            if(!$result > 0){
                //hash the password before inserting into database
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);

                $insert_query = "INSERT INTO users (username, email, password) VALUES (:username, :email, :password)";
                $bind_parameters = [":username" => $username, ":email" => $email, ":password" => $hashed_password];
                $result = $this->insertRecord($insert_query, $bind_parameters);

                if($result){
                    Header("Location: login.php");
                    echo "<script>alert('Registration Successful, You may now login!'</script>";
                }

            } else{
                Header("Location: index.php");
                echo "<script>alert('An account with this username or email already exists'</script>";
            }
        } else{
            Header("Location: index.php");
            echo "<script>alert('All fields must be filled for registering an account'</script>";
        }
    }
}
?>