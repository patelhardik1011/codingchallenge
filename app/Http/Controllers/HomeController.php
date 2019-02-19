<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;

class HomeController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {

        $user = \Auth::user();

        $todos = Todo::where('user_id', $user->id)->get();
        $temp_time = new \DateTime('now');
        $time_arr = [];
        $todo_count_arr = [];
        for ($i = 0; $i < 12; $i++) {
            $cloned = clone $temp_time;
            $temp_time->modify('-1 minutes');
            $todos_count = Todo::whereBetween('created_at', [$temp_time, $cloned])->where('completed_time', NULL)->count();
            $todo_count_arr[] = $todos_count;
            $time_arr[] = $temp_time->format('H:i');
        }
        $time_arr = array_reverse($time_arr);
        $todo_count_arr = array_reverse($todo_count_arr);
        return view('home', compact('todos', 'time_arr', 'todo_count_arr'));
    }

    public function createTodo() {
        $user = \Auth::user()->id;
        return view('create-todo');
    }

    public function addTodo(Request $request) {
        $data = $request->all();
        if (isset($data['task_id'])) {
            $todo = Todo::where('id', $data['task_id'])->first();
            $todo->value = $data['value'];
            $todo->save();
        } else {
            Todo::create($data);
        }


        return redirect()->route('home');
    }

    public function editTodo($id) {
        $todo = Todo::where('id', $id)->first();
        if ($todo) {
            return view('create-todo', compact('todo'));
        } else {
            return redirect()->route('home');
        }
    }

    public function completeTodo($id) {
        $todo = Todo::where('id', $id)->first();
        if ($todo) {
            $todo->status = 1;
            $todo->completed_time = new \DateTime('now');
            $todo->save();
            return redirect()->route('home');
        } else {
            return redirect()->route('home');
        }
    }

    public function deleteTodo($id) {
        $todo = Todo::where('id', $id)->first();
        if ($todo) {
            $todo->delete();
            return redirect()->route('home');
        } else {
            return redirect()->route('home');
        }
    }

}
