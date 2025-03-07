@extends('layouts.app')

@section('content')
    <br>
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 style="font-family: 'Hiragino Sans', 'ヒラギノ角ゴシック', sans-serif !important;">タスク一覧</h1>
        <a href="{{ route('tasks.create') }}" class="btn btn-primary">新規作成</a>
    </div>
    <br>
    @if($tasks->count() > 0)
        <div class="list-group">
            @foreach($tasks as $task)
                <div class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="mb-1 {{ $task->completed ? 'text-decoration-line-through' : '' }}">
                            {{ $task->title }}
                        </h5>
                        <small>作成日: {{ $task->created_at->format('Y/m/d H:i') }}</small>
                    </div>
                    <div class="d-flex">
                        <a href="{{ route('tasks.show', $task) }}" class="btn btn-sm btn-info me-2">詳細</a>
                        <a href="{{ route('tasks.edit', $task) }}" class="btn btn-sm btn-secondary me-2">編集</a>
                        <form action="{{ route('tasks.destroy', $task) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('削除してもよろしいですか？');">削除</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="alert alert-info">
            タスクはありません。新規作成ボタンからタスクを追加してください。
        </div>
    @endif
@endsection