<x-app-layout>
    <div class="max-w-4xl mx-auto py-8 text-white">
        <h1 class="text-2xl font-bold mb-2">
            Order #{{ $order->id }}
        </h1>
        <p class="text-sm text-zinc-500 mb-4">
            {{ $order->created_at->format('d.m.Y H:i') }} · {{ $order->status }}
        </p>

        @if(session('success'))
            <div class="mb-4 text-sm text-emerald-400">
                {{ session('success') }}
            </div>
        @endif

        <div class="space-y-3 mb-6">
            @foreach($order->items as $item)
                <div class="bg-zinc-900 rounded-xl px-4 py-3 flex justify-between">
                    <div>
                        <div class="font-semibold">
                            {{ $item->product->name ?? 'Product #'.$item->product_id }}
                        </div>
                        <div class="text-xs text-zinc-500">
                            Qty: {{ $item->qty }} · €{{ number_format($item->price, 2) }}
                        </div>
                        @if($item->color)
                            <div class="text-xs text-zinc-500">
                                Color: {{ ucfirst($item->color) }}
                            </div>
                        @endif
                        @if($item->design)
                            <div class="text-xs text-zinc-500">
                                Design: {{ $item->design }}
                            </div>
                        @endif
                    </div>
                    <div class="text-sm font-semibold">
                        €{{ number_format($item->price * $item->qty, 2) }}
                    </div>
                </div>
            @endforeach
        </div>

        <div class="text-right text-lg font-bold">
            Total: €{{ number_format($order->total, 2) }}
        </div>
    </div>
</x-app-layout>


