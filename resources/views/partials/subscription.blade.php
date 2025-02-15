<section id="subscription" class="py-8">
    <h2 class="text-2xl flex justify-center font-semibold text-red-800 dark:text-slate-800 mb-6" data-aos="fade-up-right">
        Available Plans
    </h2>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-6">
        @forelse ($plan as $item)
            <div class="bg-white dark:bg-gray-100 rounded-lg shadow-xl hover:shadow-md transition-shadow p-6" data-aos="fade-up-right">
                <h3 class="text-xl font-bold text-gray-800 dark:text-gray-600 mb-2">{{ $item->name }}</h3>
                <p class="text-sm text-gray-600 dark:text-gray-600 mb-4">For {{ $item->validity }} months</p>

                <div class="mb-6">
                    <p class="text-gray-600 dark:text-gray-600 text-sm">
                        {!! nl2br(e($item->description)) !!}
                    </p>
                </div>

                <div class="flex items-baseline mb-4">
                    <span class="text-3xl font-bold text-gray-800 dark:text-gray-600">RS.{{ $item->amount }}</span>
                    <span class="ml-1 text-gray-600 dark:text-gray-600">/month</span>
                </div>

                <a href="{{ route('members.payments.create') }}" 
                   class="block w-full text-center px-4 py-2 text-sm font-medium text-white bg-orange-500 hover:bg-sky-500 rounded-lg transition-colors">
                    Choose Plan
                </a>
            </div>
        @empty
            <p class="text-gray-600 dark:text-gray-200 text-center col-span-3">No plans available.</p>
        @endforelse
    </div>
</section>
