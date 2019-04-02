<?php

namespace App;

class Orders extends BaseModel
{
    protected $fillable = ['client_id', 'service_id'];

    public function client()
    {
        return $this->belongsTo('App\Client');
    }
	
    public function service()
    {
        return $this->belongsTo('App\Service');
    }

}
