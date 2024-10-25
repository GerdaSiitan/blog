@extends('partials.layout')
@section('content')
        <div class="card-body">
            <div class="flex justify-center">
                {{ $posts->links() }}
            </div>
            <div class="grid grid-cols-4 gap-4">
                @foreach($posts as $post)
                    <div class="card bg-base-100 shadow-md min-h-full">
                        <figure>
                            <img src="https://img.daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.webp"
                                alt="Post Image" />
                        </figure>
                        <div class="card-body">
                            <h2 class="card-title">{{ $post->title }}</h2>
                            <p>{{ $post->snippet }}</p>
                            <div class="card-actions justify-end">
                                <a href="{{ route('post', ['post' => $post]) }}" class="btn btn-primary">Read More</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
