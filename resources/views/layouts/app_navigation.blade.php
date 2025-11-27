<nav class="border-b border-zinc-800 bg-zinc-950/90 backdrop-blur">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
            {{-- Логотип + название --}}
            <div class="flex items-center gap-3">
                <a href="{{ route('home') }}" class="flex items-center gap-2">
                    <div
                        class="h-8 w-8 rounded-xl bg-emerald-500 flex items-center justify-center text-xs font-black tracking-tight">
                        PC
                    </div>
                    <div class="flex flex-col leading-tight">
                        <span class="text-sm font-semibold">Custom PC Shop</span>
                        <span class="text-[11px] text-zinc-500">Spain • Gaming builds</span>
                    </div>
                </a>
            </div>

            {{-- Основные ссылки --}}
            <div class="hidden md:flex items-center gap-6 text-sm">
                <a href="{{ route('products.types') }}"
                   class="text-zinc-300 hover:text-emerald-400 transition">
                    Catalog
                </a>

                <a href="{{ route('cart.index') }}"
                   class="text-zinc-300 hover:text-emerald-400 transition">
                    Cart
                </a>

                @auth
                    <a href="{{ route('orders.index') }}"
                       class="text-zinc-300 hover:text-emerald-400 transition">
                        My orders
                    </a>
                @endauth
            </div>

            {{-- Правый блок: логин / юзер --}}
            <div class="flex items-center gap-4">
                @auth
                    <div class="hidden sm:flex items-center gap-3">
                        <span class="text-sm text-zinc-300">
                            {{ Auth::user()->name }}
                        </span>
                        <a href="{{ route('profile.edit') }}"
                           class="px-3 py-1.5 rounded-lg text-xs font-semibold bg-zinc-900 border border-zinc-700 hover:border-emerald-500 hover:text-emerald-400 transition">
                            Profile
                        </a>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button
                                class="px-3 py-1.5 rounded-lg text-xs font-semibold bg-zinc-900 border border-zinc-700 hover:border-emerald-500 hover:text-emerald-400 transition">
                                Log out
                            </button>
                        </form>
                    </div>
                @else
                    <div class="flex items-center gap-2">
                        <a href="{{ route('login') }}"
                           class="text-xs text-zinc-300 hover:text-emerald-400 transition">
                            Log in
                        </a>
                        <a href="{{ route('register') }}"
                           class="px-3 py-1.5 rounded-lg text-xs font-semibold bg-emerald-500 hover:bg-emerald-600 text-black transition">
                            Register
                        </a>
                    </div>
                @endauth
            </div>
        </div>
    </div>
</nav>
