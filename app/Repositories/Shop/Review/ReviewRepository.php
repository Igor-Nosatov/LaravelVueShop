<?php

namespace App\Repositories\Shop\Review;


use App\Repositories\Shop\Review\ReviewRepositoryInterface;
use App\Http\Requests\Review\ReviewCreateRequest;
use App\Http\Requests\Review\ReviewUpdateRequest;
use App\Models\Shop\Review;

class ReviewRepository implements ReviewRepositoryInterface
{
    /**
     * @param ReviewCreateRequest $request
     * @return mixed
     */
    public function addReviewComment(ReviewCreateRequest $request):mixed
    {
        return Review::create($request->all());
    }

    /**
     * @param ReviewUpdateRequest $request
     * @param Review $review
     * @return Review
     */
    public function updateReviewComment(ReviewUpdateRequest $request, Review $review):Review
    {
         $review->update($request->all());
         return $review; 
    }

    /**
     * @param Review $review
     * @return void
     */
    public function deleteReviewComment(Review $review):void
    {
        $review->delete();
    }
}

