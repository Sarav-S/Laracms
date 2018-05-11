<?php

namespace App\Http\Controllers\API;

use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Transformers\PostTransformer;

class PostController extends Controller
{
    public function index()
    {
        $posts = DB::table('posts')
            ->join('categories', 'categories.id', '=', 'posts.category_id')
            ->select('posts.title', 'posts.created_at', 'categories.name')
            ->paginate();
        
        collect($posts->items())->each(
            function ($item) {
                return (new PostTransformer)->transform($item);
            }
        );


        return response()->json(
            [
                'status' => 'OK',
                'data'   => $posts
            ], 200
        );
    }
}
