<?php

namespace App\Repositories\Shop\Favourite;

use App\Http\Requests\Favourite\FavouriteCreateRequest;
use App\Models\Shop\Favourite;
use App\Models\Shop\Shoes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Console\Input\Input;

class FavouriteRepository implements FavouriteRepositoryInterface
{
    /**
     * @param FavouriteCreateRequest $request
     * @return mixed
     */
    public function addToFavouriteForm(FavouriteCreateRequest $request)
    {
        $checkFavourite = Favourite::where('user_id', Auth::id())
            ->where('shoes_id', $request['shoes_id'])
            ->first();

        if ($checkFavourite === null) {
            $addFavourite =  Favourite::create($request->all());
        }
        return $addFavourite;
    }

    /**
     * @param Favourite $favourite
     * @return void
     */
    public function deleteFromFavourite(Favourite $favourite): void
    {
        $favourite->delete();
    }

    public function getFavouriteDataAccount(): array
    {
        $favouriteData = Favourite::where('user_id', Auth::id())->get();

        $favouriteArrayData = [];
        foreach ($favouriteData as $value) {

            $shoesData = Shoes::with(['images', 'color', 'category'])->find($value['shoes_id']);
            $favouriteArrayData[] = [
                'favourite_id' => $value->id,
                'id' => $shoesData['id'],
                'title' => $shoesData['title'],
                'price' => ($shoesData['price']) / 100,
                'category' => $shoesData['category']['name'],
                'type' => $shoesData['type']['name'],
                'color' => $shoesData['color']['name'],
                'image_url' => Storage::disk('public')->url('img/' .  $shoesData['images']['0']['name'] . '.webp')
            ];
        }

        return $favouriteArrayData;
    }
}
