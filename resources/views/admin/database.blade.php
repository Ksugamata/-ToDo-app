<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>データベース管理</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .table-container {
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container">
            <a class="navbar-brand" href="#">データベース管理</a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('tasks.index') }}">タスク管理へ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.logout') }}">ログアウト</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <h1 class="mb-4">データベーステーブル一覧</h1>

        <div class="accordion" id="databaseAccordion">
            @foreach($tablesData as $tableName => $tableInfo)
                <div class="accordion-item">
                    <h2 class="accordion-header" id="heading{{ $tableName }}">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $tableName }}" aria-expanded="false" aria-controls="collapse{{ $tableName }}">
                            テーブル: {{ $tableName }} ({{ count($tableInfo['data']) }}件)
                        </button>
                    </h2>
                    <div id="collapse{{ $tableName }}" class="accordion-collapse collapse" aria-labelledby="heading{{ $tableName }}" data-bs-parent="#databaseAccordion">
                        <div class="accordion-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            @foreach($tableInfo['columns'] as $column)
                                                <th>{{ $column->Field }}</th>
                                            @endforeach
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($tableInfo['data'] as $row)
                                            <tr>
                                                @foreach($tableInfo['columns'] as $column)
                                                    <td>
                                                        @if(is_object($row->{$column->Field}) || is_array($row->{$column->Field}))
                                                            {{ json_encode($row->{$column->Field}) }}
                                                        @else
                                                            {{ $row->{$column->Field} }}
                                                        @endif
                                                    </td>
                                                @endforeach
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>