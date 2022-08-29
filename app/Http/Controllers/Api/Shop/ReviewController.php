<?php

namespace App\Http\Controllers\Api\Shop;

use App\Http\Controllers\Api\BaseController;
use App\Repositories\Shop\Review\ReviewRepositoryInterface;
use App\Http\Requests\Review\ReviewCreateRequest;
use App\Http\Requests\Review\ReviewUpdateRequest;

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

    /**
     * @param ReviewCreateRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(ReviewCreateRequest $request)
    {
        $response = $this->reviewRepository->addReviewComment($request);
        return $this->createResponse($response, 'Review Create');
    }

    /**
     * @param ReviewUpdateRequest $request
     * @param Review $review
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(ReviewUpdateRequest $request, Review $review)
    {
        $response = $this->reviewRepository->updateReviewComment($request, $review);
        return $this->successResponse($response, 'Review Update');
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
