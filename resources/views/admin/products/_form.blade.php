@php
    $isEdit = isset($product);
    $colorsString = $isEdit && is_array($product->available_colors)
        ? implode(', ', $product->available_colors)
        : old('available_colors');
@endphp

<div class="space-y-4">
    <div>
        <label class="block text-sm text-zinc-400 mb-1">Name</label>
        <input type="text" name="name" value="{{ old('name', $product->name ?? '') }}"
               class="w-full bg-zinc-900 border border-zinc-700 rounded-lg px-3 py-2 text-sm" required>
        @error('name')<div class="text-red-400 text-xs mt-1">{{ $message }}</div>@enderror
    </div>

    <div>
        <label class="block text-sm text-zinc-400 mb-1">Description</label>
        <textarea name="description" rows="4"
                  class="w-full bg-zinc-900 border border-zinc-700 rounded-lg px-3 py-2 text-sm">{{ old('description', $product->description ?? '') }}</textarea>
        @error('description')<div class="text-red-400 text-xs mt-1">{{ $message }}</div>@enderror
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
        <div>
            <label class="block text-sm text-zinc-400 mb-1">Price (€)</label>
            <input type="number" step="0.01" name="price" value="{{ old('price', $product->price ?? '') }}"
                   class="w-full bg-zinc-900 border border-zinc-700 rounded-lg px-3 py-2 text-sm" required>
            @error('price')<div class="text-red-400 text-xs mt-1">{{ $message }}</div>@enderror
        </div>
        <div>
            <label class="block text-sm text-zinc-400 mb-1">Stock</label>
            <input type="number" name="stock" value="{{ old('stock', $product->stock ?? 0) }}"
                   class="w-full bg-zinc-900 border border-zinc-700 rounded-lg px-3 py-2 text-sm" required>
            @error('stock')<div class="text-red-400 text-xs mt-1">{{ $message }}</div>@enderror
        </div>
        <div>
            <label class="block text-sm text-zinc-400 mb-1">Image filename or URL</label>
            <input type="text" name="image" value="{{ old('image', $product->image ?? '') }}"
                   class="w-full bg-zinc-900 border border-zinc-700 rounded-lg px-3 py-2 text-sm">
            @error('image')<div class="text-red-400 text-xs mt-1">{{ $message }}</div>@enderror
        </div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        <div>
            <label class="block text-sm text-zinc-400 mb-1">Type (pc/mouse/keyboard/gpu/headset)</label>
            <input type="text" name="type" value="{{ old('type', $product->type ?? '') }}"
                   class="w-full bg-zinc-900 border border-zinc-700 rounded-lg px-3 py-2 text-sm" required>
            @error('type')<div class="text-red-400 text-xs mt-1">{{ $message }}</div>@enderror
        </div>
        <div>
            <label class="block text-sm text-zinc-400 mb-1">Category (series)</label>
            <input type="text" name="category" value="{{ old('category', $product->category ?? '') }}"
                   class="w-full bg-zinc-900 border border-zinc-700 rounded-lg px-3 py-2 text-sm" required>
            @error('category')<div class="text-red-400 text-xs mt-1">{{ $message }}</div>@enderror
        </div>
    </div>

    <div>
        <label class="block text-sm text-zinc-400 mb-1">Available colors (comma separated)</label>
        <input type="text" name="available_colors" value="{{ $colorsString }}"
               class="w-full bg-zinc-900 border border-zinc-700 rounded-lg px-3 py-2 text-sm">
        @error('available_colors')<div class="text-red-400 text-xs mt-1">{{ $message }}</div>@enderror
    </div>
</div>

