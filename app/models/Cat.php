<?php


class Cat extends Eloquent {
	
	protected $fillable = array('name', 'dade_of_birth', 'breed_id');

	public function breed() {
		return $this->belongsTo('Breed');
	}
}