<x-layout>
   <table class="min-w-full border border-gray-300">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-4 py-2 text-left">Titre</th>
            <th class="border px-4 py-2 text-left">Modification</th>
            <th class="border px-4 py-2 text-left">Suppression</th>
        <th class="border px-4 py-2 text-left">Ctegories</th>
        </tr>
    </thead>

    <tbody>
        @foreach($courses as $course)
            <tr>
                <td class="border px-4 py-2">
                    {{ $course->title }}
                </td>

                <td class="border px-4 py-2">
                    @can('update', $course)
                        <a href="{{ route('courses.edit', $course->id) }}"
                           class="text-blue-600 hover:underline">
                            Modifier
                        </a>
                    @else
                        <span class="text-red-500">
                            Non autorisé
                        </span>
                    @endcan
                </td>

                <td class="border px-4 py-2">
                    @can('delete', $course)
                        <form action="{{ route('courses.destroy', $course->id) }}"
                              method="POST">
                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                    class="bg-red-500 text-white px-3 py-1 rounded">
                                Supprimer
                            </button>
                        </form>
                    @else
                        <span class="text-gray-500">
                            Non autorisé
                        </span>
                    @endcan
                </td>
                <td>
                    <a href="{{ route('courses.categories.edit', $course->id) }}"
                    class="btn btn-info btn-sm">
                        Categories
                    </a>
               </td>
            </tr>
        @endforeach
    </tbody>
</table>
{{$courses->links()}}


</x-layout>