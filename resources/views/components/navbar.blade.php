<nav class="bg-gray-800 flex justify-between items-center p-5 text-white shadow-md">
    <div>
        <a href="{{ url('/') }}">
            <h1 class="text-3xl text-green-500 font-bold transition-transform duration-300 hover:scale-105">
                Sy<span class="text-white">[n]</span>ex
            </h1>
        </a>
    </div>

    <div class="flex gap-5">
        <a class="p-2 rounded-md transition-all duration-300 transform hover:bg-gray-600 hover:scale-105 hover:text-green-400" href="{{ route('home') }}">Home</a>

        @can('create-records')
            <a class="p-2 rounded-md transition-all duration-300 transform hover:bg-gray-600 hover:scale-105 hover:text-green-400" href="{{ route('records.index') }}">Records</a>
        @endcan

        @can('manage-users')
            <a class="p-2 rounded-md transition-all duration-300 transform hover:bg-gray-600 hover:scale-105 hover:text-green-400" href="{{ route('users') }}">Users</a>
        @endcan

        @if (auth()->check())
            <a class="p-2 rounded-md transition-all duration-300 transform hover:bg-gray-600 hover:scale-105 hover:text-green-400" href="{{ route('profile') }}">Profile</a>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="p-2 rounded-md transition-all duration-300 transform hover:bg-gray-600 hover:scale-105 hover:text-red-600">
                    Logout
                </button>
            </form>
        @else
            <a class="p-2 rounded-md transition-all duration-300 transform hover:bg-gray-600 hover:scale-105 hover:text-green-400" href="{{ route('login') }}">Login</a>
        @endif
    </div>
</nav>
