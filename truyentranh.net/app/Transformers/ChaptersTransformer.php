<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\Chapters;

class ChaptersTransformer extends TransformerAbstract
{

    public function transform(Chapters $chapters)
    {
        return [
            'id'         => (int)$chapters->id,
            'name'       => $chapters->name,
            'sticky'     => $chapters->sticky,
            'status'     => $chapters->status,
            'created_at' => (string)$chapters->created_at,
        ];
    }
}
