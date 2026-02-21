<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>会員登録</title>
</head>
<body>
    <h1>会員登録</h1>
    <!-- Fortifyが用意している /register という道にデータを送ります -->
    <form method="POST" action="/register">
        @csrf <!-- セキュリティのための魔法の合言葉（必須！） -->

        <div>
            <label>ユーザー名</label>
            <input type="text" name="name" required>
        </div>
        <div>
            <label>メールアドレス</label>
            <input type="email" name="email" required>
        </div>
        <div>
            <label>パスワード</label>
            <input type="password" name="password" required>
        </div>
        <div>
            <label>確認用パスワード</label>
            <input type="password" name="password_confirmation" required>
        </div>

        <button type="submit">登録する</button>
    </form>
    <a href="/login">ログインはこちら</a>
</body>
</html>
