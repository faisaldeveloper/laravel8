<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Inertia\Inertia;

use App\Models\Task;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Category::all();
        //->sortBy(["order","category_id"]);
        //dd($data);
        //$data = Category::orderBy("category_id", 'asc')->get();
        //$data = json_decode($data, true);
        //dd($data);


        return Inertia::render('Category/index', ['categories' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    /*public function trello()
    {
        $categories = Category::with('tasks')->get();
        return Inertia::render('Category/board', ['categories' => $categories]);
    }*/

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $categories = Category::with('tasks')->get();

        //$categories = json_decode($categories, true);
        //dd($categories);

        //$categories = Category::join('tasks as tk', 'tk.category_id', '=', 'categories.id')
       //->orderBy('tk.order', 'asc')->all();
      // ->select('categories.*')       // just to avoid fetching anything from joined table
       //->paginate(25);

       if(isset($msg)){
        die('sfsdf');
       }

        return Inertia::render('Category/board', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        // return response()->json($category);
        
        $data = Category::Findorfail($category->id);
        //dd("uuy".$data);
        return Inertia::render('Category/show', ['row' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }
}
