<x-app-layout>
    <div class="py-10 text-white">
        <h1 class="text-3xl font-bold mb-6">Product categories</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
            @foreach($types as $item)
                <a href="{{ route('products.byType', $item['type']) }}"
                   class="relative rounded-[32px] overflow-hidden shadow-[0_0_40px_rgba(15,23,42,0.9)] hover:scale-[1.02] transition duration-300">

                    {{-- яркий фон --}}
                    <div class="absolute inset-0 bg-gradient-to-br {{ $item['gradient'] }}"></div>
                    {{-- лёгкая дымка для читаемости текста --}}
                    <div class="absolute inset-0 bg-black/35"></div>

                    <div class="relative px-8 py-10 flex flex-col justify-between h-full">
                        <div>
                            <p class="text-xs uppercase tracking-[0.3em] text-zinc-200/80 mb-3">
                                Category
                            </p>
                            <h2 class="text-3xl font-extrabold tracking-wide mb-2">
                                {{ strtoupper($item['label']) }}
                            </h2>
                            <p class="text-sm text-zinc-100/85">
                                Click to see all {{ strtolower($item['label']) }}.
                            </p>
                        </div>

                        <div class="mt-6">
                            <span
                                class="inline-flex items-center px-4 py-2 rounded-full bg-white text-xs font-semibold text-zinc-900 hover:bg-zinc-100 transition">
                                View products →
                            </span>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</x-app-layout>


