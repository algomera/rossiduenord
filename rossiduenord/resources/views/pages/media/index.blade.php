@extends('layouts.app')

@section('content')
    @include('layouts.partials.practiceNav')

    <div v-if="isPhotos">
        @include('layouts.partials.photos')
    </div>
    <div v-if="isVideos">
        @include('layouts.partials.videos')
    </div>

@endsection