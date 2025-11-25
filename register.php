<?php
require "mysql.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = isset($_POST["username"]) ? trim($_POST["username"]) : "";
    $password = isset($_POST["password"]) ? $_POST["password"] : "";
    $password_confirm = isset($_POST["password_confirm"]) ? $_POST["password_confirm"] : "";

    // Validasi dasar
    if ($username === "" || $password === "" || $password_confirm === "") {
        header("Location: register.html?reg_error=empty");
        exit;
    }

    if ($password !== $password_confirm) {
        header("Location: register.html?reg_error=not_match");
        exit;
    }

    if (strlen($password) < 6) {
        header("Location: register.html?reg_error=short");
        exit;
    }

    // Cek apakah username sudah ada
    $stmt = $mysql->prepare("SELECT user_id FROM users WHERE username = ? LIMIT 1");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // username sudah dipakai
        header("Location: register.html?reg_error=user_taken");
        exit;
    }

    // Simpan user baru
    // CATATAN: untuk real project sebaiknya gunakan password_hash()
    // Contoh:
    // $hashed = password_hash($password, PASSWORD_DEFAULT);
    // dan di login.php pakai password_verify()
    $stmtInsert = $mysql->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    $stmtInsert->bind_param("ss", $username, $password);

    if ($stmtInsert->execute()) {
        // sukses daftar → balik ke login dengan pesan success
        header("Location: index.html?success=1");
        exit;
    } else {
        // error umum
        header("Location: register.html?reg_error=unknown");
        exit;
    }
} else {
    header("Location: register.html");
    exit;
}
