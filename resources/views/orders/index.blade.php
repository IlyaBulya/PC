<x-app-layout>
    <div class="max-w-4xl mx-auto py-8 text-white">
        <h1 class="text-3xl font-bold mb-6">My orders</h1>

        @if($orders->isEmpty())
            <p class="text-zinc-400">You have no orders yet.</p>
        @else
            <div class="space-y-3">
                @foreach($orders as $order)
                    <a href="{{ route('orders.show', $order) }}"
                       class="block bg-zinc-900 rounded-xl px-4 py-3 border border-zinc-800 hover:border-emerald-500 transition">
                        <div class="flex justify-between items-center">
                            <div>
                                <div class="font-semibold">
                                    Order #{{ $order->id }}
                                </div>
                                <div class="text-xs text-zinc-500">
                                    {{ $order->created_at->format('d.m.Y H:i') }} · {{ $order->status }}
                                </div>
                            </div>
                            <div class="text-lg font-bold">
                                €{{ number_format($order->total, 2) }}
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        @endif
    </div>
 </x-app-layout>


