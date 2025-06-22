@extends('layouts.app')

@section('content')
<div class="py-6">
    <div class="max-w-3xl mx-auto bg-white rounded-lg shadow p-6">
        <div class="flex justify-between items-start mb-6">
            <div>
                <h1 class="text-2xl font-bold">{{ $book->title }}</h1>
                <p class="text-gray-600">{{ $book->author }}</p>
                <p class="text-sm text-gray-500">Postado por: {{ $book->user->name }}</p>
            </div>
            
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

        <div class="mb-6">
            <a href="{{ asset('storage/'.$book->pdf_path) }}" target="_blank" 
               class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                Ler PDF
            </a>
        </div>

        <div class="border-t pt-4">
            <a href="{{ route('books.index') }}" class="text-blue-500 hover:underline">
                ← Voltar para a lista
            </a>
        </div>
    </div>
</div>
@endsection