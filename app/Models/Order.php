<?php

namespace Onlinecorrection\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;


class Order extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable =[
        'user_id',
        'package_id',
        'document_id',
        'evaluation',
        'tipo',
        'tema',
        'coesao',
        'coerencia',
        'gramatica',
        'zero',
        'checked',
    ];


    //belongs
    public function document()
    {
        return $this->belongsTo(Document::class,'document_id','id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function package()
    {
        return $this->belongsTo(Package::class,'package_id','id');
    }

    //belongs

    public function scopeOfOrder($query,$id)
    {
        return $query->where('document_id','=',$id);

    }

    public function scopeUserid($query)
    {
        return  $query->where('user_id','=',auth()->user()->id);
    }

}
