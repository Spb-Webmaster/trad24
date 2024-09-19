<?php
namespace Domain\Family\ViewModels;

use App\Models\Regobject;
use Support\Traits\Makeable;

class FamilyObjectsViewModel
{
    use Makeable;

    public function objects()
    {
       $query = Regobject::query();
       $query->where('published', 1);
       $query->orderBy('created_at', 'desc');
       $result = $query->paginate(30);
        return $result;

    }




}
