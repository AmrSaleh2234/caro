<?php
namespace App\Traits;
trait ProductFilterTrait
{
    public function scopeFilterSearch($query, $filters)
    {
        return $query
            ->when($filters['category_id'] > 0, function ($query) use ($filters) {
                return $query->whereHas('categories', function ($subQuery) use ($filters) {
                    $subQuery->where('id', $filters['category_id']);
                });
            })
            ->when($filters['offer'] > -1, function ($query) use ($filters) {
                return $query->where('offer', $filters['offer']);
            })
            ->when($filters['feature'] > -1, function ($query) use ($filters) {
                return $query->where('feature', $filters['feature']);
            })
            ->when($filters['price_min'] > 0, function ($query) use ($filters) {
                return $query->where('price', '>=', $filters['price_min']);
            })
            ->when($filters['price_max'] >= $filters['price_min'] && $filters['price_max'] > 0, function ($query) use ($filters) {
                return $query->where('price', '<=', $filters['price_max']);
            })
            ->when($filters['search'] !== '' && $filters['search'] !== 'ar' && $filters['search'] !== 'en', function ($query) use ($filters) {
                $searchValues = preg_split('/\s+/', $filters['search'], -1, PREG_SPLIT_NO_EMPTY);
                return $query->where(function ($subQuery) use ($searchValues) {
                    foreach ($searchValues as $value) {
                        $subQuery->orWhere("name", 'like', '%' . $value . '%')->orWhere('code', 'like', '%' . $value . '%')->orWhere('content', 'like', '%' . $value . '%');
                    }
                });
            });
    }
}
