<x-app-layout>
    <div class="max-w-4xl mx-auto py-8 text-white">
        <a href="{{ route('products.index') }}" class="text-sm text-zinc-400 hover:text-emerald-400">
            &larr; Back to catalog
        </a>

        <div class="mt-4 grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="bg-zinc-900 rounded-xl h-64 flex items-center justify-center">
                <span class="text-zinc-400 text-sm">
                    {{ $product->image ?? 'Product image' }}
                </span>
            </div>

            <div>
                <h1 class="text-3xl font-bold mb-2">{{ $product->name }}</h1>
                <p class="text-sm text-zinc-400 mb-4">
                    {{ $product->category }} · {{ strtoupper($product->type) }}
                </p>

                <p class="text-2xl font-bold mb-4">
                    €{{ number_format($product->price, 2) }}
                </p>

                <p class="text-zinc-300 mb-4">
                    {{ $product->description ?? 'No description yet.' }}
                </p>

                @php
                    $colors = $product->available_colors ?? [];
                @endphp

                @if(!empty($colors))
                    <div class="mb-4">
                        <p class="text-sm text-zinc-400 mb-1">Available colors:</p>
                        <div class="flex gap-2">
                            @foreach($colors as $color)
                                <span class="px-3 py-1 rounded-full bg-zinc-800 text-xs">
                                    {{ ucfirst($color) }}
                                </span>
                            @endforeach
                        </div>
                    </div>
                @endif

                <p class="text-sm text-zinc-500">
                    (Здесь позже будет форма для добавления в корзину с выбором цвета и кастомного дизайна.)
                </p>
            </div>
        </div>
    </div>
</x-app-layout>


