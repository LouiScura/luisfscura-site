<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AdminPostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'title' => $this->title,
            'id' => $this->id,
            'slug' => $this->slug,
            'excerpt' => $this->excerpt,
            'created_at' => $this->created_at,
        ];
    }
}
