<x-app-layout>
    <div class="max-w-6xl mx-auto py-8 text-white">
        <h1 class="text-3xl font-bold mb-6">Catalog</h1>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach($products as $product)
                <a href="{{ route('products.show', $product) }}"
                   class="block bg-zinc-900 border border-zinc-800 rounded-xl p-4 hover:border-emerald-500 transition">
                    <div class="h-40 bg-zinc-800 rounded-lg mb-3 flex items-center justify-center text-sm text-zinc-400">
                        {{ $product->image ?? 'No image' }}
                    </div>
                    <h2 class="font-semibold mb-1">{{ $product->name }}</h2>
                    <p class="text-sm text-zinc-400 mb-2">
                        {{ $product->category }} · {{ strtoupper($product->type) }}
                    </p>
                    <p class="text-lg font-bold">€{{ number_format($product->price, 2) }}</p>
                </a>
            @endforeach
        </div>

        <div class="mt-6">
            {{ $products->links() }}
        </div>
    </div>
</x-app-layout>


