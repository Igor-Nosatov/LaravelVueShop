<?php

namespace App\Repositories\Shop\Review;

use App\Http\Requests\Review\ReviewCreateRequest;
use App\Http\Requests\Review\ReviewUpdateRequest;

interface ReviewRepositoryInterface
{
    public function addReviewComment(ReviewCreateRequest $request);
    public function updateReviewComment(ReviewUpdateRequest $request, int $id);
    public function deleteReviewComment(int $id):void;
}
