<!DOCTYPE html>
<html>
<head>
    <title>ガチャ結果</title>
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

if ($_SERVER["REQUEST_METHOD"] == "play_01")
    {
        echo "1連ガチャのフラグが立てれています。";
    }
else if ($_SERVER["REQUEST_METHOD"] == "play_10")
    {
        echo "10連ガチャのフラグが立てれています。";
    }
else
    {
        echo "ガチャを回すことに失敗しました。";
    }

?>