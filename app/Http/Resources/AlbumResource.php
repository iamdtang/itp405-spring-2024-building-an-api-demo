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
        // Just to show how we can change the format for both
        // GET /albums and GET /albums/{id}. We may want to expose
        // a different format that doesn't match the database.
        return [
            'id' => $this->AlbumId,
            'title' => $this->Title,
            'artistId' => $this->ArtistId,
        ];
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
