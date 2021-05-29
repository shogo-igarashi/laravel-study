@extends('layouts.app')

@section('content')
    <!-- タスクフォームの作成 -->

    <!-- Bootstrapの定形コード… -->

    <div class="panel-body">
        <!-- バリデーションエラーの表示 -->
    @include('common.errors')

    <!-- 新タスクフォーム -->
        <form action="{{ route('task.add') }}" method="POST" class="form-horizontal">
        {{ csrf_field() }}

        <!-- タスク名 -->
            <div class="form-group">
                <label for="task" class="col-sm-3 control-label">タスク</label>

                <div class="col-sm-6">
                    <input type="text" name="name" id="task-name" class="form-control">
                </div>
            </div>

            <!-- タスク追加ボタン -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i> タスク追加
                    </button>
                </div>
            </div>
        </form>
    </div>

    <!-- TODO: 現在のタスク -->

    <!-- 現在のタスク -->
    @if (count($tasks) > 0)
        <div class="panel panel-default">
            <div class="panel-heading">
                現在のタスク
            </div>

            <div class="panel-body">
                <table class="table table-striped task-table">

                    <!-- テーブルヘッダ -->
                    <thead>
                    <th>Task</th>
                    <th>&nbsp;</th>
                    </thead>

                    <!-- テーブル本体 -->
                    <tbody>
                    @foreach ($tasks as $task)
                        <tr>
                            <!-- タスク名 -->
                            <td class="table-text">
                                <div>{{ $task->name }}</div>
                            </td>

                            <!-- 削除ボタン -->
                            <td>
                                <form action="{{ route('task.delete',[$task->id]) }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}

                                    <button type="submit" class="btn btn-danger">
                                        <i class="fa fa-trash"></i> 削除
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
@endsection
