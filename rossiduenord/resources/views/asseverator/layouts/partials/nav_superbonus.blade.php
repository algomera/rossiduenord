<div class="nav_bonus d-flex align-items-center ov-x ov-y-none">
    <a href="{{ route('asseverator.superbonus.show', [$practice->id, $building->id]) }}" class="{{Route::currentRouteName() == 'asseverator.superbonus.show' ? 'frame' : ''}} text-nowrap px-3">Dati di Progetto</a>
    <a href="{{ route('asseverator.driving_intervention', [$practice, 'PV']) }}" class="{{Route::currentRouteName() == 'asseverator.driving_intervention' ? 'frame' : ''}} text-nowrap px-3">Interventi trainanti</a>
    <a href="{{ route('asseverator.towed_intervention', [$practice, 'common', 'PV']) }}" class="{{Route::currentRouteName() == 'asseverator.towed_intervention' ? 'frame' : ''}} text-nowrap px-3">Interventi trainati</a>
    <a href="{{ route('asseverator.final_state', [$practice]) }}" class="{{Route::currentRouteName() == 'asseverator.final_state' ? 'frame' : ''}} text-nowrap px-3">Dati stato finale</a>
    <a href="{{ route('asseverator.fees_declaration', [$practice]) }}" class="{{Route::currentRouteName() == 'asseverator.fees_declaration' ? 'frame' : ''}} text-nowrap px-3">Tot. Spese e Dichiarazioni</a>
    <a href="{{ route('asseverator.var_computation', [$practice]) }}" class="{{Route::currentRouteName() == 'asseverator.var_computation' ? 'frame' : ''}} text-nowrap px-3">Varianti</a>
</div>
