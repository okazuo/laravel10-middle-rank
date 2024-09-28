<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->resource['id'],
            'body' => $this->resource['body'],
            "_links" => [
                'self' => [
                    'href' => sprintf(
                        'https://example.com/comments/%s',
                        $this->resource['id']
                    )
                ]
            ],
            '_embedded' => [
                'user_id' => new UserResource(
                    [
                        'user_id' => $this->resource['user_id'],
                        'user_name' => $this->resource['user_name']
                    ]
                )
            ],
        ];
    }
}
