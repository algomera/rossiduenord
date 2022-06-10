<?php

	namespace App;

	use Illuminate\Database\Eloquent\Model;
	use Illuminate\Support\Facades\Storage;

	class ContractualDocument extends Model
	{
		protected $guarded = [];

		public function exist($user_id) {
			return Storage::disk('public')->has('business/' . $user_id . '/contractual_documents/' . $this->slug);
		}

		public function user() {
			return $this->belongsTo(User::class);
		}
	}
