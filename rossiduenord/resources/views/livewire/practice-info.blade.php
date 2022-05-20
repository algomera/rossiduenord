<div class="fixed bottom-0 left-[280px] right-0 border-t bg-white flex px-4 py-3">
	<div class="w-full flex justify-between items-center">
		<div class="flex items-center space-x-2">
			<span class="text-sm text-blue-400">N° Pratiche in lista</span>
			<div class="border-2 border-blue-300 px-4 w-32 text-center">
				<span class="text-sm font-bold">{{$practices->count()}}</span>
			</div>
		</div>
		<div class="flex space-x-6 text-center">
			<div class="flex items-center space-x-2">
				<span class="text-sm text-blue-400">Importo SAL €</span>
				<div class="border-2 border-blue-300 px-4 w-32 text-center">
					<span class="text-sm font-bold">{{ Money::format($practices->sum('import_sal')) }}</span>
				</div>
			</div>
			<div class="flex items-center space-x-2">
				<span class="text-sm text-blue-400">Importo SAL stimato €</span>
				<div class="border-2 border-blue-300 px-4 w-32 text-center">
					<span class="text-sm font-bold">{{ Money::format($practices->sum('import')) }}</span>
				</div>
			</div>
		</div>
	</div>
</div>