<x-app-layout>
    <div class="py-8 text-white max-w-3xl mx-auto">
        <h1 class="text-2xl font-bold mb-4">Home page settings</h1>

        @if(session('success'))
            <div class="mb-4 text-sm text-emerald-400">{{ session('success') }}</div>
        @endif

        <form method="POST" action="{{ route('admin.home.update') }}" class="space-y-6">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-sm text-zinc-400 mb-1">Hero product</label>
                <select name="hero_product_id" class="w-full bg-zinc-900 border border-zinc-700 rounded-lg px-3 py-2 text-sm">
                    <option value="">— None —</option>
                    @foreach($products as $p)
                        <option value="{{ $p->id }}" @selected(old('hero_product_id', $settings->hero_product_id)===$p->id)>
                            #{{ $p->id }} — {{ $p->name }}
                        </option>
                    @endforeach
                </select>
                @error('hero_product_id')<div class="text-red-400 text-xs mt-1">{{ $message }}</div>@enderror
            </div>

            <div>
                <label class="block text-sm text-zinc-400 mb-1">Featured products (up to 6)</label>
                @php $selected = collect(old('featured_product_ids', $settings->featured_product_ids ?? []))->map(fn($v)=>(int)$v)->all(); @endphp
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-2 max-h-80 overflow-auto border border-zinc-800 rounded-lg p-3 bg-zinc-900/60">
                    @foreach($products as $p)
                        <label class="flex items-center gap-2 text-sm">
                            <input type="checkbox" name="featured_product_ids[]" value="{{ $p->id }}"
                                   class="rounded border-zinc-700 text-emerald-500 bg-zinc-900 focus:ring-emerald-500"
                                   @checked(in_array($p->id, $selected))>
                            <span class="truncate">#{{ $p->id }} — {{ $p->name }}</span>
                        </label>
                    @endforeach
                </div>
                <p class="text-xs text-zinc-500 mt-1">Select up to 6 products.</p>
                @error('featured_product_ids')<div class="text-red-400 text-xs mt-1">{{ $message }}</div>@enderror
            </div>

            <div class="flex items-center gap-3">
                <button class="px-4 py-2 bg-emerald-500 hover:bg-emerald-600 rounded-lg text-sm font-semibold">
                    Save
                </button>
                <a href="{{ route('home') }}" class="text-sm text-zinc-400 hover:text-emerald-400">Back to site</a>
            </div>
        </form>
    </div>
</x-app-layout>


