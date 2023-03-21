@extends('dashboard.layout.dashboard')
@section('title', ' عرض المقالات')



@section('content')
    <!-- Main content -->
    @if (session('created_artical'))
        <div class="alert alert-success">
            {{ session('created_artical') }}
        </div>
    @endif
    @if (session('artical_updated'))
        <div class="alert alert-success">
            {{ session('artical_updated') }}
        </div>
    @endif
    @if (session('artical_deleted'))
        <div class="alert alert-danger">
            {{ session('artical_deleted') }}
        </div>
    @endif

    <section class="content">
        <div class="row">
            <div class="col-8">
                @foreach ($articals as $artical)
                    <div class="card">
                        <h5 class="card-header"> {{ $artical->title }}</h5>
                        <div class="card-body">
                            <p class="card-text"> {{ $artical->description }}</p>
                            <p><a href="{{ $artical->url }}">اصغط هنا</a></p>
                            <p><img src="{{ asset('storage/' . $artical->image_url) }}" alt="" height="50"></p>

                            <a href="{{ route('dashboard.articals.edit', $artical->id) }}"
                                class="btn btn-success">تعديل</a>
                            <form method="POST" action="{{ route('dashboard.articals.destroy', $artical->id) }}" style="display: inline;">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger">حذف</button>
                            </form>
                        </div>
                    </div>
                @endforeach



            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

    </section>

    <!-- /.content -->

@endsection('content')



<!-- /.row (main row) -->
