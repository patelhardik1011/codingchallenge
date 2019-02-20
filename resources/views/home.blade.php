@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <canvas id="myChart" width="800" height="300"></canvas>
            <div class="row">
                <div class="col-md-12 text-right">
                    <a class="btn btn-primary" href="{{route('create-todo')}}">Create new todo</a>
                </div>
            </div>
            <br/>

            <div class="card">
                <div class="card-header">All ToDo Items</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <div class="container">
                        @foreach($todos as $todo) 
                        <div class="row" style="padding:5px 0;">
                            <div class="col-md-7">{{ $todo['value'] }}</div>
                            <div class="col-md-5">
                                @if($todo['status'])
                                <button class="btn btn-secondary" disabled>Complete Task</button>
                                @else
                                <a class="btn btn-secondary" href="{{ route('complete-todo',['id'=>$todo['id']]) }}">Complete Task</a>
                                &nbsp;<a class="btn btn-success" href="{{ route('edit-todo',['id'=>$todo['id']]) }}">Edit</a>
                                @endif

                                &nbsp;<a class="btn btn-danger" href="{{ route('delete-todo',['id'=>$todo['id']]) }}">Delete</a></div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        var ctx = document.getElementById("myChart").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?php echo json_encode($time_arr); ?>,
                datasets: [{
                        label: '# of Todo Items',
                        data: <?php echo json_encode($todo_count_arr); ?>,
                        borderWidth: 1
                    }]
            },
            options: {
                scales: {
                    yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                }
            }
        });
    }
    );
</script>
@endsection
