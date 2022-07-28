


@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="container">


                    @foreach ($data as $key => $image)
                    <div class="instagram-card" >
    <div class="instagram-card-header">
    @if ($image->user->image)
    <img style="height:50px; width:50px; " src="{{ route('user.avatar', ['filename'=>$image->user->image])}}" class="rounded-circle ">


    @endif
  
    <a class="instagram-card-user-name" href="https://www.instagram.com/followmeto/">{{$image->user->nick}}</a>
      <div class="instagram-card-time">{{\FormatTime::LongTimeFilter($image->created_at)}}</div>
    </div>
  
    <div class="intagram-card-image">
    <a href="{{ route('get.post', ['filename'=> $image->image_path ]) }}"><img  src="{{ route('user.post', ['filename'=> $image->image_path ])}}" class="post"></a>
    </div>
  
    <div class="instagram-card-content">
      <p class="likes" > Me gusta    
</p>
      <p><a class="instagram-card-content-user" href="https://www.instagram.com/followmeto/">{{$image->user->nick}} </a> {{$image->description}}</p>

    </div>
    
    <div class="instagram-card-footer">

    </div>

  </div>
  @endforeach
{!! $data->links() !!}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
