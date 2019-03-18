@extends('main')
@section('content')
	<div class="col-lg-6 col-md-10 mx-auto">
		<form action="{{url('edit-post/'.$post->post_id)}}" method="POST" enctype="multIpart/form-data">
		  {!! csrf_field() !!}

			@if(session('error'))
				<div class="alert alert-danger">
					{{session ('error')}}
				</div>
			@endif
			<div class="form-group">
				<center><img src="{!! url($post->post_image) !!}"></center>				
			</div>

			<div class="form-group">
				<label for="post-title">Título</label>
				<input type="text" class="form-control" name="post-title" id="post-title" value="{!! $post->post_title !!}">
			</div>
			<div class="form-group">
				<label for="post-body">Conteúdo</label>
				<textarea class="form-control" name="post-body" id="post-body" columns="10" rows="3">{!! $post->post_body !!}</textarea>
			</div>
			<div class="form-group">
				<label for="post-image">Imagem</label>
				<input type="file" class="form-control" name="post-image" id="post-image">
			</div>
			<button type="submit" class="btn btn-primary">Postar</button>
		</form>
	</div>
@endsection