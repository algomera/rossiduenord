<?php

	namespace App\Http\Livewire\Practice\Tabs\Media\Modals;

	use App\Photo as PhotoModel;
	use LivewireUI\Modal\ModalComponent;

	class Lightbox extends ModalComponent
	{
		public PhotoModel $photo;

		public function mount(PhotoModel $photo) {
			$this->photo = $photo;
		}

		public function render() {
			return view('livewire.practice.tabs.media.modals.lightbox');
		}
	}
