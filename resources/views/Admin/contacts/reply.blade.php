@extends('layouts.app')
@section('content')
<div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="max-w-2xl mx-auto">
        <div class="bg-slate-600 rounded-lg shadow overflow-hidden">
            <div class="bg-indigo-600 px-4 py-4 sm:px-6">
                <h3 class="text-lg font-semibold text-white">Compose Reply</h3>
            </div>
            <div class="px-4 py-5 sm:p-6">
                <form method="POST" action="{{ route('admin.contacts.reply.send') }}" class="space-y-6">
                    @csrf
                    <div>
                        <label for="to" class="block text-sm font-medium text-gray-100">Recipient</label>
                        <div class="mt-1">
                            <input type="email" name="to" id="to" 
                                   class="block w-full rounded-md border-gray-300 shadow-sm 
                                          focus:border-indigo-500 focus:ring-indigo-500 bg-gray-600 opacity-75" 
                                   value="{{ $contacts->email }}" readonly>
                                   @error('to')
                                       <span class="text-red-600">{{ $message }}</span>
                                   @enderror
                        </div>
                    </div>

                    <div>
                        <label for="subject" class="block text-sm font-medium text-gray-100">Subject</label>
                        <div class="mt-1">
                            <input type="text" name="subject" id="subject" 
                                   class="block w-full rounded-md bg-slate-600 border-gray-300 text-white shadow-sm 
                                          focus:border-indigo-500 focus:ring-indigo-500" 
                                   value="Re: {{ $contacts->subject }}">
                                   @error('subject')
                                       <span class="text-red-600">{{ $message }}</span>
                                   @enderror
                        </div>
                    </div>

                    <div>
                        <label for="reply" class="block text-sm font-medium text-gray-100">Message</label>
                        <div class="mt-1">
                            <textarea name="reply" id="reply" rows="4" 
                                      class="block w-full rounded-md border-gray-300 shadow-sm 
                                            bg-slate-600 text-white focus:border-indigo-500 focus:ring-indigo-500"></textarea>
                                            @error('reply')
                                       <span class="text-red-600">{{ $message }}</span>
                                   @enderror
                        </div>
                    </div>

                    <div class="flex justify-end">
                        <button type="submit" 
                                class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent 
                                       rounded-md font-semibold text-xs text-white uppercase tracking-widest 
                                       hover:bg-indigo-700 focus:bg-indigo-700 active:bg-indigo-900 
                                       focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 
                                       transition ease-in-out duration-150">
                            Send Reply
                        </button>
                    </div>
                </form>
            </div>
            <a href="{{route('admin.contacts.index')}}" class="mb-3 text-white text-lg font-mono px-4 py-4 inline-block hover:text-gray-200 transition-colors" aria-label="Back">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
            </a>
        </div>
    </div>
</div>
@endsection