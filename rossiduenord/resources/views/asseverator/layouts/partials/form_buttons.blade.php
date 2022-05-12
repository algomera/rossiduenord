@can('edit_practices')
<div class="box-fixed">
	<a href="{{ route('asseverator.practice.index') }}" class="add-button" style="background-color: #818387" >
		{{ __('Annulla')}}
	</a>
	<button type="submit" class="add-button position-relative ml-2">
		{{ __('Conferma') }}
	</button>
</div>
@endcan