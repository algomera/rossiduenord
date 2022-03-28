<div class="nav_bonus">
    <a href="{{ route('business.superbonus.show', [$practice->id, $building->id]) }}" class="{{Route::currentRouteName() == 'business.superbonus.show' ? 'frame' : ''}}">Dati di Progetto</a>
    <a href="{{ route('business.practice.index') }}" class="{{Route::currentRouteName() == 'business.update_data_project' ? 'frame' : ''}}">Interventi trainanti</a>
    <a href="{{ route('business.practice.index') }}" class="{{Route::currentRouteName() == 'business.update_vertical_wall' ? 'frame' : ''}}">Interventi trainati</a>
    <a href="{{ route('business.practice.index') }}" class="{{Route::currentRouteName() == 'business.update_towed_vertical_wall' ? 'frame' : ''}}">Dati stato finale</a>
    <a href="{{ route('business.practice.index') }}" class="{{Route::currentRouteName() == 'business.update_final_state' ? 'frame' : ''}}">Tot. Spese e Dichiarazioni</a>
    <a href="{{ route('business.practice.index') }}" class="{{Route::currentRouteName() == '' ? 'frame' : ''}}">Varianti</a>
</div>
