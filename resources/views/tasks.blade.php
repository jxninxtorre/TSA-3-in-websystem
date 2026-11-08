@extends('layout')
@section('title', 'Task List')
@section('content')
<div class="window">
    <div class="titlebar">
        <span>&#10047; All Tasks</span>
        <span class="btns"><span>_</span><span>&#9633;</span><span>x</span></span>
    </div>
    <div class="content">
        <h2>All Tasks</h2>
        <p>Ordered by date.</p>
        <table>
            <tr><th>Date</th><th>Title</th><th>Status</th></tr>
            @foreach ($tasks as $task)
                <tr>
                    <td>{{ $task->task_date->format('M d, Y') }}</td>
                    <td>{{ $task->title }}</td>
                    <td><span class="badge {{ $task->status }}">{{ ucfirst($task->status) }}</span></td>
                </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection