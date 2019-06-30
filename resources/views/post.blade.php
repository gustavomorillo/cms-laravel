@extends('layouts.blog-post')

@section('content')

<div class="container">

  <div class="row">

      <!-- Blog Post Content Column -->
      <div class="col-lg-8">

          <!-- Blog Post -->

          <!-- Title -->
          <h1>{{$post->title}}</h1>

          <!-- Author -->
          <p class="lead">
              by <a href="#">{{$post->user->name}}</a>
          </p>

            @if(Session::has('comment_message'))

            <p class="bg-success">{{session('comment_message')}}</p>

            @endif

            @if(Session::has('reply_message'))

            <p class="bg-success">{{session('reply_message')}}</p>

            @endif

          <hr>

          <!-- Date/Time -->
          <p><span class="glyphicon glyphicon-time"></span> Posted on {{$post->created_at->diffForHumans()}}</p>

          <hr>

          <!-- Preview Image -->
          <img class="img-responsive" src="{{$post->photo ? $post->photo->file : "http://placehold.it/400x400" }}" alt="" width="900">

          <hr>

          <!-- Post Content -->
        <p class="lead">{!! $post->body !!}</p>

          <hr>

          <!-- Blog Comments -->
          @if(Auth::check())

          <!-- Comments Form -->
          <div class="well">
              <h4>Leave a Comment:</h4>
              <form method="post" action="{{ action('PostCommentsController@store') }}">
                <input name="_token" type="hidden" value="{{ csrf_token() }}"/>

              <input type="hidden" value="{{$post->id}}" name="post_id">
                  <div class="form-group">
                      <textarea class="form-control" rows="3" name="body"></textarea>
                      
                  </div>
                  <button type="submit" class="btn btn-primary">Submit</button>
              </form>
          </div>

          <hr>

          <!-- Posted Comments -->

          <!-- Comment -->
          @foreach($comments as $comment)
          <!-- Posted Comments -->

          <!-- Comment -->
          <div class="media">
              <a class="pull-left" href="#">
              <img class="media-object" src="{{$user->photo->file}}" alt="" width="64px">
              </a>
              <div class="media-body">
                  <h4 class="media-heading">{{$comment->author}}
                  <small>{{$comment->created_at->diffForHumans()}}</small>
                  </h4>
                  {{$comment->body}}
                  
             

                  @foreach($comment->replies->where('is_active',1) as $reply)

                  


                  @if(count($comment->replies) > 0) 

                
                   <div class="media" id="nested-comment">
                        <a class="pull-left" href="#">
                        <img class="media-object" src="{{$reply->photo}}" alt="" width="64px">
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading">{{$reply->author}}
                                <small>{{$reply->created_at->diffForHumans()}}</small>
                            </h4>
                            {{$reply->body}}

                            {{-- <div class="comment-reply-container"> --}}

                            {{-- <button class="toggle-reply btn btn-primary pull-right">Reply</button>   --}}

                            {{-- <div class="comment-reply col-sm-10"> --}}
                        
                                    {{-- <form method="post" action="{{ action('CommentRepliesController@createReply') }}">

                                        <input type="hidden" value="{{$comment->id}}" name="comment_id">

                                            <div class="form-group">
                                                <label for="body">Body</label>
                                                <textarea name="body" placeholder="Enter reply" class="form-control" rows='1'></textarea>
                                            </div>
                                            {{csrf_field()}}
                                            <div class="form-group">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                    </form> --}}
                            {{-- </div> --}}

                            {{-- </div> --}}


                    </div>
                  </div> 
                    @endif

                    @endforeach 
                    <div class="comment-reply-container">
                   <button class="toggle-reply btn btn-primary pull-right">Reply</button> 

                    <div class="comment-reply col-sm-12">
                    <div id="form-reply">
                        <form method="post" action="{{ action('CommentRepliesController@createReply') }}">
      
                          <input type="hidden" value="{{$comment->id}}" name="comment_id">
      
                              <div class="form-group">
                                  
                                  <textarea name="body" placeholder="Enter reply" class="form-control" rows='1'></textarea>
                              </div>
                              {{csrf_field()}}
                              <div class="form-group pull-right">
                              <button type="submit" class="btn btn-primary">Submit</button>
                              </div>
                      </form>
                      </div>
                     </div> 

                    </div>
                    

                    
              </div>
          </div>

          @endforeach
          

          @endif

      </div>

      <!-- Blog Sidebar Widgets Column -->
      <div class="col-md-4">

          <!-- Blog Search Well -->
          <div class="well">
              <h4>Blog Search</h4>
              <div class="input-group">
                  <input type="text" class="form-control">
                  <span class="input-group-btn">
                      <button class="btn btn-default" type="button">
                          <span class="glyphicon glyphicon-search"></span>
                  </button>
                  </span>
              </div>
              <!-- /.input-group -->
          </div>

          <!-- Blog Categories Well -->
          <div class="well">
              <h4>Blog Categories</h4>
              <div class="row">
                  <div class="col-lg-6">
                      <ul class="list-unstyled">
                        @if($categories)
                        @foreach($categories as $category)
                          <li><a href="#">{{$category->name}}</a> </li>
                          @endforeach
                          @endif
                         
                      </ul>
                  </div>
                  <div class="col-lg-6">
                      <ul class="list-unstyled">
                            @if($categories)
                            @foreach($categories as $category)
                          <li><a href="#">{{$category->name}}</a>
                          </li>
                          @endforeach
                          @endif
                      </ul>
                  </div>
              </div>
              <!-- /.row -->
          </div>

          <!-- Side Widget Well -->
          <div class="well">
              <h4>Side Widget Well</h4>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
          </div>

      </div>

  </div>
  <!-- /.row -->

  <hr>

  <!-- Footer -->
  <footer>
      <div class="row">
          <div class="col-lg-12">
              <p>Copyright &copy; Your Website 2019</p>
          </div>
      </div>
      <!-- /.row -->
  </footer>

</div>


@stop

@section('scripts')

    <script>
    
        $(".toggle-reply").click(function() {

            $(this).next().slideToggle('slow');
        })

    
    </script>


@stop