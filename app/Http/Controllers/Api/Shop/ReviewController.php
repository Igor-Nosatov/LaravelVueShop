<?php

namespace App\Http\Controllers\Api\Shop;

use App\Http\Controllers\Api\BaseController;
use App\Repositories\Shop\Review\ReviewRepositoryInterface;
use App\Http\Requests\Review\ReviewCreateRequest;
use App\Http\Requests\Review\ReviewUpdateRequest;

class ReviewController extends BaseController
{
    private ReviewRepositoryInterface $reviewRepository;

    public function __construct(ReviewRepositoryInterface $reviewRepository)
    {
        $this->reviewRepository = $reviewRepository;
    }

    public function store(ReviewCreateRequest $request)
    {
        $response = $this->reviewRepository->addReviewComment($request);
        return $this->createResponse($response, 'Review Create');
    }

 
    public function update(ReviewUpdateRequest $request, int $id)
    {
        $response = $this->reviewRepository->updateReviewComment($request, $id);
        return $this->successResponse($response, 'Review Update');
    }

  
    public function destroy(int $id)
    {
        $response = $this->reviewRepository->deleteReviewComment($id);
        return $this->emptyResponse('Review Delete');
    }
}
