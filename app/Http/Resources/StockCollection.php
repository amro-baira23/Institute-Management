<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class StockCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function paginationInformation($request, $paginated, $default)
    {
        unset($default["meta"]["links"]);
        return $default;
    }
    
    public function toArray($request)
    {
        return parent::toArray($request);
    }
    
}
