@extends('business.layouts.business')

@section('content')
    @include('business.layouts.partials.error')
    @include('business.layouts.partials.message')
    @include('business.layouts.partials.practiceNav')

            <div class="nav_bonus">
                <span @click="showpage1" :class="[showDati ? 'frame' : ''] ">Dati di Progetto</span>
                <span @click="showpage2" :class="[showInterventi ? 'frame' : ''] ">Interventi trainanti</span>
                <span @click="showpage3" :class="[showInterventi2 ? 'frame' : ''] ">Interventi trainanti +</span>
                <span @click="showpage4" :class="[showState ? 'frame' : ''] ">Dati stato finale</span>
                <span @click="showFeesPage" :class="[showFees ? 'frame' : ''] " >Tot. Spese e Dichiarazioni</span>
                <span>Varianti</span>
            </div>

            <div v-if="showDati">
                @include('business.layouts.partials.data_progect')
            </div>

            <div v-if="showInterventi">
                @include('business.layouts.partials.driving_interventions')
            </div>

            <div v-if="showInterventi2">
                @include('business.layouts.partials.driving_interventions2')
            </div>

            <div v-if="showState">
                @include('business.layouts.partials.final_state_date')
            </div>

            <div v-if="showFees" >
                @include('business.layouts.partials.fees_declarations')
            </div>

        </div>{{-- chiusura div box praticeNav--}}

    </div>{{-- chiusura div content-main praticeNav --}}
    <div class="box-fixed">
        <button class="back-button mr-2">Annulla</button>
        <button class="add-button">Conferma</button>
    </div>


@endsection