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
?>

<h1>メニュー</h1>
<ul>

    <li><a href="get_user_cards.php">所持カード一覧</a></li>
    <li><a href="card_gacha.php">ガチャ画面に移行する</a></li>

</ul>