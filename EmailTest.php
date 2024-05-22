<?php
use PHPUnit\Framework\TestCase;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/sendIndex.php';

class EmailTest extends TestCase
{
    public function testSendMailSuccess()
    {
        $mailStub = $this->createMock(PHPMailer::class);
        $mailStub->method('send')
            ->willReturn(true);
        $result = sendMail('Maria hn', 'Maria@example.com', 'Test Subject', 'Test Message', $mailStub);
        $this->assertTrue($result);
    }

    public function testSendMailFailure()
    {
        $mailStub = $this->createMock(PHPMailer::class);
        $mailStub->method('send')
            ->willReturn(false);
        $result = sendMail('Maria hn', ' ', 'Test Subject', 'Test Message', $mailStub);
        $this->assertFalse($result);
    }
}
?>