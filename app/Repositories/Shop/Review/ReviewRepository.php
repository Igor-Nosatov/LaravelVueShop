<?php

namespace App\Repositories\Shop\Review;


use App\Repositories\Shop\Review\ReviewRepositoryInterface;
use App\Http\Requests\Review\ReviewCreateRequest;
use App\Http\Requests\Review\ReviewUpdateRequest;
use App\Models\Shop\Review;

class ReviewRepository implements ReviewRepositoryInterface
{
    public function addReviewComment(ReviewCreateRequest $request)
    {
        $review = Review::create($request->all());
        return $review;
    }
    public function updateReviewComment(ReviewUpdateRequest $request, Review $review)
    {
         $review->update($request->all());
         return $review; 
    }
    public function deleteReviewComment(Review $review):void
    {
        $review->delete();
    }
}

