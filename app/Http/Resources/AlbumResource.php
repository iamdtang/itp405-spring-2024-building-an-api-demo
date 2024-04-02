<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AlbumResource extends JsonResource
{
    public static $wrap = 'album';

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return parent::toArray($request);
    }

    public function with(Request $request)
    {
        $sideloadedData = [];

        if ($request->query('include')) {
            $relationshipsToSideload = explode(',', $request->query('include'));

            foreach ($relationshipsToSideload as $relationship) {
                $sideloadedData[$relationship] = $this->$relationship;
            }
        }

        return $sideloadedData;
    }
}
