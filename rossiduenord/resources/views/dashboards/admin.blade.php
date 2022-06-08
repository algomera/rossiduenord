<x-app-layout>
	<x-slot name="header">
		<x-page-header>
			Dashboard
		</x-page-header>
	</x-slot>
	<x-card>
		<div>
			<h3 class="text-lg leading-6 font-medium text-gray-900">Statistiche:</h3>
			<dl class="mt-5 grid grid-cols-1 gap-5 sm:grid-cols-3">
				<div class="px-4 py-5 bg-white border rounded-lg overflow-hidden sm:p-6">
					<dt class="text-sm font-medium text-gray-500 truncate">Pratiche</dt>
					<dd class="mt-1 text-3xl font-semibold text-gray-900">{{ $data['total_practices'] }}</dd>
				</div>

				<div class="px-4 py-5 bg-white border rounded-lg overflow-hidden sm:p-6">
					<dt class="text-sm font-medium text-gray-500 truncate">Importo Totale</dt>
					<dd class="mt-1 text-3xl font-semibold text-gray-900">{{ Money::format($data['total_import']) }}</dd>
				</div>

				<div class="px-4 py-5 bg-white border rounded-lg overflow-hidden sm:p-6">
					<dt class="text-sm font-medium text-gray-500 truncate">Imprese Iscritte</dt>
					<dd class="mt-1 text-3xl font-semibold text-gray-900">{{ $data['total_business'] }}</dd>
				</div>
			</dl>
		</div>
		<hr>
		<div>
			<h3 class="text-lg leading-6 font-medium text-gray-900">Totali SAL:</h3>
			<dl class="mt-5 grid grid-cols-1 gap-5 sm:grid-cols-3">
				<div class="px-4 py-5 bg-white border rounded-lg overflow-hidden sm:p-6">
					<dt class="text-sm font-medium text-gray-500 truncate">SAL 1</dt>
					<dd class="mt-1 text-3xl font-semibold text-gray-900">{{ Money::format($data['total_sal_1_import']) }}</dd>
				</div>

				<div class="px-4 py-5 bg-white border rounded-lg overflow-hidden sm:p-6">
					<dt class="text-sm font-medium text-gray-500 truncate">SAL 2</dt>
					<dd class="mt-1 text-3xl font-semibold text-gray-900">{{ Money::format($data['total_sal_2_import']) }}</dd>
				</div>

				<div class="px-4 py-5 bg-white border rounded-lg overflow-hidden sm:p-6">
					<dt class="text-sm font-medium text-gray-500 truncate">SAL Finale</dt>
					<dd class="mt-1 text-3xl font-semibold text-gray-900">{{ Money::format($data['total_sal_f_import']) }}</dd>
				</div>
			</dl>
		</div>
	</x-card>
</x-app-layout>