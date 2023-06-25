<?php
class UserManager extends DbManager
{
    public function getByUsername($username)
    {
        $query = $this->bdd->prepare(
            "SELECT * FROM user WHERE username = :username"
        );
        $query->bindParam("username", $username);

        $query->execute();
        $res = $query->fetch();

        $user = null;
        if ($res != false) {
            $user = new User(
                $res["id"],
                $res["username"],
                $res["password"]
            );
        }

        return $user;
    }

    public function add(User $user)
    {
        $username = $user->getUsername();
        $password = $user->getPassword();

        $query = $this->bdd->prepare(
            "INSERT INTO user (username, password) VALUES 
                    (:username,:password)"
        );

        $query->bindParam("username", $username);
        $query->bindParam('password', $password);

        $query->execute();
    }


}
