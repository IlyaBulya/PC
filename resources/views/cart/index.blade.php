<x-app-layout>
    <div class="max-w-4xl mx-auto py-8 text-white">
        <h1 class="text-3xl font-bold mb-6">Your cart</h1>

        @if(session('success'))
            <div class="mb-4 text-sm text-emerald-400">
                {{ session('success') }}
            </div>
        @endif

        @if(empty($cart))
            <p class="text-zinc-400">Your cart is empty.</p>
        @else
            <div class="space-y-4">
                @foreach($cart as $item)
                    <div class="flex items-center justify-between bg-zinc-900 rounded-xl px-4 py-3">
                        <div>
                            <div class="font-semibold">{{ $item['name'] }}</div>
                            <div class="text-sm text-zinc-400">
                                Qty: {{ $item['qty'] }} · €{{ number_format($item['price'], 2) }}
                            </div>
                            @if($item['color'])
                                <div class="text-xs text-zinc-500">
                                    Color: {{ ucfirst($item['color']) }}
                                </div>
                            @endif
                            @if($item['design'])
                                <div class="text-xs text-zinc-500">
                                    Design: {{ $item['design'] }}
                                </div>
                            @endif
                        </div>

                        <form method="POST" action="{{ route('cart.remove', $item['product_id']) }}">
                            @csrf
                            <button class="text-sm text-red-400 hover:text-red-500">
                                Remove
                            </button>
                        </form>
                    </div>
                @endforeach
            </div>

            <div class="mt-6 flex items-center justify-between">
                <div class="text-lg font-bold">
                    Total: €{{ number_format($total, 2) }}
                </div>

                <p class="text-sm text-zinc-500">
                    (Следующим шагом сделаем Checkout и создание Order.)
                </p>
            </div>
        @endif
    </div>
</x-app-layout>


