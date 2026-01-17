<!DOCTYPE html>
<html>
<head>
    <title>ユーザーメニュー</title>
</head>
</html>

<?php
// データベースへ接続するために必要な情報
// ホストはDBコンテナ
$host = 'mysql';
// mysql接続用のユーザー
$username = 'root';
$password = 'p@ssword';
$database = 'social_game';

// データベースへ接続するためのクラス生成
$mysql = new mysqli($host, $username, $password, $database);

// 接続エラーの確認
if ($mysql->connect_error) {
    die("データベース接続エラー: " . $mysql->connect_error);
}

$id = 0;
if (isset($_GET['user_id']))
{
    $id = $_GET['user_id'];
}

$sql = "SELECT * FROM users where user_id = $id";
// クエリの実行
$result = $mysql->query($sql);

// 結果の処理
if ($result) {
    if ($result->num_rows > 0) {
        foreach($result as $row){
        // 取得したユーザーのメニューを表示する
        echo $row["user_name"] . "さんのメニュー<br>";
        echo "<td><a href=\"get_user_cards.php?user_id=" . $row["user_id"] . "\">" . "所持カード一覧" . "</a></td><br>";
        echo "<td><a href=\"card_gacha.php?user_id=" . $row["user_id"] . "\">" . "ガチャ画面に移行する" . "</a></td><br>";
        }
    echo "<br>";
    echo "<td><a href=\"get_users.php" . "\">" . "ユーザーを選びなおす" . "</a></td>";
    } else {
        echo "該当するデータはありません。";
    }
} else {
    echo "クエリの実行に失敗しました: " . $mysql->error;
}

?>
