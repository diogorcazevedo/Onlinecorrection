<?php

namespace Onlinecorrection\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;


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

    public function images()
    {
        return $this->hasMany(DocumentImage::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function scopeFeatured($query)
    {
        return  $query->where('project_id','=',2)
                      ->where('status','<',2)
                      ->where('agent_one', '!=', auth()->user()->id)
                      ->orderBy('status', 'desc')
                      ->orderBy('id', 'asc')
                      ->take(6);
    }

    public function scopeStatus($query,$take)
    {
        return  $query->where('status','=',4)->take($take);
    }
}
