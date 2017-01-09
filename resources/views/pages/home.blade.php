@extends('main')
@section('title','Laravel |Home')
@section('content')
 <div class="jumbotron">
    <h1>Navbar example</h1>
        <p>This example is a quick exercise to illustrate how the default, static and fixed to top navbar work. It includes the responsive CSS and HTML, so it also adapts to your viewport and device.</p>
        <p>To see the difference between static and fixed top navbars, just scroll.</p>
        <p>
          <a class="btn btn-lg btn-primary" href="#" role="button">View navbar docs &raquo;</a>
        </p>
  </div>


  <div class="row">
      
      <div class="col-md-8">
           @foreach($posts as $post)
           <hr>
            <div class="post">

                 <h1>{{$post->title}}</h1>
                 <p>{{ substr($post->body,0,100) }}{{ strlen( $post->body )> 100 ? "..." :"" }}</p>
                  <p><a class="btn btn-primary btn-lg" href="{{route('blog.single',$post->slug)}}" role="button">Learn more</a></p>

            </div>
            
          
         @endforeach
       </div>
        
      
        <div class="col-md-3 col-md-offset-1">
                  
                  <div >
                        <h1>sidebar</h1>
                     
                  </div>

        </div>


  </div>
  @endsection