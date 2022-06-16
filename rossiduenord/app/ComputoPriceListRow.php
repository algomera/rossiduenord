<?php

	namespace App;

	use Illuminate\Database\Eloquent\Model;

	class ComputoPriceListRow extends Model
	{
		protected $guarded = [];

		public function price_list() {
			return $this->belongsTo(ComputoPriceList::class, 'folder_id', 'id');
		}

		public function parent() {
			return $this->belongsTo(self::class, 'parent_id');
		}
	}
