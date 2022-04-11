@extends('business.layouts.business')

@section('content')
    @include('business.layouts.partials.practiceNav')

    <div v-if="isPhotos">
        @include('business.layouts.partials.photos')
    </div>
    <div v-if="isVideos">
        @include('business.layouts.partials.videos')
    </div>

@endsection