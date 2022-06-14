<?php

	namespace App;

	use Illuminate\Database\Eloquent\Model;

	class ComputoInterventionFolder extends Model
	{
		protected $guarded = [];

		public function interventions() {
			return $this->hasMany(ComputoInterventionRow::class);
		}

		public function parent() {
			return $this->belongsTo(ComputoInterventionFolder::class, 'parent_id', 'id');
		}

		public function folders() {
			return $this->hasMany(ComputoInterventionFolder::class, 'parent_id', 'id');
		}
	}
