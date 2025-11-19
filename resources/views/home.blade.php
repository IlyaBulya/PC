<x-app-layout>
    <div class="py-10 text-white">
        {{-- HERO --}}
        <section class="grid grid-cols-1 lg:grid-cols-2 gap-10 items-center mb-12">
            <div>
                <p class="text-xs uppercase tracking-[0.3em] text-emerald-400 mb-3">
                    Custom PC Shop • Spain
                </p>
                <h1 class="text-4xl sm:text-5xl font-extrabold mb-4 leading-tight">
                    High-end custom PCs<br>
                    <span class="text-emerald-400">for gaming & creators.</span>
                </h1>
                <p class="text-zinc-400 text-sm sm:text-base mb-6 max-w-xl">
                    Pick a base build and customise details: colors, engraving, and components.
                    We assemble and ship across Spain with stress-tested performance.
                </p>

                <div class="flex flex-wrap gap-3">
                    <a href="{{ route('products.types') }}"
                       class="inline-flex items-center px-6 py-3 rounded-full bg-emerald-500 hover:bg-emerald-600 text-sm font-semibold text-black shadow-[0_0_25px_rgba(16,185,129,0.5)] transition">
                        Configure your PC
                    </a>

                    <a href="{{ route('products.types') }}"
                       class="inline-flex items-center px-6 py-3 rounded-full border border-zinc-700 hover:border-emerald-400 text-sm font-semibold text-zinc-200 hover:text-emerald-300 transition">
                        Browse all products
                    </a>
                </div>

                <div class="mt-6 flex flex-wrap gap-6 text-xs text-zinc-500">
                    <div>
                        <div class="font-semibold text-zinc-300">3–5 days assembly</div>
                        <div>Stress-test & cable management included</div>
                    </div>
                    <div>
                        <div class="font-semibold text-zinc-300">Shipping in Spain</div>
                        <div>Barcelona-based workshop</div>
                    </div>
                </div>
            </div>

            <div class="relative">
                <div class="absolute -inset-4 bg-emerald-500/10 blur-3xl rounded-full pointer-events-none"></div>

                <div class="relative bg-gradient-to-br from-zinc-900 to-black border border-zinc-800 rounded-3xl p-6 shadow-[0_0_40px_rgba(15,23,42,0.8)]">
                    <div class="text-xs uppercase tracking-[0.25em] text-zinc-500 mb-3">
                        Featured build
                    </div>

                    <div class="aspect-[16/9] rounded-2xl bg-zinc-950 border border-zinc-800 flex items-center justify-center mb-4">
                        <span class="text-zinc-500 text-sm">
                            PC interior preview
                        </span>
                    </div>

                    <div class="flex items-center justify-between mb-2">
                        <div>
                            <div class="text-sm font-semibold">4K Ultra Gaming</div>
                            <div class="text-xs text-zinc-500">RTX 4090 • i9 • 64GB RAM</div>
                        </div>
                        <div class="text-right">
                            <div class="text-xs text-zinc-500 mb-1">From</div>
                            <div class="text-lg font-bold text-emerald-400">€1,999</div>
                        </div>
                    </div>

                    <div class="flex items-center justify-between text-xs text-zinc-500 mt-3">
                        <span>Up to 260 FPS in esports titles</span>
                        <span class="inline-flex items-center gap-1">
                            <span class="h-2 w-2 rounded-full bg-emerald-400 animate-pulse"></span>
                            In stock
                        </span>
                    </div>
                </div>
            </div>
        </section>

        {{-- FEATURED PRODUCTS --}}
        @if($featured->isNotEmpty())
            <section>
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-xl font-semibold">Featured builds</h2>
                    <a href="{{ route('products.types') }}" class="text-xs text-emerald-400 hover:text-emerald-300">
                        View full catalog →
                    </a>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    @foreach($featured as $product)
                        <a href="{{ route('products.show', $product) }}"
                           class="block bg-zinc-900/80 border border-zinc-800 rounded-2xl p-4 hover:border-emerald-500 hover:shadow-[0_0_25px_rgba(16,185,129,0.35)] transition">
                            <div class="h-32 bg-zinc-950 rounded-xl mb-3 flex items-center justify-center text-xs text-zinc-500 border border-zinc-800">
                                {{ $product->image ?? 'Product preview' }}
                            </div>
                            <h3 class="font-semibold mb-1 text-zinc-50 text-sm">
                                {{ $product->name }}
                            </h3>
                            <p class="text-[11px] text-zinc-500 mb-1 uppercase tracking-wide">
                                {{ $product->category }} · {{ strtoupper($product->type) }}
                            </p>
                            <p class="text-lg font-bold text-emerald-400">
                                €{{ number_format($product->price, 2) }}
                            </p>
                        </a>
                    @endforeach
                </div>
            </section>
        @endif
    </div>
</x-app-layout>


