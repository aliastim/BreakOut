<?php

namespace App\Http\Controllers;

use Cocur\Slugify\Slugify;
use Illuminate\Http\Request;
use App\User;
use App\Forum_post;
use App\Forum_comment;
use Illuminate\Support\Facades\Auth;

class ForumController extends Controller
{
    public function loadPost()
    {
        $posts = Forum_post::all();
        return response()->json($posts, 200);
    }

    public function loadOnePost($id)
    {
        $post = Forum_post::find($id);
        return response()->json($post, 200);
    }

    public function addPost(Request $request) {
        $user = Auth::user();
        if (isset($user) and !empty($user) ) {

            $slugify = new Slugify();

            $post = new Forum_post();
            if(isset($request->subject) and !empty($request->subject))
            {
                $post->subject = $request->subject;
                $post->slug = $slugify->slugify($request->subject);

            } else
            {
                return response()->json(["error" => "Vous devez ajouter un titre à votre publication"], 401);
            }
            if(isset($request->message) and !empty($request->message))
            {
                $post->message = $request->message;

            } else
                {
                return response()->json(["error" => "Vous devez ajouter un message à votre publication"], 401);
            }

            if(isset($request->img) and !empty($request->img))
            {
                $post->isImg = true;
                $post->img = $request->img;
            }

            $post->user_id = $user->id;

            $post->save();
            return response()->json($post, 200);
        } else
        {
            return response()->json(["error" => "Vous devez être connecté pour publier sur le forum"], 401);
        }
    }

    public function loadComments($post_id)
    {
        $comments = Forum_comment::where('post_id', $post_id)->get();
        return response()->json($comments, 200);
    }

    public function addComment(Request $request) {
        $user = Auth::user();
        if (isset($user) and !empty($user) ) {

            $post = Forum_post::find($request->post_id);
            if($post->closed === 0)
            {
                $comment = new Forum_comment();

                if(isset($request->message) and !empty($request->message))
                {
                    $comment->message = $request->message;

                } else
                {
                    return response()->json(["error" => "Vous devez ajouter un message à votre publication"], 401);
                }

                if(isset($request->img) and !empty($request->img))
                {
                    $comment->isImg = true;
                    $comment->img = $request->img;
                }

                $comment->user_id = $user->id;
                $comment->post_id = $request->post_id;
                $comment->save();

                /*Incrémenter le nombre de commentaire sur l'article*/

                $post->comments++;
                $post->save();

                return response()->json($comment, 200);
            } else
            {
                return response()->json(["error" => "La publication est fermée, vous ne pouvez pas poster de commentaire"], 401);
            }


        } else
        {
            return response()->json(["error" => "L'utilisateur n'est pas connecté"], 401);
        }
    }

    public function deletePost($id)
    {
        $admin = Auth::user();

        if (isset($admin->admin) and ($admin->admin === 1) ) {
            $post = Forum_post::find($id);
            $post->delete();
            return response("La publication a bien été supprimée");
        } else
        {
            return response()->json(["error" => "L'utilisateur connecté n'est pas administrateur"], 401);
        }

    }

    public function lockPost($id)
    {
        $admin = Auth::user();

        if (isset($admin->admin) and ($admin->admin === 1) ) {
            $post = Forum_post::find($id);

            if($post->closed === 0)
            {
                $post->closed = 1;
            } else
            {
                $post->closed = 0;
            }

            $post->save();
            return response("La publication a bien été supprimée");
        } else
        {
            return response()->json(["error" => "L'utilisateur connecté n'est pas administrateur"], 401);
        }

    }

    public function deleteComment($id)
    {
        $admin = Auth::user();

        if (isset($admin->admin) and ($admin->admin === 1) ) {
            $comment = Forum_comment::find($id);
            $post = Forum_post::find($comment->post_id);
            $post->comments--;
            $post->save();
            $comment->delete();
            return response("Le commentaire a bien été supprimé");
        } else
        {
            return response()->json(["error" => "L'utilisateur connecté n'est pas administrateur"], 401);
        }

    }
}
