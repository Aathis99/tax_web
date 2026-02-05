<?php
header('Content-Type: application/json; charset=utf-8');

require_once 'condb.php';

$id_card = $_GET['id_card'] ?? '';
$month   = $_GET['month'] ?? 'all';

// เขียน SQL แบบ JOIN 2 ตาราง
$sql = "SELECT r.*, p.new_file_name 
        FROM tax_records r 
        JOIN tax_reports p ON r.id_card = p.id_card 
        WHERE r.id_card = :id_card";

// ถ้าเลือกเดือน ให้ค้นจากชื่อไฟล์ (เพราะเราตั้งชื่อไฟล์มีเดือนติดอยู่ เช่น -10-1-68-)
if ($month !== 'all') {
    $sql .= " AND p.new_file_name LIKE :month_pattern";
}

$stmt = $pdo->prepare($sql);
$params = [':id_card' => $id_card];

if ($month !== 'all') {
    // pattern ค้นหา เช่น %-1-68-%
    $params[':month_pattern'] = "%-$month-%";
}

$stmt->execute($params);
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

$data = [];
foreach ($results as $row) {
    // เปลี่ยน path ไปที่โฟลเดอร์ processed_PDFs
    $row['file_url'] = "processed_PDFs/{$row['new_file_name']}";
    $data[] = $row;
}

echo json_encode($data);
