<?php
function verify_user($email, $code) {
    global $conn;
    
    $sql = "UPDATE customers SET is_verified = 1 WHERE email = ? AND verification_code = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $email, $code);
    
    return $stmt->execute();
}
