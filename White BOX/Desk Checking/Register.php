function register_user($name, $email, $address, $phone, $username, $password) {
    global $conn;
    
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $verification_code = rand(100000, 999999);
    
    $sql = "INSERT INTO customers (name, email, address, phone, username, password, verification_code, is_verified) 
            VALUES (?, ?, ?, ?, ?, ?, ?, 0)";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssi", $name, $email, $address, $phone, $username, $hashed_password, $verification_code);
    
    if($stmt->execute()) {
        // In a real app, you would send this code to the user's email
        $_SESSION['verification_email'] = $email;
        $_SESSION['verification_code'] = $verification_code;
        return true;
    }
    return false;
}
