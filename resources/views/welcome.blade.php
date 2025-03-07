<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ToDo アプリ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .welcome-container {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        .card {
            max-width: 500px;
            width: 100%;
            margin: 2rem 0;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }
        .btn-lg {
            padding: 0.75rem 1.5rem;
            font-size: 1.1rem;
        }
        .welcome-header {
            margin-bottom: 2rem;
            text-align: center;
        }
        .auth-links {
            display: flex;
            gap: 1rem;
            margin-top: 1.5rem;
        }
    </style>
</head>
<body>
    <div class="container welcome-container">
        <div class="welcome-header">
            <h1 class="display-4">ToDo アプリケーション</h1>
            <p class="lead">タスク管理を簡単に、効率的に</p>
        </div>

        <div class="card">
            <div class="card-body text-center p-5">
                <h2 class="mb-4">はじめる</h2>
                <p>タスク管理アプリを使用するにはログインまたは新規登録が必要です。</p>
                
                <div class="auth-links">
                    @auth
                        <a href="{{ route('tasks.index') }}" class="btn btn-primary btn-lg">マイタスク</a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-primary btn-lg">ログイン</a>
                        <a href="{{ route('register') }}" class="btn btn-outline-primary btn-lg">新規登録</a>
                    @endauth
                </div>
                
                <div class="mt-4">
                    <small class="text-muted">管理者の方は <a href="{{ route('admin.login') }}">こちら</a> からログインしてください</small>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
