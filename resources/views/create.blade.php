@extends('layout')

@section('main-content')

<div>
    <div class="float-start">
        <h4 class="pb-3">Create Task</h4>
    </div>
    <div class="float-end">
        <a href="{{ route('index') }}" class="btn btn-info">
            All tasks
        </a>
    </div>
    <div class="clearfix"></div>
</div>

<div class="card card-body bg-light p-4">
    <form action="{{route('task.store')}}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Task Title</label>
            <input type="text" class="form-control" id="title" name="title">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea type="text" class="form-control" id="description" name="description" rows="4"></textarea>
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" id="status" class="form-control">
                @foreach ($statuses as $status)
                    <option value="{{$status['value'] }}">{{$status['label'] }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Add</button>
    </form>
</div>



@endsection