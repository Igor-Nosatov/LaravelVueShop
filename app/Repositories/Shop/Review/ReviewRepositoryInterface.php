<?php

namespace App\Repositories\Shop\Review;

use App\Http\Requests\Review\ReviewCreateRequest;
use App\Http\Requests\Review\ReviewUpdateRequest;
use App\Models\Shop\Review;

interface ReviewRepositoryInterface
{
    /**
     * @param ReviewCreateRequest $request
     * @return mixed
     */
    public function addReviewComment(ReviewCreateRequest $request): mixed;

    /**
     * @param ReviewUpdateRequest $request
     * @param Review $review
     * @return mixed
     */
    public function updateReviewComment(ReviewUpdateRequest $request, Review $review):Review;

    /**
     * @param Review $review
     * @return void
     */
    public function deleteReviewComment(Review $review):void;
}
