<?php

class Category extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = [];
    protected $guarded = ['id'];
    
    public function articles(){
        return $this->hasMany('Articles');
    }
}