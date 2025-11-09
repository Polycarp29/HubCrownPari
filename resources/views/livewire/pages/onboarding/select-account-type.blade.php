<section class="min-h-screen flex justify-center items-center px-4 py-10 bg-gray-100 dark:bg-gray-900">
    <div class="w-full max-w-5xl">

        <!-- Heading -->
        <div class="text-center mb-10">
            <h1 class="text-3xl font-bold text-gray-800 dark:text-white">Select Account Type</h1>
            <p class="text-gray-600 dark:text-gray-300 mt-2 text-sm">
                Choose the type of account you want to create. This helps us tailor the experience for you.
            </p>
        </div>

        @php
            // Map icons and colors to TYPE IDs from the database
            $typeMeta = [
                1 => [
                    'svg' => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-10 text-blue-500">
  <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
</svg>
',
                    'hover' => 'hover:ring-blue-500',
                    'ring' => 'ring-blue-500',
                ],
                2 => [
                    'svg' => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-10 text-green-500">
  <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
</svg>
',
                    'hover' => 'hover:ring-green-500',
                    'ring' => 'ring-green-500',
                ],
                3 => [
                    'svg' => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-10 text-purple-500">
  <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 21h16.5M4.5 3h15M5.25 3v18m13.5-18v18M9 6.75h1.5m-1.5 3h1.5m-1.5 3h1.5m3-6H15m-1.5 3H15m-1.5 3H15M9 21v-3.375c0-.621.504-1.125 1.125-1.125h3.75c.621 0 1.125.504 1.125 1.125V21" />
</svg>
',
                    'hover' => 'hover:ring-purple-500',
                    'ring' => 'ring-purple-500',
                ],
            ];
        @endphp

        <!-- Cards Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($userType as $type)
                @php
                    $id = $type->id;
                    $meta = $typeMeta[$id] ?? null;
                    $isSelected = $selectedType == $id;
                @endphp

                <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-xl p-6 shadow-sm transition cursor-pointer
                        hover:shadow-md hover:ring-2 {{ $meta['hover'] ?? '' }}
                        {{ $isSelected ? 'ring-2 ' . ($meta['ring'] ?? '') : '' }}"
                    wire:click="selectTypeProcess({{ $id }})" wire:model='selectedType'>
                    <div class="flex items-center justify-center mb-4">
                        {!! $meta['svg'] ?? '' !!}
                    </div>
                    <h2 class="text-lg font-semibold text-center text-gray-800 dark:text-white">
                        {{ $type->user_type_name }}
                    </h2>
                    <p class="text-sm text-center text-gray-600 dark:text-gray-400 mt-2">
                        {{ $type->description }}
                    </p>
                </div>
            @endforeach
        </div>
        <div class="flex justify-end mt-8">
            <button wire:click="proceedToNext" @class([
                'px-6 py-2 rounded text-white transition',
                'bg-blue-600 hover:bg-blue-700' => $selectedType,
                'bg-gray-400 cursor-not-allowed' => !$selectedType,
            ]) @disabled(!$selectedType)>
                Next
                <svg wire:loading wire:target="proceedToNext" class="w-5 h-5 animate-spin" fill="none" viewBox="0 0 24 24">
                    <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"
                        class="opacity-25" />
                    <path d="M4 12a8 8 0 018-8" stroke="currentColor" stroke-width="4" class="opacity-75" />
                </svg>
            </button>
        </div>
    </div>
</section>
