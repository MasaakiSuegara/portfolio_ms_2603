<?php 



//echo 'おみくじのサーバー側の処理ページ';
//echo  '<br>';
// XREAのDBへアクセスする際のコマンド
// PDOメソッド
//データベースの名前を指定して、IDPWを持ってアクセスする。
//DBの情報を秘匿するため別ファイルを経由して接続する。
// アクセスしたＤＢにはcustomersとproductsという2つのテーブルがある。
//今回は商品情報が欲しいのでproductsを指定する。
// 今回は全部持ってきて必要なものを適用する。fetchとやらで指定できるらしいが一回おいておく。
//今回idを元に引っ張りたい。なのでidは可変だぞとwhere id=?で宣
//executeメソッドで?にしたところにこっちが指定した値をいれる。入れるのはid番号

// XREA環境
// require_once('includes/connectDb.php');
// $omikuziList = ["大吉","中吉","中吉","吉","吉","吉","小吉","小吉","小吉","末吉","末吉","凶","大凶","超吉"];
// $result = array_rand($omikuziList, 1);
// $fortune = $omikuziList[$result];
// $sql = $pdo->prepare('select * from fortune where luck = ?');
// $sql->execute([$fortune]);
// $fortuneTelling = $sql->fetch(PDO::FETCH_ASSOC);

// ローカル環境
$omikuziList = ["大吉","中吉","中吉","吉","吉","吉","小吉","小吉","小吉","末吉","末吉","凶","大凶","超吉"];
$result = array_rand($omikuziList,1);
$fortune = $omikuziList[$result];
$pdo=new PDO('mysql:host=localhost;dbname=omikuzi;charset=utf8', 'kannushi', 'matikane');
$sql= $pdo->prepare('select * from product where luck= ? ');
$sql->execute([$fortune]);
$fortuneTelling = $sql->fetch(PDO::FETCH_ASSOC);

// 共通部分
header('Content-Type: application/json');
// file_put_contents('omikuzi-SQL.json', json_encode($fortuneTelling, JSON_UNESCAPED_UNICODE));
echo json_encode($fortuneTelling, JSON_UNESCAPED_UNICODE);
?>

