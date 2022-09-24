<?php

namespace App\Repositories\Shop\Review;


use App\Repositories\Shop\Review\ReviewRepositoryInterface;
use App\Http\Requests\Review\ReviewCreateRequest;
use App\Http\Requests\Review\ReviewUpdateRequest;
use App\Models\Shop\Review;
use App\Models\Shop\Shoes;
use Illuminate\Support\Facades\Storage;

class ReviewRepository implements ReviewRepositoryInterface
{
    public function showReviewForm(Shoes $shoes)
    {
        $shoesDataById = $shoes->with([
            'images'
        ])->find($shoes['id']);

        $imageArray = [];
        $reviewArray = [];

        foreach ($shoesDataById['images'] as $value) {
            $imageArray[] = [
                'image_url' =>  Storage::disk('public')->url('img/' .  $value->name . '.webp')
            ];
        }
        foreach ($shoesDataById['reviews'] as $value) {
            $reviewArray[] = $value;
        }
        $shoesArrayById = [
            'id' => $shoesDataById['id'],
            'title' => $shoesDataById['title'],
            'reviewCount' =>  count($reviewArray),
            'image' =>  $imageArray['0']['image_url'],
        ];
        return $shoesArrayById;
    }

    public function showReviewComment($id)
    {
        $review = Review::find($id);
        return $review->toArray();
    }

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

