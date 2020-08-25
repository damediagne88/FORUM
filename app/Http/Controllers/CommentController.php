<?php

namespace App\Http\Controllers;

use auth;
use App\Topic;
use App\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function __construct(){

        $this->middleware('auth');
    }
// ICI ON VA ENREGISTRER LES INFORMATIONS A TRAVERS LA RELATION

    public function store(Topic $topic){

        request()->validate([
            'content' =>['required','min:5']
        ]);

     $comment = new Comment();

     $comment->content= request('content');
     $comment->user_id =auth()->user()->id;

     //ICI ON ENREGISTRE A TRAVER LA RELATION

     $topic->comments()->save($comment);
    
     flash('Vous avez poster un nouveau commentaire')->success();
     return redirect()->route('topics.show',$topic);

    }
}
