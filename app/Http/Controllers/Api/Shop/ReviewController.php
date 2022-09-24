<?php

namespace App\Http\Controllers\Api\Shop;

use App\Http\Controllers\Api\BaseController;
use App\Repositories\Shop\Review\ReviewRepositoryInterface;
use App\Http\Requests\Review\ReviewCreateRequest;
use App\Http\Requests\Review\ReviewUpdateRequest;
use App\Models\Shop\Review;
use App\Models\Shop\Shoes;

class ReviewController extends BaseController
{
    /**
     * @var ReviewRepositoryInterface
     */
    private ReviewRepositoryInterface $reviewRepository;

    /**
     * @param ReviewRepositoryInterface $reviewRepository
     */
    public function __construct(ReviewRepositoryInterface $reviewRepository)
    {
        $this->reviewRepository = $reviewRepository;
    }

    public function show(Shoes $shoes)
    {
       $response = $this->reviewRepository->showReviewForm($shoes);
       return  $this->successResponse($response, 'Get shoes id and review form');
    }

    public function reviewShow($id)
    {
        $response = $this->reviewRepository->showReviewComment($id);
        return  $this->successResponse($response, 'Get review id and review form');
    }

    /**
     * @param ReviewCreateRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(ReviewCreateRequest $request)
    {
        $response = $this->reviewRepository->addReviewComment($request);
        return $this->createResponse($response->toArray(), 'Review Create');
    }

    /**
     * @param ReviewUpdateRequest $request
     * @param Review $review
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(ReviewUpdateRequest $request, Review $review)
    {
        $response = $this->reviewRepository->updateReviewComment($request, $review);
        return $this->successResponse($response->toArray(), 'Review Update');
    }

    /**
     * @param Review $review
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Review $review)
    {
        $response = $this->reviewRepository->deleteReviewComment($review);
        return $this->emptyResponse('Review Delete');
    }
}
