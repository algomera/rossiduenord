@extends('asseverator.layouts.asseverator')

@section('content')
    @include('asseverator.layouts.partials.practiceNav')

    <div v-if="isPhotos">
        @include('asseverator.layouts.partials.photos')
    </div>
    <div v-if="isVideos">
        @include('asseverator.layouts.partials.videos')
    </div>

@endsection