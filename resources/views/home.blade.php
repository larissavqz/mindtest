@extends('main')

@section('content')

  <!-- Main Content -->
  	<div class="container">
    	<div class="row">
	      <div class="col-lg-8 col-md-10 mx-auto">
	        <?php foreach ($post as $key => $value): ?>
	        	<div class="post-preview">
	        		<center>	        			
		            	<h2 class="post-title">
		              		{!! $value->post_title !!}
		            	</h2>
		            
		              <img src="{!! url($value->post_image) !!}">
		          			     
			          <article>
					    <div class="container">
					      <div class="row">
					        <div class="col-lg-8 col-md-10 mx-auto">
					          <p class="text-justify">
					          	{!! substr($value->post_body, 0, 150).'...' !!}
					          	<a href="view-post/{{$value->post_id}}">Read More</a>
					          </p>

					        </div>
					      </div>
					    </div>
					  </article>
			          <p class="post-meta">
			          	Posted on {!! \Carbon\Carbon::parse($value->created_at)->diffForHumans()!!}

			            <a href="{!! url('edit-post/'.$value->post_id) !!}" class="btn btn btn-outline-secondary btn-sm" role="button">Editar</a>
						<a href="{!! url('delete-post/'.$value->post_id) !!}" class="btn btn btn-outline-danger btn-sm" role="button">Deletar</a>
			          </p>
		          </center>
		        </div>
		        <hr>
			<?php endforeach; ?>
		  </div>
 		</div> 
   </div>

@endsection
