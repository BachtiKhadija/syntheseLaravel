<x-layout>
<h2>Corbeille des cours</h2>

<table border="1" class="table table-striped">
    <tr>
        <th>ID</th>
        <th>Nom</th>
        <th>Actions</th>
    </tr>

    @foreach($courses as $course)
        <tr>
            <td>{{ $course->id }}</td>
            <td>{{ $course->title }}</td>
            <td>
                <form action="{{ route('courses.restore', $course->id) }}" method="POST">
                    @csrf
                    <button type="submit">Restore</button>
                </form>

                <form action="{{ route('courses.forceDelete', $course->id) }}" method="POST" onsubmit="return confirm('Supprimer définitivement ?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Force Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
</table>




</x-layout>