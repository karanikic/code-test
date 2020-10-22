<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;

class UsersController extends Controller
{
    public function list(User $user)
    {
        $user->load('videos.chapter');

        return ChapterResource::collection($course->chapters);
    }
}
