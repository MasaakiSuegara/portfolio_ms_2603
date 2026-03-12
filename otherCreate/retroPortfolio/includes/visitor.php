<?php

$file = 'visitor.json';
// JSON形式のデータをPHP形式に変換しつつ持ってくる
$visitor = json_decode(file_get_contents($file),true);
// postされてきたデータと合致する項目の数値を＋１する
// 1足したカウントをJSONファイルに返す
if (isset($_POST['visitPurpose'])) {
    $visitor[$_POST['visitPurpose']]++;
    file_put_contents($file, json_encode($visitor, JSON_UNESCAPED_UNICODE));
}
header('Location: ../isorate_index.php');
exit;

?>