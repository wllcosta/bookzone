@extends('layouts.app')

@section('content')
<div class="py-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Meus Livros</h1>
        <a href="{{ route('books.create') }}" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
            Adicionar Livro
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($books as $book)
            <div class="bg-white rounded-lg shadow overflow-hidden">
                <div class="p-4">
                    <h3 class="text-lg font-semibold">{{ $book->title }}</h3>
                    <p class="text-gray-600">{{ $book->author }}</p>
                    <p class="text-sm text-gray-500">Postado por: {{ $book->user->name }}</p>

                    <div class="mt-4 flex justify-between">
                        <a href="{{ route('books.show', $book) }}" class="text-blue-500 hover:underline">
                            Ver Detalhes
                        </a>
                        @if($book->isFavoritedBy(auth()->user()))
                            <form action="{{ route('books.unfavorite', $book) }}" method="POST">
                                @csrf @method('DELETE')
                                <button type="submit" class="text-red-500">❤️ Remover Favorito</button>
                            </form>
                        @else
                            <form action="{{ route('books.favorite', $book) }}" method="POST">
                                @csrf
                                <button type="submit" class="text-gray-500">🤍 Favoritar</button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

{{-- HTML ESTÁTICO ADICIONADO --}}
<div class="bg-gray-100 p-10">
    <h1 class="text-3xl font-bold mb-5">Lista de Livros Exemplos:</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <div class="bg-white p-4 rounded shadow">
            <img src="https://s2.glbimg.com/luHoRBTfdM4PDT2_vaT8Kk7vcMc=/e.glbimg.com/og/ed/f/original/2022/05/17/image3.jpg" alt="O Senhor dos Anéis" class="mb-2 w-full h-64 object-contain bg-gray-200 rounded">
            <strong>Título:</strong> O Senhor dos Anéis<br>
            <strong>Autor:</strong> J.R.R. Tolkien<br>
            <strong>Categoria:</strong> Fantasia
        </div>

        <div class="bg-white p-4 rounded shadow">
            <img src="https://www.lpm.com.br/livros/imagens/dom_quixote_hq_9788525433633_hd.jpg" alt="Dom Quixote" class="mb-2 w-full h-64 object-contain bg-gray-200 rounded">
            <strong>Título:</strong> Dom Quixote<br>
            <strong>Autor:</strong> Miguel de Cervantes<br>
            <strong>Categoria:</strong> Clássico
        </div>

        <div class="bg-white p-4 rounded shadow">
            <img src="https://m.media-amazon.com/images/I/61M9jDcsl2L._AC_UF1000,1000_QL80_.jpg" alt="1984" class="mb-2 w-full h-64 object-contain bg-gray-200 rounded">
            <strong>Título:</strong> 1984<br>
            <strong>Autor:</strong> George Orwell<br>
            <strong>Categoria:</strong> Distopia
        </div>

        <div class="bg-white p-4 rounded shadow">
            <img src="https://m.media-amazon.com/images/I/81pB+joKL4L._UF894,1000_QL80_.jpg" alt="Harry Potter" class="mb-2 w-full h-64 object-contain bg-gray-200 rounded">
            <strong>Título:</strong> Harry Potter e a Pedra Filosofal<br>
            <strong>Autor:</strong> J.K. Rowling<br>
            <strong>Categoria:</strong> Fantasia
        </div>

        <div class="bg-white p-4 rounded shadow">
            <img src="https://harpercollins.com.br/cdn/shop/files/9786559800469.jpg?v=1721832896" alt="O Pequeno Príncipe" class="mb-2 w-full h-64 object-contain bg-gray-200 rounded">
            <strong>Título:</strong> O Pequeno Príncipe<br>
            <strong>Autor:</strong> Antoine de Saint-Exupéry<br>
            <strong>Categoria:</strong> Infantojuvenil
        </div>
    </div>
</div>
@endsection
