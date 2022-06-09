<?php

	use App\ContractualDocument;
	use Illuminate\Database\Seeder;

	class ContractualDocumentsSeeder extends Seeder
	{
		/**
		 * Run the database seeds.
		 *
		 * @return void
		 */
		public function run() {
			ContractualDocument::truncate();
			$documents = [
				'Questionario Antiriciclaggio',
				'Atto Costitutivo',
				'Documento d\'identità',
				'Frontespizio IBAN',
				'Statuto Vigente',
				'Ultimo Bilancio Approvato',
				'Documento Titolare Effettivo 1',
				'Contratto Superbonus 110%',
				'Acc.ctr Superbonus 110%'
			];
			foreach ($documents as $document) {
				ContractualDocument::create([
					'name' => $document,
					'slug' => \Illuminate\Support\Str::slug($document),
				]);
			}
		}
	}
