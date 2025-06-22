@extends('layouts.app')

@section('content')
<div class="py-6">
    <div class="max-w-3xl mx-auto bg-white rounded-lg shadow p-6">
        <h1 class="text-2xl font-bold mb-6">Adicionar Novo Livro</h1>

        <form method="POST" action="{{ route('books.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="mb-4">
                <label for="title" class="block font-medium">Título</label>
                <input type="text" id="title" name="title" class="w-full px-3 py-2 border rounded" required>
            </div>

            <div class="mb-4">
                <label for="author" class="block font-medium">Autor</label>
                <input type="text" id="author" name="author" class="w-full px-3 py-2 border rounded" required>
            </div>

            <div class="mb-4">
                <label for="pdf_file" class="block font-medium">Arquivo PDF</label>
                <input type="file" id="pdf_file" name="pdf_file" class="w-full px-3 py-2 border rounded" accept=".pdf" required>
            </div>

            <div class="flex justify-end mt-6">
                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                    Salvar Livro
                </button>
            </div>
        </form>
    </div>
</div>
@endsection