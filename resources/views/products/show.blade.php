<x-app-layout>
    <div class="max-w-4xl mx-auto py-8 text-white">
        <a href="{{ route('products.types') }}" class="text-sm text-zinc-400 hover:text-emerald-400">
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
                        <p class="text-sm text-zinc-400 mb-1">Choose color:</p>
                        <form method="POST" action="{{ route('cart.add', $product) }}" class="space-y-3">
                            @csrf

                            <select name="color"
                                    class="bg-zinc-900 border border-zinc-700 rounded-lg px-3 py-2 text-sm w-full">
                                @foreach($colors as $color)
                                    <option value="{{ $color }}">{{ ucfirst($color) }}</option>
                                @endforeach
                            </select>

                            <div>
                                <label class="block text-sm text-zinc-400 mb-1">
                                    Custom design (optional)
                                </label>
                                <input type="text"
                                       name="design"
                                       class="w-full bg-zinc-900 border border-zinc-700 rounded-lg px-3 py-2 text-sm"
                                       placeholder="Engraving, special notes...">
                            </div>

                            <div>
                                <label class="block text-sm text-zinc-400 mb-1">Quantity</label>
                                <input type="number" name="qty" value="1" min="1"
                                       class="w-24 bg-zinc-900 border border-zinc-700 rounded-lg px-3 py-2 text-sm">
                            </div>

                            <button type="submit"
                                    class="mt-2 inline-flex items-center px-4 py-2 bg-emerald-500 hover:bg-emerald-600 text-sm font-semibold rounded-lg">
                                Add to cart
                            </button>
                        </form>
                    </div>
                @else
                    <p class="text-sm text-zinc-500 mb-4">
                        No color options configured for this product yet.
                    </p>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>


