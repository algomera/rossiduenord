<?php

	namespace App\Http\Livewire\Practice\Modals\Computo;

	use LivewireUI\Modal\ModalComponent;

	class Computo extends ModalComponent
	{
		public $tabs = [
			'computo'  => 'Computo Metrico',
			'fees'   => 'IVA e spese professionali',
			'recap'   => 'Riepilogo massimali',
		];
		public $selectedTab = 'computo';

		protected $listeners = [
			'change-tab' => 'changeTab'
		];

		public static function modalMaxWidth(): string {
			return 'full';
		}

		public function render() {
			return view('livewire.practice.modals.computo.computo');
		}
	}
