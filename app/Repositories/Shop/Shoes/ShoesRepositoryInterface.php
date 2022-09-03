<?php

namespace App\Repositories\Shop\Shoes;

use App\Models\Shop\Shoes;
use Illuminate\Http\Request;

interface ShoesRepositoryInterface
{
    /**
     * @return array
     */
    public function getShoesData(Request $request, int $paginationParam = 9);

    public function getShoesSingleData(Shoes $shoes);
}
