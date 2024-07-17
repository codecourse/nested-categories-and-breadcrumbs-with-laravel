<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Kalnoy\Nestedset\NodeTrait;

class Category extends Model
{
    use HasFactory;
    use NodeTrait;

    public function getPath()
    {
        return cache()->rememberForever('category.path.' . $this->id, function () {
            return Arr::join(
                $this->ancestorsAndSelf($this->id)->map(fn ($ancestor) => $ancestor->slug)->toArray(),
                '/'
            );
        });
    }
}
