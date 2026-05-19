@extends(layout.app)
@section('content')
    @foreach($courses as $course)
        <h3>{{ $course->title }}</h3>
        @can('update', $course)
            <a href="{{ route('courses.edit', $course->id) }}">
                Modifier
            </a>
        @endcan
        @can('delete', $course)
            <form action="{{ route('courses.destroy', $course->id) }}" method="POST">
                @csrf
                @method('DELETE')

                <button type="submit">
                    Supprimer
                </button>
            </form>
        @endcan
        @cannot('update', $course)
            <p>Vous ne pouvez pas modifier ce cours</p>
        @endcannot

    @endforeach




@endsection