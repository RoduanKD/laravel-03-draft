<?php

namespace App\Http\Resources\Api\V1;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
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
            'titleEn'   => $this->title_en,
            'titleAr'   => $this->title_ar,
            'slug'      => $this->slug,
            'content'   => $this->content,
            'category'  => $this->category->name,
            'posted_at' => Carbon::parse($this->created_at)->diffForHumans(now()),
        ];
    }
}
