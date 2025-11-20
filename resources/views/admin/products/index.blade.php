<x-app-layout>
    <div class="py-8 text-white">
        <div class="flex items-center justify-between mb-4">
            <h1 class="text-2xl font-bold">Products (admin)</h1>
            <a href="{{ route('admin.products.create') }}"
               class="px-3 py-2 bg-emerald-500 hover:bg-emerald-600 rounded-lg text-sm font-semibold">
                + Create
            </a>
        </div>

        @if($products->isEmpty())
            <p class="text-zinc-400">No products yet.</p>
        @else
            <div class="overflow-x-auto rounded-xl border border-zinc-800">
                <table class="min-w-full text-sm">
                    <thead class="bg-zinc-900/70 text-zinc-400">
                        <tr>
                            <th class="px-4 py-2 text-left">ID</th>
                            <th class="px-4 py-2 text-left">Name</th>
                            <th class="px-4 py-2 text-left">Type</th>
                            <th class="px-4 py-2 text-left">Price</th>
                            <th class="px-4 py-2 text-left">Stock</th>
                            <th class="px-4 py-2 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-zinc-800">
                        @foreach($products as $product)
                            <tr class="hover:bg-zinc-900/40">
                                <td class="px-4 py-2 text-zinc-400">#{{ $product->id }}</td>
                                <td class="px-4 py-2">{{ $product->name }}</td>
                                <td class="px-4 py-2 uppercase text-xs text-zinc-400">{{ $product->type }}</td>
                                <td class="px-4 py-2 font-semibold">€{{ number_format($product->price, 2) }}</td>
                                <td class="px-4 py-2">{{ $product->stock }}</td>
                                <td class="px-4 py-2">
                                    <div class="flex items-center justify-end gap-2">
                                        <a href="{{ route('admin.products.edit', $product) }}"
                                           class="px-2 py-1 rounded bg-zinc-800 hover:bg-zinc-700 text-xs">
                                            Edit
                                        </a>
                                        <form method="POST" action="{{ route('admin.products.destroy', $product) }}"
                                              onsubmit="return confirm('Delete this product?');">
                                            @csrf
                                            @method('DELETE')
                                            <button class="px-2 py-1 rounded bg-red-500/90 hover:bg-red-600 text-xs">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</x-app-layout>


