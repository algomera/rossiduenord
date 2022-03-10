@extends('business.layouts.business')

@section('content')
    @include('business.layouts.partials.error')
    @include('business.layouts.partials.message')
    @include('business.layouts.partials.practiceNav')

    <div class="nav_bonus">
        <span @click="showpage1" :class="[showDati ? 'frame' : ''] ">Dati di Progetto</span>
        <span @click="showpage2" :class="[showInterventi ? 'frame' : ''] ">Interventi trainanti</span>
        <span>Interventi trainanti +</span>
        <span>Dati stato finale</span>
        <span>Tot. Spese e Dichiarazioni</span>
        <span>Varianti</span>
    </div>

    <div v-if="showDati">
        @include('business.layouts.partials.data_progect')
    </div>

    <div v-if="showInterventi">
        @include('business.layouts.partials.driving_interventions')
    </div>
@endsection