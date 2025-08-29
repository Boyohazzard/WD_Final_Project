<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <!-- 左侧：Logo + 菜单 -->
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ url('/') }}">
                        <span class="text-xl font-bold">MyShop</span>
                    </a>
                </div>

                <!-- 顶部导航链接 -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <a href="{{ url('/') }}" class="text-gray-700 hover:text-gray-900">Home</a><a href="{{ route('contact') }}" class="text-gray-700 hover:text-gray-900">Contact</a>


                    <a href="{{ route('products.index') }}" class="text-gray-700 hover:text-gray-900">Products</a>

                    @auth
                        <a href="{{ route('cart.index') }}" class="text-gray-700 hover:text-gray-900">Cart</a>
                        <a href="{{ route('orders.index') }}" class="text-gray-700 hover:text-gray-900">Orders</a>
                    @endauth
                </div>
            </div>

            <!-- 右侧：用户 -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                @auth
                    <span class="mr-4">Hi, {{ Auth::user()->name }}</span>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="text-red-500 hover:text-red-700">Logout</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="text-gray-700 hover:text-gray-900 mr-4">Login</a>
                    <a href="{{ route('register') }}" class="text-gray-700 hover:text-gray-900">Register</a>
                @endauth
            </div>

            <!-- 汉堡按钮（小屏） -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                        class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex"
                              stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden"
                              stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- 小屏下拉菜单 -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1 px-4">
            <a href="{{ url('/') }}" class="block py-2 text-gray-700 hover:text-gray-900">Home</a>
            <a href="#" class="block py-2 text-gray-700 hover:text-gray-900">Contact</a>
            <a href="{{ route('products.index') }}" class="block py-2 text-gray-700 hover:text-gray-900">Products</a>

            @auth
                <a href="{{ route('cart.index') }}" class="block py-2 text-gray-700 hover:text-gray-900">Cart</a>
                <a href="{{ route('orders.index') }}" class="block py-2 text-gray-700 hover:text-gray-900">Orders</a>
            @endauth
        </div>

        <div class="pt-4 pb-1 border-t border-gray-200 px-4">
            @auth
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>

                <form method="POST" action="{{ route('logout') }}" class="mt-3">
                    @csrf
                    <button type="submit" class="block w-full text-left py-2 text-red-500 hover:text-red-700">
                        Log Out
                    </button>
                </form>
            @else
                <a href="{{ route('login') }}" class="block py-2 text-gray-700 hover:text-gray-900">Login</a>
                <a href="{{ route('register') }}" class="block py-2 text-gray-700 hover:text-gray-900">Register</a>
            @endauth
        </div>
    </div>
</nav>
