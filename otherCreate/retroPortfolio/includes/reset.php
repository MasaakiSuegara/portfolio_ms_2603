<?php

if (isset($_POST['resetType'])) {
    if ($_POST['resetType'] === 'visitor') {
        file_put_contents('visitor.json', json_encode([
            '来訪' => 0,
            '採用・採点' => 0,
            'たまたま' => 0
        ], JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
    }

    if ($_POST['resetType'] === 'comment') {
        file_put_contents('comBoard.json', json_encode([], JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
    }

    if ($_POST['resetType'] === 'all') {
        file_put_contents('visitor.json', json_encode([
            '来訪' => 0,
            '採用・採点' => 0,
            'たまたま' => 0
        ], JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));

        file_put_contents('comBoard.json', json_encode([], JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
    }
}

header('Location: ../isorate_index.php');
exit;

?>