<?php

namespace Onlinecorrection\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Onlinecorrection\Models\Project;
class Document extends Model implements Transformable
{
    use TransformableTrait;


    protected $fillable =[
        'project_id',
        'name',
        'status',
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }


}
