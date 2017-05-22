@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="page-header">
                <h3>All Posts</h3>
            </div>
            @forelse ($post as $post)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        {{ $post->title }}
                    </div>

                    <div class="panel-body">
                        {{ $post->body }}
                        @if (Auth::check())
                        <div class="panel-footer">
                            <favorite
                                :post={{ $post->id }}
                                :favorited={{ $post->favorited() ? 'true' : 'false' }}
                            ></favorite>
                        </div>
                        @endif
                    </div>
                </div>
            @empty
                <p>No post created.</p>
            @endforelse

        </div>
    </div>
</div>
@endsection