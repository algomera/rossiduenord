@extends('asseverator.layouts.asseverator')
@section('content')
<div class="px-20">
    <div class="bg-white py-5 px-20">
        <div class="">
            <a href="{{url()->previous()}}" class="black"> <i class="fa-solid fa-arrow-left"></i> Torna indietro</a>
            <p class="black text-md"> <b>{{$modified->name}}</b> </p>
            <hr class="bg-black">
        </div>
        <div>
            <div class="col-12" style="height: 55vh;">
                <div class="preview h-100">
                    <iframe src="https://www.orimi.com/pdf-test.pdf" type="" frameborder="0" class="w-100 h-100"></iframe>
                </div>
            </div>
            <div class="col-3 mt-3">
                <form action="{{route('asseverator.policies.modified.delete', $modified)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Elimina</button>
                </form>
            </div>
        </div>
    </div>
</div>
    
@endsection