<x-app-layout>
    <div class="max-w-6xl mx-auto py-8 text-white">
        <h1 class="text-3xl font-bold mb-6">Catalog</h1>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach($products as $product)
                <a href="{{ route('products.show', $product) }}"
                   class="block bg-zinc-900/80 border border-zinc-800 rounded-2xl p-4 hover:border-emerald-500 hover:shadow-[0_0_25px_rgba(16,185,129,0.35)] transition">
                    <div class="h-64 bg-zinc-950 rounded-xl mb-3 flex items-center justify-center text-sm text-zinc-500 border border-zinc-800 overflow-hidden">
                        @php
                            $src = null;
                            if (!empty($product->image)) {
                                $src = \Illuminate\Support\Str::startsWith($product->image, ['http://','https://','/'])
                                    ? $product->image
                                    : \Illuminate\Support\Facades\Storage::url($product->image);
                            }
                        @endphp
                        @if($src)
                            <img src="{{ $src }}" alt="{{ $product->name }}" class="h-full w-full object-cover">
                        @else
                            <span>No image</span>
                        @endif
                    </div>
                    <h2 class="font-semibold mb-1 text-zinc-50">{{ $product->name }}</h2>
                    <p class="text-xs text-zinc-500 mb-1 uppercase tracking-wide">
                        {{ $product->category }} · {{ $product->type }}
                    </p>
                    <p class="text-lg font-bold text-emerald-400">€{{ number_format($product->price, 2) }}</p>
                </a>
            @endforeach
        </div>
 
    </div>
</x-app-layout>


