<?php

namespace App\Transformers;

use Carbon\Carbon;
use League\Fractal\TransformerAbstract;

class PostTransformer extends TransformerAbstract
{
    /**
     * Returns the transformed post array
     * 
     * @param App\Post $params Post instance
     * 
     * @return array
     */
    public function transform($params)
    {
        $created_at = Carbon::createFromFormat(
            'Y-m-d H:i:s', 
            $params->created_at
        )->format('d-m-Y');

        $params->title      = (string) $params->title;
        $params->created_at = (string) $created_at;

        return $params;
    }
}
