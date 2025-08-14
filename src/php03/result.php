<?php

require_once __DIR__ . '/config/status_codes.php';

// 1) まず存在チェック（未選択やnameミスも拾える）
if (!isset($_POST['option']) || $_POST['option'] === '') {
    header('Location: index.php'); // ← "Location:" の前にスペース入れない
    exit;
}

// 2) 値があると確定してからエスケープ
$answer_code = isset($_POST['answer_code']) ? htmlspecialchars($_POST['answer_code'], ENT_QUOTES, 'UTF-8') : '';
$option      = htmlspecialchars($_POST['option'],       ENT_QUOTES, 'UTF-8');

// ここから判定処理…
foreach ($status_codes as $status_code) {
	if ($status_code['code'] === $answer_code) {
		$code = $status_code['code'];
		$description = $status_code['description'];
	}
}

$result = $option ===$code;

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="css/sanitize.css">
	<link rel="stylesheet" href="css/common.css">
	<link rel="stylesheet" href="css/result.css">
</head>
<body>
	<header class="header">
		<div class="header__inner">
			<a class="header__logo" href="/php03">Status Code Quiz</a>
		</div>
	</header>
	<div class="result__content">
		<div class="result">
			<?php if ($result): ?>
			<h2 class="result__text--correct">正解</h2>
			<?php else: ?>
			<h2 class="result__text--incorrect">不正解</h2>
			<?php endif; ?>
		</div>
		<div class="answer-table">
			<table class="answer-table__inner">
				<tr class="answer-table__row">
					<th class="answer-table__header">ステータスコード</th>
					<td class="answer-table__text">
						<?php echo $code ?>
					</td>
				</tr>
				<tr class="answer-table__row">
					<th class="answer-table__header">説明</th>
					<td class="answer-table__text">
						<?php echo $description ?>
					</td>
				</tr>
			</table>
		</div>
	</div>
</body>
</html>
