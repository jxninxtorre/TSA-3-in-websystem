@extends('layout')
@section('title', 'Welcome')
@section('content')
<div class="window">
    <div class="titlebar">
        <span>&#128190; Today.exe</span>
        <span class="btns"><span>_</span><span>&#9633;</span><span>x</span></span>
    </div>
    <div class="content">
        <h2>Tasks for Today</h2>
        <p><b>Date:</b> {{ today()->format('F j, Y') }}</p>

        @if ($tasks->isEmpty())
            <p>No tasks scheduled for today.</p>
        @else
            <table>
                <tr><th>Title</th><th>Status</th></tr>
                @foreach ($tasks as $task)
                    <tr>
                        <td>{{ $task->title }}</td>
                        <td><span class="badge {{ $task->status }}">{{ ucfirst($task->status) }}</span></td>
                    </tr>
                @endforeach
            </table>
        @endif
    </div>
</div>
@endsection