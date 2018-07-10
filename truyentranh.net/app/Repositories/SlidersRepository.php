<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use App\Models\Sliders;

class SlidersRepository extends BaseRepository
{

    /***
     *
     * @return string
     */
    public function model()
    {
        return Sliders::class;
    }
}