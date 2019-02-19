@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @if(isset($todo))
                <div class="card-header">Edit todo item</div>
                @else
                <div class="card-header">Create new todo item</div>
                @endif
                <div class="card-body">
                    <form method="post" action="{{ route('add-todo') }}" >
                        @auth
                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                        @endauth
                        @csrf
                        @if(isset($todo))
                        <input type="hidden" name="task_id" value="{{$todo['id']}}">
                        @endif
                        <div class="form-group">
                            <textarea class="form-control" name="value" required="required" placeholder="Enter your text here">@if(isset($todo)){{$todo['value']}}@endif</textarea>
                        </div>
                        <div class="form-group">
                            @if(isset($todo))
                            <button type="submit" value="submit" class="btn btn-success">Update</button>
                            @else
                            <button type="submit" value="submit" class="btn btn-success">Create</button>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
