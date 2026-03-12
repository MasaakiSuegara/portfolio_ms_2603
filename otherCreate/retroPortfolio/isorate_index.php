<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="common/reset.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DotGothic16&family=M+PLUS+1:wght@100..900&family=Noto+Sans+JP:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles/style.css">
    <title>ポートフォリオ_別館</title>
</head>
<!-- PHPをめいんにしてあらんかぎり詰め込む -->
<?php
// アンケート集計部分
$visitor = json_decode(file_get_contents('includes/visitor.json'), true);
// グラフ用：最大値を求める
$maxCount = max(array_values($visitor));
if ($maxCount < 1) { $maxCount = 1; }
// アンケートの合計件数
$totalCount = array_sum(array_values($visitor));

?>


<body>
    <nav class="retroNav">
        <p class="navTitle">MENU</p>
        <ul class="navList">
            <!-- ここは各部分の移動リンク中身もそのうち変える -->
            <li class="retroLink"><a href="#profile"><span class="navSentence">◆ PROFILE</span></a></li>
            <li class="retroLink"><a href="#works"><span class="navSentence">◆ WORKS</span></a></li>
            <li class="retroLink"><a href="#history"><span class="navSentence">◆ UPDATE</span></a></li>
            <li class="retroLink"><a href="#commetBoard"><span class="navSentence">◆ COMMENT</span></a></li> 
            <li class="retroLink"><a href="#link"><span class="navSentence">◆ LINK</span></a></li>
        </ul>
        <div>
            <a href="#">
                <img src="images/bannnerImage.png" alt="バナー画像">
            </a>
            <p>バナー画像イメージです。</p>
        </div>
    </nav>
    <!-- ヘッダーは見出し。タイトルとこのサイトのコンセプト説明 -->
    <div class="retroWrapper">
        <header>
            <h1 class="retroTitle">ポートフォリオ_別館</h1>
                <div class="marqueeOuter">
                    <div class="marqueeInner">
                        <span class="welcome">ようこそ / Thanks for visiting / ポートフォリオ / Portfolio</span>
                    </div>
                </div>
                <div class="retroCatchCopy">
                    別館へようこそ。このサイトでは、2000年代の個人HPの再現をコンセプトに<br>
                    当時の各種機能を学習の一環として作成したサイトになります。
                </div>
        </header>
        <!-- メインは4セクション。1.スキル2.制作物3.自作物4.ゲーム作成(ポートフォリオ制作物) -->
        <!-- 一つめ。スキルに関して記述する。 -->
        <!-- カウンター部分 -->
        <main class="retroContent">
            <section class="countSection">
                <div class="counterBox">
                    <p class="counterLabel">あなたは</p>
                    <div class="counterDisplay" id="counterDisplay">
                        <div class="counterDigit">0</div>
                        <div class="counterDigit">0</div>
                        <div class="counterDigit">0</div>
                        <div class="counterDigit">0</div>
                        <div class="counterDigit">0</div>
                        <div class="counterDigit">0</div>
                    </div>
                    <p class="counterSub">番目のお客様です</p>
                    <p class="kiribanMessage" id="kiribanMessage">★ キリ番報告歓迎 ★</p>
                    <div id="kiriban" class="kiriban hidden" >おめでとうございます！キリ番です。</div>
                    <p class="hosoku">アクセスカウンターとキリ番作成によるPHPとJavaScriptの複合によるスクリプト</p>
                </div>
            </section>
        <!-- プロフィール部分 -->
            <section class="retroSection" id="profile">

                <h2>PROFILE</h2>
                <p>
                    食品メーカーで8年、製造・品質保証・帳票DXを担当。
                    現在はWebエンジニアへの転身に向けて学習・制作を進行中。
                </p>
            </section>
            <!-- 制作物 -->
            <section class="retroSection" id="works">
                <h2>WORKS</h2>
                <ul class="workdsList">
                    <li>来訪者カウンターとカウント判定</li>
                    <li>集計機能</li>
                    <li>掲示板</li>
                    <li>リセット機能</li>
                </ul>
            </section>
            <!-- アンケート集計 -->
            <section class="visitLog" id="visitLog">
                <div class="visitor">来訪者アンケート</div>
                <!-- 左：フォーム / 右：グラフ を横並びにするラッパー -->
                <div class="surveyInner">
                    <!-- 左：投票フォーム -->
                    <div class="surveyFormArea">
                        <p class="surveyLead">あなたの来訪目的を教えてください！</p>
                        <form action="includes/visitor.php" method="post" class="visitForm" id="visitForm">
                            <div class="purposeRadio">
                                <label class="purpose">
                                    <input type="radio" name="visitPurpose" value="来訪" checked="checked">
                                    来訪
                                </label>
                                <label class="purpose">
                                    <input type="radio" name="visitPurpose" value="採用・採点">
                                    採用・採点
                                </label>
                                <label class="purpose">
                                    <input type="radio" name="visitPurpose" value="たまたま">
                                    たまたま
                                </label>
                            </div>
                            <input type="submit" value="投票する" class="surveySubmit">
                        </form>
                    </div>
                    <!-- 右：グラフ -->
                    <div class="surveyResult">
                        <div class="surveyResultTitle">集計結果（合計 <?php echo $totalCount; ?> 票）</div>
                        <?php foreach ($visitor as $purpose => $count):
                            $percent = ($maxCount > 0) ? round(($count / $maxCount) * 100) : 0;
                        ?>
                        <div class="barRow">
                            <span class="barLabel"><?php echo htmlspecialchars($purpose, ENT_QUOTES, 'UTF-8'); ?></span>
                            <div class="barTrack">
                                <div class="barFill" style="width: <?php echo $percent; ?>%;"></div>
                            </div>
                            <span class="barCount"><?php echo $count; ?>票</span>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </section>
            <!-- 更新履歴 -->
            <section class="retroSection" id="history">
                <h2>UPDATE</h2>
                <ul class="updateList">
                    <li>2026.03.05 別館を公開</li>
                    <li>2026.03.06 来訪者カウンターを追加</li>
                    <li>2026.03.07 キリ番表示を追加</li>
                    <li>2026.03.12 各種機能を更新</li>
                </ul>
            </section>

            <section class="commetBoard" id="commetBoard">
                <div class="onlineBoard">掲示板</div>
                <!-- 投稿エリア -->
                <div class="boardInputArea">
                    <p class="onlineTitle">★ メッセージを投稿する</p>
                    <form action="includes/comBoard.php" method="post">
                        <label class="handleNameLabel">
                            お名前：
                            <input type="text" class="handleName" name="handleName" value="名無しの方">
                        </label>
                        <label class="commentLabel">
                            メッセージ：
                            <textarea class="messageWindow" name="comment" placeholder="ここにメッセージを入力してください"></textarea>
                        </label>
                        <input type="submit" value="投稿" class="submitBt">
                    </form>
                </div>
                <!-- ログエリア -->
                <div class="boardLogArea">
                    <p class="boardLogTitle">▼ 投稿ログ</p>
                    <?php
                    $comment = json_decode(file_get_contents('includes/comBoard.json'), true);
                    $boardText = '';
                    if (is_array($comment)) {
                        foreach ($comment as $postData) {
                            $boardText .= '投稿者：' . $postData['handleName'] . "\n";
                            $boardText .= $postData['comment'] . "\n";
                            $boardText .= "--------------------\n";
                        }
                    }
                    ?>
                    <textarea class="boardLog" readonly><?php echo htmlspecialchars($boardText, ENT_QUOTES, 'UTF-8'); ?></textarea>
                </div>
            </section>
            <!-- リンクブロック -->
            <section class="retroSection" id="link">
                <h2>LINK</h2>
                <p><a href="../../index.html">本館ポートフォリオへ戻る</a></p>
            </section>
            <!-- 管理機能 -->
            <section>
                <div class="risetBooth" id="risetBooth">▶ 裏口：管理機能（クリックで開閉）</div>
                <div class="risetFunction" id="risetFunction">リセット機能
                    <form action="includes/reset.php" method="post">
                        <button type="submit" name="resetType" value="visitor">来訪者集計をリセット</button>
                    </form>
                    <form action="includes/reset.php" method="post">
                        <button type="submit" name="resetType" value="comment">掲示板をリセット</button>
                    </form>
                    <form action="includes/reset.php" method="post">
                        <button type="submit" name="resetType" value="all">全部リセット</button>
                    </form>
                </div>
            </section>
        </main>

    </div>
    <!-- 画像提供やCマーク -->
    <footer>
        <p><small>CopyRight (C) MasaakiSuegara</small></p>
        <p><small>画像提供：DOT ILLUST 様(https://dot-illust.net/)</small></p>
    </footer>
    <script src="scripts/script.js"></script>
</body>