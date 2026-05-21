<header style="background:black;color:white;padding:20px">
    <h1>Gestion des cours</h1>

    <nav>
        <a href="{{url('/courses')}}">Liste cours</a>
        <a href="{{route('courses.create')}}">Ajouter Cours</a>
        <a href="{{ route('courses.trash') }}">Corbeille</a>
    </nav>
</header>