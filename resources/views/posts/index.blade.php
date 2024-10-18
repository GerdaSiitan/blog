@extends('partials.layout')
@section('content')

<a href="" class="btn btn-primary">
    add post
</a>

    <div class="flex justify-center">
        {{ $posts->links() }}
    </div>
    <div class="overflow-x-auto">
        <table class="table">
          <!-- head -->
          <thead>
            <tr>
              <th>ID</th>
              <th>Title</th>
              <th>Updater</th>
              <th>Created</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <!-- row 1 -->
                @foreach ( $posts as $post )
                <tr>
                    <td>{{$post->id}}</td>
                    <td>{{$post->title}}</td>
                    <td>{{$post->updated_at}}</td>
                    <td>{{$post->created_at}}</td>
                    <td>
                        <div class="join join-vertical lg:join-horizontal">
                            <a class="btn join-item btn-info">View</a>
                            <a class="btn join-item btn-warning">Edit</a>
                            <a class="btn join-item btn-error">Delete</a>
                          </div>
                    </td>
                </tr>
                @endforeach
                <tfoot>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Updated</th>
                    <th>Created</th>
                    <th>Actions</th>
                </tfoot>
          </tbody>
        </table>
      </div>
@endsection
