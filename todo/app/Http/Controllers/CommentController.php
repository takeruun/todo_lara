<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function create(Task $task, Folder $folder){
        $comment = new Comment();
        $comment->content = $request->content;
        $task->comments()->save($comment);

        return redirect()->route('tasks.edit',[
            'task' => $task,
            'folder' => $folder,
        ]);
    }
}
