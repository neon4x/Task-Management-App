@extends('layout')

@section('main-content')

    <div>
        <div class="float-start">
            <h4 class="pb-3">Tasks</h4>
        </div>
        <div class="float-end">
            <a href="{{ route('task.create') }}" class="btn btn-info">
                Create
            </a>
        </div>
        <div class="clearfix"></div>
    </div>

    @foreach ($tasks as $task)
    <div class="card">
        <h5 class="card-header">
            {{$task->title }}
            <span class="badge rounded-pill text-bg-warning">{{$task->created_at->diffForHumans()}}</span>

        </h5>
        
        <div class="card-body">
            <div class="card-text">
                <div class="float-start">
                {{$task->description }}
                <br>

                @if ($task->status === "Todo")
                <span class="badge rounded-pill text-bg-info">TODO</span>
                @else
                <span class="badge rounded-pill text-bg-success">DONE</span>
                @endif

                <small>Last Updated - {{$task->updated_at->diffForHumans()}}</small>

            </div>
            <div class="float-end">

            <a href="{{ route('task.edit', $task->id) }}" class="btn btn-success">
                Edit
            </a>
            <form action="{{route('task.destroy', $task->id)}}" style="display: inline" method="POST">
            @csrf
            @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</a>
            </form>
            </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    @endforeach

    @if (count($tasks) === 0)
    <br>
        <div class="alert alert-danger p-2">
            No task Found.
        </div>
    @endif

@endsection