<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>ログイン</title>
</head>
<body>
    <h1>ログイン</h1>
    <!-- Fortifyが用意している /login という道にデータを送ります -->
    <form method="POST" action="/login">
        @csrf

        <div>
            <label>メールアドレス</label>
            <input type="email" name="email" required>
        </div>
        <div>
            <label>パスワード</label>
            <input type="password" name="password" required>
        </div>

        <button type="submit">ログインする</button>
    </form>
    <a href="/register">会員登録はこちら</a>
</body>
</html>
