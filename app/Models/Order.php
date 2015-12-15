<?php

namespace Onlinecorrection\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;


class Order extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable =[
        'client_id',
        'document_id',
        'evaluation',
        'tipo',
        'tema',
        'coesao',
        'coerencia',
        'gramatica',
        'zero',
    ];

    public function document()
    {
        return $this->belongsTo(Document::class,'document_id','id');
    }

    public function client()
    {
        return $this->belongsTo(Client::class,'client_id','id');
    }

    public function scopeOfOrder($query,$id)
    {
        return $query->where('document_id','=',$id);

    }

    public function scopeClientid($query)
    {
        return  $query->where('client_id','=',auth()->user()->id);
    }

}
