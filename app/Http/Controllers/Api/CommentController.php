<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Jobs\AddNewComment;
use App\Http\Requests\Comment\CreateRequest;
use Illuminate\Http\JsonResponse;

class CommentController extends Controller
{
    /**
     * @param CreateRequest $request
     * @return JsonResponse
     */
    public function store(CreateRequest $request): JsonResponse
    {
        AddNewComment::dispatch($request['subject'], $request['body'], $request['article_id']);

        return response()->json([
            'status' => 'success',
        ], 201);
    }
}
