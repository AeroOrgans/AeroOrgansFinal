<?php
use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/login2.php'; 

class loginTest extends TestCase {
    public function testAuthenticatePilot() {

        $conn = new mysqli("localhost", "root", "mysql", "aeroorgans");
        $this->assertTrue(authenticatePilot($conn, "ghina", "2712"));
        $this->assertFalse(authenticatePilot($conn, "rahaf", "12345"));
        $conn->close();

    }

    public function testAuthenticateHospitalRep() {

        $conn = new mysqli("localhost", "root", "mysql", "aeroorgans"); 
        $this->assertTrue(authenticateHospitalRep($conn, "maria", "Maria2001!", "143143"));
        $this->assertFalse(authenticateHospitalRep($conn, "haifa", "1222", "123456"));
        $conn->close();
        
    }

}
?>
