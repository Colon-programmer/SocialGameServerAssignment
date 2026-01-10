<?php
$servername = "mysql"; // サーバー名
$username = "root";        // データベースユーザー名
$password = "p@ssword"; // パスワード

// データベース接続
$conn = new mysqli($servername, $username, $password);

// 接続確認
if ($conn->connect_error) {
    die("接続失敗: " . $conn->connect_error);
}

// データベース作成 (初回のみ)
$sql_db = "CREATE DATABASE IF NOT EXISTS social_game";
if ($conn->query($sql_db) === TRUE) {
    echo "データベース 'social_game' が作成されました\n";
} else {
    echo "データベース作成エラー: " . $conn->error . "\n";
}

// データベースの使用（以降の操作対象）
$conn->select_db("social_game");

// ユーザーテーブル作成
$sql_table_users = "CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(16) NOT NULL
)";

if ($conn->query($sql_table_users) === TRUE) {
    echo "テーブル 'users' が作成されました\n";
} else {
    echo "テーブル作成エラー: " . $conn->error . "\n";
}

$users_column = "INSERT INTO IF NOT EXISTS users (username)
    VALUES (:username, now())";

$stmt = $conn->prepare($users_column);
$users_params = array(':username' => 'Sato');
$stmt->execute($users_params);

$stmt = $conn->prepare($users_column);
$users_params = array(':username' => 'Suzuki');
$stmt->execute($users_params);

$stmt = $conn->prepare($users_column);
$users_params = array(':username' => 'Takahashi');
$stmt->execute($users_params);

$sql_table_user_cards = "CREATE TABLE IF NOT EXISTS user_cards (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    card_id INT NOT NULL,
    deck_id BOOLEAN NOT NULL
)";

if ($conn->query($sql_table_user_cards) === TRUE) {
    echo "テーブル 'user_cards' が作成されました\n";
} else {
    echo "テーブル作成エラー: " . $conn->error . "\n";
}

$sql_table_user_decks = "CREATE TABLE IF NOT EXISTS user_decks (
    user_id INT NOT NULL,
    deck_id INT NOT NULL,
    user_card_id INT NOT NULL,
)";

if ($conn->query($sql_table_user_decks) === TRUE) {
    echo "テーブル 'user_decks' が作成されました\n";
} else {
    echo "テーブル作成エラー: " . $conn->error . "\n";
}

$sql_table_card_gacha = "CREATE TABLE IF NOT EXISTS card_gacha (
    gacha_id INT NOT NULL,
    card_id INT NOT NULL,
    weight_num INT NOT NULL,
)";

if ($conn->query($sql_table_card_gachas) === TRUE) {
    echo "テーブル 'card_gacha' が作成されました\n";
} else {
    echo "テーブル作成エラー: " . $conn->error . "\n";
}

$sql_table_gacha_history = "CREATE TABLE IF NOT EXISTS gacha_history (
    id INT AUTO_INCREMENT PRIMARY KEY,
    history_id INT NOT NULL,
    gacha_id INT NOT NULL,
    card_id INT NOT NULL,
)";

if ($conn->query($sql_table_gacha_history) === TRUE) {
    echo "テーブル 'gacha_history' が作成されました\n";
} else {
    echo "テーブル作成エラー: " . $conn->error . "\n";
}

// リダイレクト
header("Location: get_users.php");
exit();

?>