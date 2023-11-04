<?php

class Database {

    private $db = null;
    public $error = false;

    public function __construct($host, $username, $pass, $db) {
        try {
            $this->db = new mysqli($host, $username, $pass, $db);
            $this->db->set_charset("utf8");
        } catch (Exception $exc) {
            $this->error = true;
            echo '<p>Az adatbázis nem elérhető!</p>';
            exit();
        }
    }

    public function login($name, $pass) {
        $stmt = $this->db->prepare('SELECT * FROM users WHERE users.username LIKE ?;');
        $stmt->bind_param("s", $name);
        if ($stmt->execute()) {
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();
            if ($pass == $row['password']) {
                $_SESSION['user'] = $row;
                $_SESSION['login'] = true;
            } else {
                $_SESSION['username'] = '';
                $_SESSION['login'] = false;
            }
            $result->free_result();
            header("Location:index.php");
        }
        return false;
    }
    public function register($vasarlo_neve, $emailcim, $userid, $password, $username) {
        $stmt = $this->db->prepare("INSERT INTO `users`(`userid`, `vasarlo_neve`, `emailcim`, `username`, `password`) VALUES (NULL,?,?,?,?,?)");
        $stmt->bind_param("sssss", $vasarlo_neve, $emailcim, $userid, $password, $username);
        try {
            if ($stmt->execute()) {
                $_SESSION['login'] = true;
            } else {
                $_SESSION['login'] = false;
                echo '<p>Rögzítés sikertelen!</p>';
            }
        } catch (Exception $exc) {
            $this->error = true;
        }
    }
    public function osszesTV() {
        $result = $this->db->query("SELECT * FROM `tv`");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function megrendeles($tvid, $tv_modell, $marka, $gyartasd, $kijelzom, $allapot, $ar) {
        $stmt = $this->db->prepare("DELETE FROM tv WHERE `tv`.`tvid` = $tvid");
        $stmt->bind_param('isssssss', $tvid, $tv_modell, $marka, $gyartasd, $kijelzom, $allapot, $ar);
        return $stmt->execute();
    }
    public function feltoltesTV($tvid, $tv_modell, $marka, $gyartasd, $kijelzom, $allapot, $ar) {
        $stmt = $this->db->prepare("INSERT INTO `tv` (`tvid`, `tv_modell`, `marka`, `kijelzom`, `gyartasd`, `allapot`, `ar`) VALUES ($tvid, '$tv_modell', '$marka', '$kijelzom', '$gyartasd', '$allapot', '$ar')");
        $stmt->bind_param('isssssss', $tvid, $tv_modell, $marka, $gyartasd, $kijelzom, $allapot, $ar);
        return $stmt->execute();
    }

    public function getModell() {
        $result = $this->db->query("SELECT DISTINCT `tv_modell` FROM `tv`;");
        return $result->fetch_all();
    }

    public function getMarka() {
        $result = $this->db->query("SELECT DISTINCT `marka` FROM `tv`;");
        return $result->fetch_all();
    }
}
