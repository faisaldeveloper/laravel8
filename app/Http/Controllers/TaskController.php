<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Category;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Redirect;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //echo 'asdfsafdsfs555'; exit;

        $old_category_id =2;
        $old_order=2;

        $this->updateFromList($old_category_id, $old_order);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $task = Task::create([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'user_id' => $request->user_id,
            'order' => $request->order
        ]);

        $data = [
            'data' => $task,
            'status' => (bool) $task,
            'message' => $task ? 'Task Created!' : 'Error Creating Task',
        ];

        //return response()->json($data);
        return redirect()->route('category.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {         
         
        /*if($task->category_id == $request->category_id){
            return Redirect::back();
         }*/

         $old_category_id = $task->category_id;
         $old_order = $task->order;


         if($request->order !=false){
            $task->order = $request->order+1;
         }
         if($request->category_id !=null){
            $task->category_id = $request->category_id;
         }
 
         $this->updateFromList($old_category_id, $old_order);
         $this->updateToList($task->category_id, $task->order);

         $task->save();

         //$itemTypes = [1, 2, 3, 4, 5];

         //$categories = Category::with('tasks')->get();
         //dd('sdfsfd');

         //return Inertia.reload('only': ['categories' => $categories]);

         //return Redirect::back()->withInput(['msg' => 'its done']);

//return Redirect::route('category/create')->with('msg', 'State saved correctly!!!');

         return Redirect::back();

         //return Inertia::render('Category/board', ['categories' => $categories, 'msg' => 'Last moved task - '.$task->name]);
          
    }


    public function updateFromList($category_id, $old_order){
        $tasks2update = Task::where('category_id', '=', $category_id)->where('order', '>', $old_order)->get();

         foreach ($tasks2update as $task2) {
            $id2 = $task2->id;
            $order2 = $task2->order-1;            
            Task::where('id', '=', $id2)->update(['order' => $order2]);
         }   

         //echo 'job done';

    }

    public function updateToList($category_id, $order){
        $tasks2update = Task::where('category_id', '=', $category_id)->where('order', '>=', $order)->get();

         foreach ($tasks2update as $task2) {
            $id2 = $task2->id;
            $order2 = $task2->order+1;            
            Task::where('id', '=', $id2)->update(['order' => $order2]);
         }   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        //
    }
}
