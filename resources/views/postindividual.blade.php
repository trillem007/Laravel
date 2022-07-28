


@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="container">


                    <div class="instagram-card">
    <div class="instagram-card-header">
    @if ($image->user->image)


    <img style="height:50px; width:50px; " src="{{ route('user.avatar', ['filename'=>$image->user->image])}}" class="rounded-circle ">
    @endif
  
    <a class="instagram-card-user-name" href="https://www.instagram.com/followmeto/">{{$image->user->nick}}</a>
      <div class="instagram-card-time">{{\FormatTime::LongTimeFilter($image->created_at)}}</div>
    </div>
  
    <div class="intagram-card-image">
    <img  src="{{ route('user.post', ['filename'=> $image->image_path ])}}" class="post">
    </div>
  
    <div class="instagram-card-content">
      <p class="likes"> Me gusta</p>
      <p><a class="instagram-card-content-user" href="https://www.instagram.com/followmeto/">{{$image->user->nick}} </a> {{$image->description}}</p>
      <p class="comments">ver los  comentarios</p>
    <hr>
    @if (count($image->comments)>=1)
        @foreach ($image->comments as $key => $comment)
        <p><img style="height:50px; width:50px; " src="{{ route('user.avatar', ['filename'=>$comment->user->image])}}" class="rounded-circle "><b>{{$comment->user->name}}:  </b>
        
          {{$comment->content}} <span class="instagram-card-time">{{\FormatTime::LongTimeFilter($comment->created_at)}}</span>
        @if ($comment->user->name==Auth::user()->name)  
        <a href="{{ route('borrarcomentari', ['comentari'=> $comment->id ])}}" class="myButton">Borrar </a></p>
        @endif
        @endforeach

      @endif
    </div>
    
    <div class="instagram-card-footer">
      <a class="footer-action-icons" href="#"><i class="fa fa-heart-o"></i></a>
      <form method="POST" action="{{ route('afegircomentari') }}" >
        @csrf
        <input type="hidden" value="{{$image->id}}" name="imatgeid">
        <br>
        <textarea id="comentari" type="text" rows="5" class="form-control @error('comentari') is-invalid @enderror" name="comentari" value="{{ old('comentari') }}" autocomplete="comentari"></textarea>
        <br>
        <button type="submit" class="btn btn-primary" onclick="return confirm('Vols publicar el comentari?')">
            {{ __('Comentar') }}
        </button>


      </form>
      <a class="footer-action-icons" href="#"><i class="fa fa-ellipsis-h"></i></a>
    </div>

  </div>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
