<?php
header('Content-Type: application/json');

$file = 'counter.json';
// JSON形式のデータをPHP形式に変換しつつ持ってくる
$count = json_decode(file_get_contents($file),true);
// そのカウントを1進める
$count['count'] = $count['count'] + 1;
// 1足した数をJSON形式に戻す
file_put_contents($file, json_encode($count));

// 1足したカウントをJSONファイルに返す
echo json_encode($count);

?>