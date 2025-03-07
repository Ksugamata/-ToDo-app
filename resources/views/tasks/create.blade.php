@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3>新規タスク作成</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('tasks.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="title" class="form-label">タイトル</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}" required>
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">説明</label>
                    <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3">{{ old('description') }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('tasks.index') }}" class="btn btn-secondary">キャンセル</a>
                    <button type="submit" class="btn btn-primary">保存</button>
                </div>
            </form>
        </div>
    </div>
@endsection