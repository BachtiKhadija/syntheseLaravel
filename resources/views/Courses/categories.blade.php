<x-layout>

<div class="container">

    <h2>
        Gérer les catégories du cours :
        {{ $course->title }}
    </h2>

    <form method="POST"
          action="{{ route('courses.categories.update', $course->id) }}">

        @csrf

        <div class="card p-3">

            <h4>Liste des catégories</h4>

            @foreach($categories as $category)

                <div class="form-check mb-2">

                    <input
                        class="form-check-input"
                        type="checkbox"
                        name="categories[]"
                        value="{{ $category->id }}"
                        id="cat{{ $category->id }}"

                        {{ $course->categories->contains($category->id)
                            ? 'checked'
                            : '' }}
                    >

                    <label class="form-check-label"
                           for="cat{{ $category->id }}">

                        {{ $category->name }}

                    </label>

                </div>

            @endforeach

        </div>

        <button type="submit"
                class="btn btn-success mt-3">

            Enregistrer

        </button>

        <a href="{{ route('courses.index') }}"
           class="btn btn-secondary mt-3">

            Retour

        </a>

    </form>

</div>

</x-layout>