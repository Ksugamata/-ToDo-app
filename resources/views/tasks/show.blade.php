#ここは詳細ボタンをおして表示される内容


@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3>タスク詳細</h3>
            <div>
                <a href="{{ route('tasks.index') }}" class="btn btn-secondary me-2">戻る</a>
                <a href="{{ route('tasks.edit', $task) }}" class="btn btn-warning">編集</a>
            </div>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <h5>タイトル</h5>
                <p class="{{ $task->completed ? 'text-decoration-line-through' : '' }}">{{ $task->title }}</p>
            </div>

            <div class="mb-3">
                <h5>状態</h5>
                <p>{{ $task->completed ? '完了' : '未完了' }}</p>
            </div>

            <div class="mb-3">
                <h5>説明</h5>
                <p>{{ $task->description ?? '説明はありません' }}</p>
            </div>

            <div class="mb-3">
                <h5>作成日時</h5>
                <p>{{ $task->created_at->format('Y/m/d H:i:s') }}</p>
            </div>

            <div class="mb-3">
                <h5>更新日時</h5>
                <p>{{ $task->updated_at->format('Y/m/d H:i:s') }}</p>
            </div>
        </div>
    </div>
@endsection