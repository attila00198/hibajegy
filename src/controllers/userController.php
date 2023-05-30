<?php

class UserController
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function createUser($username, $fullname, $email, $password)
    {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        // Felhasználó létrehozása az adatbázisban
        // Itt lehetőséged van validálni az adatokat és ellenőrizni, hogy a felhasználónév vagy az email már létezik-e az adatbázisban
        // Például:
        if ($this->usernameExists($username)) {
            $_SESSION["msg"] = [
                "category" => "danger",
                "message" => "A megadott felhasználó név már foglalt."
            ];
            return false;
        }
        if ($this->emailExists($email)) {
            $_SESSION["msg"] = [
                "category" => "danger",
                "message" => "A megadott Email cím már foglalt."
            ];
            return false;
        }

        if (strlen($password) < 8) {
            $_SESSION["msg"] = [
                "category" => "danger",
                "message" => "A jelszónak legalább 8 karakter hosszúnak kell lennie."
            ];
            return false;
        }

        // Adatbázisba történő beszúrás
        $query = "INSERT INTO users (name, fullname, email, passwd) VALUES (:name, :fullname, :email, :passwd)";
        $stmt = $this->db->prepare($query);
        if ($stmt) {
            $stmt->execute(
                [
                    ":name" => $username,
                    ":fullname" => $fullname,
                    ":email" => $email,
                    ":passwd" => $hashedPassword,
                ]
            );

            if ($stmt->rowCount() > 0) {
                $_SESSION["msg"] = [
                    "category" => "info",
                    "message" => "Felhasználó sikeresen létrehozva."
                ];
            } else {
                $_SESSION["msg"] = [
                    "category" => "danger",
                    "message" => "Hiba történt a felhasználó létrehozása során."
                ];
            }
        } else {
            $_SESSION["msg"] = [
                "category" => "danger",
                "message" => "Hiba történt a felhasználó létrehozása során."
            ];
        }
    }

    public function loginUser($username, $password)
    {

        $query = "SELECT * FROM users WHERE name = ?";
        $stmt = $this->db->prepare($query);
        if($stmt) {
            $stmt->execute([$username]);

            if(!$this->usernameExists($username)) {
                $_SESSION["msg"] = [
                    "category" => "danger",
                    "message" => "Nincs regisztrált felhasználó ezen a néven."
                ];
                return false;
            }

            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            if(password_verify($password, $user["passwd"])) {
                $_SESSION["msg"] = [
                    "category" => "danger",
                    "message" => "Hibás Jelszó"
                ];
                return false;
            }
            
            $_SESSION["user"] = $user;
            if($_SESSION["user"]["isAdmin"] == false) {
                $ticketController = new TicketController($this->db);
                $_SESSION["user"]["activeTickets"] = $ticketController->getActiveTickets($_SESSION["user"]["id"]);
                $_SESSION["user"]["insctiveTickets"]= $ticketController->getInactiveTickets($_SESSION["user"]["id"]);
                $_SESSION["tickets"] = $ticketController->getTicketsByUserID($_SESSION["user"]["id"]);
            }
            
        } else {
            $_SESSION["msg"] = [
                "category" => "danger",
                "message" => "Hiba történt a bejelentkezés során."
            ];
            return false;
        }
    }

    public function getUser($userId)
    {
        // Felhasználó lekérése az adatbázisból az azonosító alapján
        $query = "SELECT * FROM users WHERE u_id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        $result = $stmt->get_result();

        // Lekérdezés eredményének ellenőrzése
        if ($result->num_rows === 1) {
            $user = $result->fetch_assoc();
            return $user; // Lekérdezés sikeres
        }

        return null; // Lekérdezés sikertelen (nem talált felhasználót)
    }

    public function updateUser($userId, $username, $email, $password)
    {
        // Felhasználó frissítése az adatbázisban az azonosító alapján
        $query = "UPDATE users SET name = ?, fullname, email = ?, passwd = ?, u_isAdmin WHERE u_id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("sssi", $username, $email, $password, $userId);
        $stmt->execute();

        // Sikeres frissítés ellenőrzése
        if ($stmt->affected_rows === 1) {
            return true; // Sikeres frissítés
        }

        return false; // Sikertelen frissítés
    }

    public function deleteUser($userId)
    {
        // Felhasználó törlése az adatbázisból az azonosító alapján
        $query = "DELETE FROM users WHERE u_id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i", $userId);
        $stmt->execute();

        // Sikeres törlés ellenőrzése
        if ($stmt->affected_rows === 1) {
            return true; // Sikeres törlés
        }

        return false; // Sikertelen törlés
    }

    private function usernameExists($username)
    {
        $query = "SELECT * FROM users WHERE name=?";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$username]);
        if ($stmt->rowCount() > 0) {
            return true;
        }

        return false;
    }

    private function emailExists($email)
    {
        $query = "SELECT * FROM users WHERE email=?";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$email]);
        if ($stmt->rowCount() > 0) {
            return true;
        }

        return false;
    }
}
