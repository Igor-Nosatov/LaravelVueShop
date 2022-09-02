<?php

namespace App\Repositories\Shop\Shoes;

use App\Models\Shop\Shoes;
use Illuminate\Http\Request;

interface ShoesRepositoryInterface
{
    /**
     * @return array
     */
    public function getShoesData():array;

    public function getShoesSingleData(Shoes $shoes);
}
