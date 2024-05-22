<?php
use PHPUnit\Framework\TestCase;

class RequestTest extends TestCase {
  public function testSubmitRequest() {
    $conn = $this->getMockBuilder(mysqli::class)
                ->disableOriginalConstructor()
                ->getMock();

    // Set up the mock connection to expect the query and return a successful result
    $conn->expects($this->once())
         ->method('query')
         ->willReturn(true);
    $result = $this->submitRequest($conn, 'example@example.com', 'Heart', 'HospitalA', 'HospitalB', 10, 'Urgent', 'Some notes');
    $this->assertTrue($result);
  }

  public function submitRequest($conn, $email, $organ, $from, $to, $distance, $priority, $notes) {
    // Perform the necessary operations to submit the request
    $sql = "INSERT INTO requests (email, organ, from_location, to_location, distance, priority, notes)
            VALUES ('$email', '$organ', '$from', '$to', $distance, '$priority', '$notes')";
  
    $result = $conn->query($sql);
  
    return $result;
  }
  
  public function testSubmitRequestFailure() {
    $conn = $this->getMockBuilder(mysqli::class)
                ->disableOriginalConstructor()
                ->getMock();
    $conn->expects($this->once())
         ->method('query')
         ->willReturn(false);

    $result = $this->submitRequest($conn, '', 'Heart', 'HospitalA', 'HospitalB', 10, 'Urgent', 'Some notes');

    $this->assertFalse($result);
  }
}
?>