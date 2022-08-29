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
    public function updateReviewComment(ReviewUpdateRequest $request, int $id)
    {
        $input = $request->all();

         $review = Review::find($id);   
         $review->update($request->all());  
         $review->save();

         return $review; 
    }
    public function deleteReviewComment(int $id):void
    {
        return Review::destroy($id);
    }
}

