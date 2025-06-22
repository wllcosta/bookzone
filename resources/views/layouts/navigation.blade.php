<nav class="bg-white shadow">
    <div class="container mx-auto px-4 py-3 flex justify-between items-center">
        <a href="{{ route('books.index') }}" class="text-xl font-bold">
            BookZone
        </a>
        
        <div class="flex items-center space-x-4">
            @auth
                <a href="{{ route('profile.edit') }}" class="text-gray-600 hover:text-gray-900">
                    Perfil
                </a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="text-gray-600 hover:text-gray-900">
                        Sair
                    </button>
                </form>
            @endauth
        </div>
    </div>
</nav>