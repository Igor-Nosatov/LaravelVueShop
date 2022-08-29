<?php

namespace App\Repositories\Shop\Shoes;
use Illuminate\Http\Request;

interface ShoesRepositoryInterface
{
    /**
     * @return array
     */
    public function getShoesData():array;
}
