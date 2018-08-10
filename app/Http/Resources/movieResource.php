<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class movieResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'title' => $this->title,
            'year' => $this->year
        ];
    }

//     public function with($request)
//     {
//         return ['moji'=>'awesome'];
//     }
}
