<?php

	namespace App\Http\Livewire\Practice\Modals\Computo\Tabs;

	use Livewire\Component;

	class Computo extends Component
	{
		public $intervention_types = [
			[
				'key'    => 'interventi_trainanti',
				'label'  => 'Interventi Trainanti',
				'childs' => [
					[
						'key'    => 'isolamento_termico',
						'label'  => 'Isolamento Termico',
						'childs' => [
							[
								'key'   => 'child_1',
								'label' => 'Child 1'
							],
						],
					],
					[
						'key'   => 'sostituzione_degli_impianti',
						'label' => 'Sostituzione degli impianti'
					],
					[
						'key'   => 'interventi_di_miglioramento_sismico',
						'label' => 'Interventi di miglioramento sismico'
					],
				]
			]
		];
		public $selectedTab = null;
		public $selectedInterventionType = null;

		public function render() {
			return view('livewire.practice.modals.computo.tabs.computo');
		}
	}
