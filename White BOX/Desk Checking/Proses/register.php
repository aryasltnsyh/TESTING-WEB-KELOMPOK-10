<?php
require_once '../includes/auth.php';

$name = trim($_POST['name'] ?? '');
$email = trim($_POST['email'] ?? '');
$address = trim($_POST['address'] ?? '');
$phone = trim($_POST['phone'] ?? '');
$username = trim($_POST['username'] ?? '');
$password = trim($_POST['password'] ?? '');

$error = ''; // Inisialisasi error

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Validasi panjang & format input
    if (strlen($name) < 3 || strlen($name) > 50) {
        $error = 'Nama lengkap harus antara 3 sampai 50 karakter.';
    } elseif (strlen($username) < 3 || strlen($username) > 15) {
        $error = 'Username harus antara 3 sampai 15 karakter.';
    } elseif (strlen($address) < 5 || strlen($address) > 15) {
        $error = 'Alamat harus antara 5 sampai 15 karakter.';
    } elseif (!ctype_digit($phone) || strlen($phone) < 11 || strlen($phone) > 13) {
        $error = 'Nomor telepon harus antara 11 sampai 13 digit dan hanya boleh angka.';
    } elseif (strlen($password) < 6 || strlen($password) > 15) {
        $error = 'Password harus antara 6 sampai 15 karakter.';
    } elseif (!preg_match('/[A-Za-z]/', $password) || !preg_match('/[0-9]/', $password)) {
        $error = 'Password harus mengandung kombinasi huruf dan angka.';
    } else {
        global $conn;

        $stmt = $conn->prepare("SELECT * FROM customers WHERE username = ? OR email = ?");
        if (!$stmt) {
            die("Query preparation failed: " . $conn->error);
        }

        $stmt->bind_param("ss", $username, $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if ($row['username'] === $username) {
                $error = 'Username sudah digunakan. Silakan pilih yang lain.';
            } elseif ($row['email'] === $email) {
                $error = 'Email sudah terdaftar. Silakan gunakan email lain.';
            }
        } else {
            if (register_user($name, $email, $address, $phone, $username, $password)) {
                redirect('verify.php');
            } else {
                $error = $_SESSION['error'] ?? 'Registrasi gagal. Silakan coba lagi.';
                unset($_SESSION['error']);
            }
        }
    }
}

require_once '../public/register.php';
?>
