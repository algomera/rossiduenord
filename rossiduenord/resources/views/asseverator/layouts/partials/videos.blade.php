<div class="bg-white">
    <div class="nav_bonus">
        <a  :class="{frame :isPhotos }"  @click="photosPage()">Foto</a> 
        <a  :class="{frame : isVideos}" @click="videosPage()">Videoispezioni</a>
    </div>
    @if(sizeof($videos) > 0)
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
                                    <th style="width: 10%"></th>
                                </tr>
                            </thead>
                            <tbody id="table_ContentList"> 
                                @foreach ($videos as $video)
                                    <tr>
                                        <td>{{$video->created_at->format('d/m/y')}}</td> 
                                        <td>{{$video->description}}</td> 
                                        <td>Sal 1 </td> 
                                        <td>{{$video->inspection_date}}</td> 
                                        <td class="text-decoration-underline"><a href="" class="text-light"><ins>Apri</ins></a></td> 
                                        <td>{{$video->name}}</td> 
                                        <td><button class="add-button">Riproduci</button></td>
                                    </tr>
                                @endforeach   
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="px-20 py-5">
            <h5>Nessun Video caricato!</h5>
        </div>
    @endif

</div>