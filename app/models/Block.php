<?php

class Block extends \Eloquent {
    
    public static $rules = [
        'title' => 'required',
        'value' => 'required',
    ];
    
    protected $fillable = [];
    
    protected $guarded = ['id'];
}