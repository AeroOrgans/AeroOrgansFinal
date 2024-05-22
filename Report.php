<?php
session_start();
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "mysql";
$dbname = "aeroorgans";

$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$id_request = isset($_SESSION['id']) ? $_SESSION['id'] : '';
$username = isset($_SESSION['username']) ? $_SESSION['username'] : '';




$sql = "SELECT ID, Email, Organ, Source, Destination, Weight1, Urgency, Notes, FS, FE, status1 
        FROM requests 
        WHERE ID = '$id_request'";

$result = $conn->query($sql);

$html = '<style>
body{font-family: Arial, Helvetica, sans-serif;}
table {width: 80%; border-collapse: collapse;} 
th, td {padding: 8px; border: 1px solid #dddddd; text-align: left;} 
th {background-color: #f2f2f2;} 
h1 {text-align: center;}
h2 {text-align: center; text-decoration: underline;}
h3 {text-align: left;}
.content-container {width: 180mm; height: 200mm; background-color: #fff; margin: 0 auto;}
</style>';

$html .= '<div class="content-container">';
$html .= '<h1 style="color:blue;">Aero Organs Co. </h1>';
$html .= '<h2>Flight Report</h2>';
$html .= '<br><h3>For Request No.:  ' . htmlspecialchars($id_request) . '</h3>';
$html .= '<h3>Hospital Representative Name: ' . htmlspecialchars($username ). '</h3>';
$html .= '<br><h3>Request Information</h3>';
$html .= '<table>';
$html .= '<tr><th>ID</th><th>Email</th><th>Organ</th><th>Source</th><th>Destination</th><th>Weight</th><th>Urgency</th><th>Notes</th></tr>';

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $html .= "<tr><td>{$row['ID']}</td><td>{$row['Email']}</td><td>{$row['Organ']}</td><td>{$row['Source']}</td><td>{$row['Destination']}</td><td>{$row['Weight1']}</td><td>{$row['Urgency']}</td><td>{$row['Notes']}</td></tr>";
    }
} else {
    $html .= '<tr><td colspan="8">No data found</td></tr>';
}
$html .= '</table>';

$html .= '<br><h3>Flight Information</h3><table><tr><th>Flight Start Date</th><th>Flight End Date</th><th>Status</th></tr>';

// we have to reset the result value in order to retrieve data again from a nother query for the second table
$result->data_seek(0); 
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $html .= "<tr><td>{$row['FS']}</td><td>{$row['FE']}</td><td>{$row['status1']}</td></tr>";
    }
} else {
    $html .= '<tr><td colspan="3">No data found</td></tr>';
}
$html .= '</table>';
$html .= '<div class="footer"> </div>';
$html .= '</div>';
$conn->close();

require 'vendor/autoload.php';
use Dompdf\Dompdf;

$dompdf = new Dompdf();
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();
$dompdf->stream("Request_Report", ['Attachment' => 0]);
?>
