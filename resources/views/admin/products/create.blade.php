<x-app-layout>
    <div class="py-8 text-white max-w-3xl mx-auto">
        <h1 class="text-2xl font-bold mb-4">Create product</h1>

        @if ($errors->any())
            <div class="mb-4 text-sm text-red-400">
                {{ __('Please fix the errors below.') }}
            </div>
        @endif

        <form method="POST" action="{{ route('admin.products.store') }}" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @include('admin.products._form')
            <div class="flex items-center gap-3">
                <button class="px-4 py-2 bg-emerald-500 hover:bg-emerald-600 rounded-lg text-sm font-semibold">
                    Save
                </button>
                <a href="{{ route('admin.products.index') }}" class="text-sm text-zinc-400 hover:text-emerald-400">Cancel</a>
            </div>
        </form>
    </div>
</x-app-layout>


