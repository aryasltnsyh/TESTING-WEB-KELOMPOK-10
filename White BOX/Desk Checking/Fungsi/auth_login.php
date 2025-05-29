<?php
function login_user($username, $password) {
    global $conn;
    
    $sql = "SELECT id, username, password, is_verified FROM customers WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        
        if(password_verify($password, $user['password'])) {
            if($user['is_verified']) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                return true;
            } else {
                return 'not_verified';
            }
        }
    }
    return false;
}
