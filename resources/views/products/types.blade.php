<x-app-layout>
    <div class="py-6 text-white">

        {{-- GRID: 2 в ряд, почти без отступов --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">

            @foreach($types as $item)
                <a href="{{ route('products.byType', $item['type']) }}"
                   class="relative aspect-square rounded-3xl overflow-hidden shadow-lg hover:scale-[1.02] transition duration-300">

                    {{-- яркий фон --}}
                    <div class="absolute inset-0 bg-gradient-to-br {{ $item['gradient'] }} opacity-80"></div>

                    {{-- картинка категории --}}
                    @if($item['image'])
                        <img src="{{ $item['image'] }}"
                             class="absolute inset-0 w-full h-full object-cover">
                    @endif

                    {{-- затемнение сверху --}}
                    <div class="absolute inset-0 bg-black/10"></div>

                    {{-- текст --}}
                    <div class="relative flex flex-col justify-end h-full p-6">
                        <h2 class="text-3xl font-extrabold tracking-wide">
                            {{ strtoupper($item['label']) }}
                        </h2>

                        <span class="mt-2 text-sm opacity-80">
                            Tap to view products →
                        </span>
                    </div>

                </a>
            @endforeach

        </div>
    </div>
</x-app-layout>


