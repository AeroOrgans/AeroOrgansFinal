<?php
use PHPUnit\Framework\TestCase;
require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/sendFlightStart.php'; 
class NotificationTest extends TestCase {
    public function testSendNotificationEmailSuccess() {
        if (!session_id()) session_start();
        $_SESSION['id_FS'] = '93';  
        ob_start();
        sendNotificationEmail('Mariianiazi@gmail.com');
        $output = ob_get_clean();

        $this->assertStringContainsString("Message sent successfully", $output);
    }
    public function testSendNotificationEmailFailure() {  
        if (!session_id()) session_start();
        $_SESSION['id_FS'] = '93';  
        // Assuming failure by passing an empty email
        ob_start();
        sendNotificationEmail('');  
        $output = ob_get_clean();
        $this->assertStringContainsString("An unexpected error occurred", $output);

    }
}


?>
