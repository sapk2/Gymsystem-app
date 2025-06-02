@extends('layouts.member-app')
@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold text-gray-800 dark:text-white mb-6">Health Goal Tracker</h1>

    @if (session('success'))
        <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    {{-- Show Saved Data After Form Submission --}}
    @if (session('show_saved_data') && session('saved_data'))
        <div class="bg-blue-50 dark:bg-blue-900/20 border border-blue-200 dark:border-blue-700 rounded-lg p-4 mb-6">
            <h3 class="text-lg font-semibold text-blue-800 dark:text-blue-200 mb-3">
                <svg class="inline w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                </svg>
                Successfully Saved to Database
            </h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                @if(session('saved_data')['target_weight'])
                    <div class="bg-white dark:bg-slate-700 p-3 rounded border">
                        <span class="text-sm text-gray-600 dark:text-gray-400">Target Weight</span>
                        <p class="text-lg font-semibold text-gray-800 dark:text-white">{{ session('saved_data')['target_weight'] }} kg</p>
                    </div>
                @endif
                @if(session('saved_data')['target_bmi'])
                    <div class="bg-white dark:bg-slate-700 p-3 rounded border">
                        <span class="text-sm text-gray-600 dark:text-gray-400">Target BMI</span>
                        <p class="text-lg font-semibold text-gray-800 dark:text-white">{{ session('saved_data')['target_bmi'] }}</p>
                    </div>
                @endif
                @if(session('saved_data')['target_body_fat'])
                    <div class="bg-white dark:bg-slate-700 p-3 rounded border">
                        <span class="text-sm text-gray-600 dark:text-gray-400">Target Body Fat</span>
                        <p class="text-lg font-semibold text-gray-800 dark:text-white">{{ session('saved_data')['target_body_fat'] }}%</p>
                    </div>
                @endif
            </div>
            <p class="text-sm text-blue-600 dark:text-blue-300 mt-3">
                <svg class="inline w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                </svg>
                Data saved to database at {{ now()->format('M d, Y h:i A') }}
            </p>
        </div>
    @endif

    {{-- Goal Input Form --}}
    <div x-data="healthGoalForm()" class="bg-white dark:bg-slate-700 rounded shadow p-6 mb-8">
        <form @submit.prevent="validateForm" method="POST" action="{{ route('members.health-goals.update') }}" class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @csrf

            <div>
                <label class="block text-gray-700 dark:text-gray-300 mb-1">Target Weight (kg)</label>
                <input type="number" x-model="weight" name="target_weight" class="w-full p-2 rounded bg-gray-100 dark:bg-slate-600 dark:text-white">
                <template x-if="errors.weight">
                    <p class="text-sm text-red-500" x-text="errors.weight"></p>
                </template>
            </div>

            <div>
                <label class="block text-gray-700 dark:text-gray-300 mb-1">Target BMI</label>
                <input type="number" step="0.1" x-model="bmi" name="target_bmi" class="w-full p-2 rounded bg-gray-100 dark:bg-slate-600 dark:text-white">
                <template x-if="errors.bmi">
                    <p class="text-sm text-red-500" x-text="errors.bmi"></p>
                </template>
            </div>

            <div>
                <label class="block text-gray-700 dark:text-gray-300 mb-1">Target Body Fat (%)</label>
                <input type="number" step="0.1" x-model="fat" name="target_body_fat" class="w-full p-2 rounded bg-gray-100 dark:bg-slate-600 dark:text-white">
                <template x-if="errors.fat">
                    <p class="text-sm text-red-500" x-text="errors.fat"></p>
                </template>
            </div>

            <div class="md:col-span-3 text-right mt-4 space-x-2">
                <button type="button" @click="showPreview = !showPreview" class="bg-gray-600 text-white px-6 py-2 rounded hover:bg-gray-700">
                    <span x-text="showPreview ? 'Hide Preview' : 'Preview Before Save'"></span>
                </button>
                <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">
                    <span x-show="!isSubmitting">Save </span>
                    <span x-show="isSubmitting" class="flex items-center">
                        <svg class="animate-spin -ml-1 mr-3 h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                        Saving...
                    </span>
                </button>
            </div>
        </form>

        {{-- Preview Section --}}
        <div x-show="showPreview" x-transition class="mt-6 p-4 bg-gray-50 dark:bg-slate-600 rounded border">
            <h3 class="text-lg font-semibold text-gray-800 dark:text-white mb-3">Preview (Before Saving to Database):</h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 text-sm">
                <div>
                    <span class="font-medium text-gray-600 dark:text-gray-300">Target Weight:</span>
                    <span class="text-gray-800 dark:text-white" x-text="weight ? weight + ' kg' : 'Not set'"></span>
                </div>
                <div>
                    <span class="font-medium text-gray-600 dark:text-gray-300">Target BMI:</span>
                    <span class="text-gray-800 dark:text-white" x-text="bmi ? bmi : 'Not set'"></span>
                </div>
                <div>
                    <span class="font-medium text-gray-600 dark:text-gray-300">Target Body Fat:</span>
                    <span class="text-gray-800 dark:text-white" x-text="fat ? fat + '%' : 'Not set'"></span>
                </div>
            </div>
        </div>
    </div>

    {{-- Progress Bars --}}
    @if ($goal && $latestHealth)
    <div class="mb-8">
        <h2 class="text-2xl font-semibold text-gray-800 dark:text-white mb-4">Your Progress</h2>

        @php
            $targetWeight = $goal->target_weight;
            $targetBMI = $goal->target_bmi;
            $targetFat = $goal->target_body_fat;

            $weightProgress = ($targetWeight && $latestHealth->weight)
                ? min(100, max(0, (1 - abs($latestHealth->weight - $targetWeight) / $targetWeight) * 100))
                : 0;

            $bmiProgress = ($targetBMI && $latestHealth->bmi)
                ? min(100, max(0, (1 - abs($latestHealth->bmi - $targetBMI) / $targetBMI) * 100))
                : 0;

            $fatProgress = ($targetFat && $latestHealth->body_fat_percentage)
                ? min(100, max(0, (1 - abs($latestHealth->body_fat_percentage - $targetFat) / $targetFat) * 100))
                : 0;
        @endphp

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div class="bg-white dark:bg-slate-600 p-5 rounded shadow-md">
                <p class="text-sm text-gray-500 dark:text-gray-300 mb-1">Weight Goal</p>
                <div class="w-full bg-gray-200 dark:bg-gray-700 h-4 rounded-full overflow-hidden">
                    <div class="h-4 bg-green-500 rounded-full transition-all duration-500" style="width: {{ $weightProgress }}%"></div>
                </div>
                <p class="text-xs text-gray-600 dark:text-gray-400 mt-1">Target: {{ $targetWeight }}kg | Current: {{ $latestHealth->weight }}kg</p>
            </div>

            <div class="bg-white dark:bg-slate-600 p-5 rounded shadow-md">
                <p class="text-sm text-gray-500 dark:text-gray-300 mb-1">BMI Goal</p>
                <div class="w-full bg-gray-200 dark:bg-gray-700 h-4 rounded-full overflow-hidden">
                    <div class="h-4 bg-blue-500 rounded-full transition-all duration-500" style="width: {{ $bmiProgress }}%"></div>
                </div>
                <p class="text-xs text-gray-600 dark:text-gray-400 mt-1">Target: {{ $targetBMI }} | Current: {{ $latestHealth->bmi }}</p>
            </div>

            <div class="bg-white dark:bg-slate-600 p-5 rounded shadow-md">
                <p class="text-sm text-gray-500 dark:text-gray-300 mb-1">Body Fat % Goal</p>
                <div class="w-full bg-gray-200 dark:bg-gray-700 h-4 rounded-full overflow-hidden">
                    <div class="h-4 bg-purple-500 rounded-full transition-all duration-500" style="width: {{ $fatProgress }}%"></div>
                </div>
                <p class="text-xs text-gray-600 dark:text-gray-400 mt-1">Target: {{ $targetFat }}% | Current: {{ $latestHealth->body_fat_percentage }}%</p>
            </div>
        </div>
    </div>
    @endif
</div>

<script>
function healthGoalForm() {
    return {
        weight: '{{ old('target_weight', $goal->target_weight ?? '') }}',
        bmi: '{{ old('target_bmi', $goal->target_bmi ?? '') }}',
        fat: '{{ old('target_body_fat', $goal->target_body_fat ?? '') }}',
        showPreview: false,
        isSubmitting: false,
        errors: {
            weight: '',
            bmi: '',
            fat: ''
        },
        validateForm() {
            this.errors = { weight: '', bmi: '', fat: '' };

            if (this.weight && (this.weight < 1 || this.weight > 300)) {
                this.errors.weight = "Weight must be between 1 and 300 kg.";
            }
            if (this.bmi && (this.bmi < 10 || this.bmi > 50)) {
                this.errors.bmi = "BMI must be between 10 and 50.";
            }
            if (this.fat && (this.fat < 1 || this.fat > 70)) {
                this.errors.fat = "Body fat must be between 1% and 70%.";
            }

            if (!this.errors.weight && !this.errors.bmi && !this.errors.fat) {
                // Show loading state and submit form
                this.isSubmitting = true;
                
                // Log the data being submitted
                console.log('Submitting to database:', {
                    weight: this.weight,
                    bmi: this.bmi,
                    fat: this.fat
                });
                
                this.$el.closest('form').submit();
            }
        }
    };
}
</script>
@endsection