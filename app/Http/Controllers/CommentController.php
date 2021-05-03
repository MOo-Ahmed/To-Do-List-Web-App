<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\User;


class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($task_id)
    {
        $results = null ;
        $task = Task::find($task_id);
        $comments = [];
        $results = $task->comments;
        foreach($results as $comment){
            $comments[] = [
                'id' => $comment->id ,
                'description' => $comment->description
            ];
        }
        return $comments ;
        
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->validate($request, [
            'description' => 'required',
            'task_id' => 'required'
        ]);
        $description = $request->description;
        $task_id = $request->task_id;
        $comment = new Comment();
        $comment->description = $description ;
        $comment->task_id = $task_id;
        $comment->save();

        $user_id = Task::find($task_id)->user_id ;
        error_log($user_id);
        $user_email = User::find($user_id)->email;
        $path = '/comments/mail/' . $user_email ;
        return \Route::dispatch(\Request::create($path, 'GET'));

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
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        //
    }
}
