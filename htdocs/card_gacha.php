<!DOCTYPE html>
<html>
<head>
    <title>ガチャ</title>
</head>
<body>
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

    $cards = "SELECT * FROM cards";

    if (isset($_POST['gacha_01']))
        {
            echo "1連ガチャのフラグが立てれています。";
            $weight_total = "SELECT SUM(`weight_num`) AS `weight_count` FROM `card_gacha`";
            $weight_result = $mysql->query($weight_total);
            $dat = mysqli_fetch_assoc($weight_result);
            $hit = rand(1,$dat['weight_count']);

            echo "テスト" . $dat['weight_count'] . "," . "$hit" . "<br>";

            $gacha_total = "SELECT * FROM card_gacha";
            $gacha_result = $mysql->query($gacha_total);

            if ($gacha_result)
                {
                    foreach ($gacha_result as $row)
                        {
                            $dat['weight_count'] -= $row['weight_num'];
                            if ($dat['weight_count'] < $hit)
                                {
                                    echo $row['card_id'] . "番目のカードが当たりました。";
                                    break;
                                }
                        }
                }
            else
                {
                echo "ガチャテーブルを取得できませんでした";
                }
        }
    else
        {
            echo "ガチャボタンを押してください";
        }

    ?>
    <h1>1連ガチャ</h1>
    <form action="card_gacha.php" method="post">
        <button type="submit" name="gacha_01">1連回す</button>
    </form>
</body>
</html>
