<?php 

$file = 'comBoard.json';
// JSON形式のデータをPHP形式に変換しつつ持ってくる
$comment = json_decode(file_get_contents($file),true);


// コメントの空白確認
if (!is_array($comment)) {
    $comment = [];
}

if (isset($_POST['handleName']) && isset($_POST['comment'])) {
    $handleName = trim($_POST['handleName']);
    $commentText = trim($_POST['comment']);

    if ($handleName === '') {
        $handleName = '名無しの方';
    }

    if ($commentText !== '') {
        $comment[] = [
            'handleName' => $handleName,
            'comment' => $commentText
        ];

        file_put_contents($file, json_encode($comment, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
    }
}

header('Location: ../isorate_index.php');
exit;

?>