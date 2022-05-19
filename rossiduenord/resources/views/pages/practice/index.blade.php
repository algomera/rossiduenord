<x-app-layout>
	<x-slot name="header">
		<x-page-header>
			Pratiche
			<x-slot name="actions">
				<form class="relative w-full max-w-xl" action="">
					<div>
						<x-input type="text" placeholder="Cerca.." id="search" name="search"
						         append="search"></x-input>
					</div>
				</form>
			</x-slot>
		</x-page-header>
	</x-slot>
	<livewire:practice.practice-index />
</x-app-layout>