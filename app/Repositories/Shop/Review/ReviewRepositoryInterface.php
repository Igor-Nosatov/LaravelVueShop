<?php

namespace App\Repositories\Shop\Review;

use App\Http\Requests\Review\ReviewCreateRequest;
use App\Http\Requests\Review\ReviewUpdateRequest;
use App\Models\Shop\Review;

interface ReviewRepositoryInterface
{
    public function addReviewComment(ReviewCreateRequest $request);
    public function updateReviewComment(ReviewUpdateRequest $request, Review $review);
    public function deleteReviewComment(Review $review):void;
}
