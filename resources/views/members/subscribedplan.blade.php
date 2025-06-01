@extends('layouts.member-app')
@section('content')
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <h2 class="text-2xl font-bold text-white mb-6">Subscription</h2>

        @if ($member && $member->plan)
            @php
               
                $expiryDateformat = \Carbon\Carbon::parse($member->expirydate);
                $isExpired = $expiryDateformat->isPast();
                 $expiryDate = $member->expirydate;
            @endphp

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 p-4">
                <div
                    class="bg-slate-600 shadow-lg rounded-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                    <div class="bg-slate-500 p-4 flex justify-between items-center">
                        <h3 class="text-lg font-semibold text-white">{{ $member->plan->name }}</h3>
                        <div class="flex items-center space-x-4">
                            <span class="bg-blue-100 text-blue-800 text-xs font-medium px-3 py-1 rounded-full">
                                #1
                            </span>

                            @if ($isExpired)
                                <form action="{{ route('members.renew', $member->id) }}" method="POST" class="inline">
                                    @csrf
                                    <button type="submit"
                                        class="bg-blue-600 hover:bg-blue-700 text-white text-xs font-semibold py-1 px-3 rounded-xl transition duration-300">
                                        Renew
                                    </button>
                                </form>
                            @endif
                        </div>
                    </div>

                    <div class="p-6 space-y-4">
                        <div>
                            <p class="text-sm text-gray-100">Purchased Date</p>
                            <p class="text-gray-100 font-medium">
                                {{ \Carbon\Carbon::parse($member->joining_date)->format('M d, Y') }}
                            </p>
                        </div>

                        <div>
                            <p class="text-sm text-gray-100">Expiry Date</p>
                            <p class="text-red-500 font-medium">
                                {{ $expiryDate}}
                            </p>
                        </div>

                        <div>
                            <p class="text-sm text-gray-100">Days Remaining</p>
                            <p id="countdown" class="font-medium"></p>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="text-white p-6 text-center bg-slate-600 rounded-lg">
                No subscription available.
            </div>
        @endif
    </div>

    {{-- Countdown Script --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const expiryDate = new Date("{{ $expiryDate }}T00:00:00");
            const countdownElement = document.getElementById('countdown');

            function updateCountdown() {
                const now = new Date();
                const diffTime = expiryDate - now;
                const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24)); // Days left

                if (diffDays > 0) {
                    countdownElement.textContent = diffDays + " day(s) left";
                    countdownElement.className = "text-green-400 font-medium";
                } else if (diffDays === 0) {
                    countdownElement.textContent = "Expires today!";
                    countdownElement.className = "text-yellow-400 font-medium";
                } else {
                    countdownElement.textContent = "Expired " + Math.abs(diffDays) + " day(s) ago";
                    countdownElement.className = "text-red-400 font-medium";
                }
            }

            updateCountdown(); // Call once when page loads
        });
    </script>
@endsection
