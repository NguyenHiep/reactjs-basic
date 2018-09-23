<?php

namespace App\Transformers;

use League\Fractal\Serializer\ArraySerializer;

class CustomSerializer extends ArraySerializer
{

    public function collection($resourceKey, array $data)
    {
        return $data;
    }
}