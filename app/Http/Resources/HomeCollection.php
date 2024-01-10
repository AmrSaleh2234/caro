<?php
namespace App\Http\Resources;
use App\Http\Resources\DecisionResource;
use App\Http\Resources\EmployeeResource;


class HomeCollection extends MainResourceCollection
{
    public function toArray($request)
    {
        return [
            // 'employee' => new EmployeeResource($this->collection['employee']),
            'decisions' => DecisionResource::collection($this->collection['decisions']),
        ];
    }
}
