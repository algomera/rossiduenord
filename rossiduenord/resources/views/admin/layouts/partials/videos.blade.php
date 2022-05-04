<div class="bg-white">
    <div class="nav_bonus">
        <a  :class="{frame :isPhotos }"  @click="photos()">Foto</a> 
        <a  :class="{frame : isVideos}" @click="videos()">Videoispezioni</a>
    </div>
    <div class="px-20 py-5">
        <div class="row">
            <div class="col-4">
                <div class="preview mt-2">
                    <img src="{{asset('img/placeholder.png')}}" alt="" class="img-fluid">
                </div>
            </div>
            <div class="col-8">
                <div class="table mt-2">
                    <table class="table_bonus" style="width: 100%">
                        <thead>
                            <tr style="border-top: 1px solid #707070">
                                <th style="width: 10%">Data Caricamento</th>
                                <th style="width: 15%">Descrizione</th>
                                <th style="width: 10%">Riferito a </th>
                                <th style="width: 15%">Data ispezione</th>
                                <th style="width: 10%">Link</th>
                                <th style="width: 10%">Nome del file</th>
                            </tr>
                        </thead>
                        <tbody id="table_ContentList">
                            @forelse ($videos as $video)
                                    <tr>
                                        @if ($video->name != '')
                                        <td >{{$video->created_at->format('d/m/y')}}</td> 
                                        @endif
                                        @if ($video->name != '') 
                                        <td>{{$video->description}}</td> 
                                        @endif
                                        @if ($video->name != '')
                                        <td >Sal 1 </td> 
                                        @endif
                                        @if ($video->name != '')
                                        <td > {{$video->inspection_date ? $video->inspection_date->format('d/m/y') : ''}}</td> 
                                        @endif
                                        @if ($video->name != '')
                                        <td class="text-decoration-underline"> <a href="" class="text-light"> <ins>Apri</ins> </a> </td> 
                                        @endif
                                        @if ($video->name != '')
                                        <td >{{$video->name}}</td> 
                                        @endif
                                    </tr>
                                @empty
                                    Nessun video 
                                @endforelse 
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>