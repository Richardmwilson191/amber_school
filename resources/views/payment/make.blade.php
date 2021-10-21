@extends('layouts.app')
@section('content')
    <div class="flex h-screen">
        <div class="m-auto w-max-content shadow-lg">
            <div class="bg-indigo-600 py-4 text-lg font-semibold text-white text-center">Payment Details</div>
            <div class="bg-white p-8">
                <div class="text-indigo-600 mb-4 font-semibold">Payment for {{ $subjectChoice->subject->subject_nm }}</div>
                <form class="mx-auto" action="{{ route('payment.pay', $subjectChoice) }}" method="post">
                    @csrf
                    <div class="space-y-2 mb-2">
                        <label for="amount" class="block font-medium tracking-tight">Payment Amount</label>
                        <input
                            class="w-full border border-gray-400 text-gray-800 placeholder-gray-400 rounded focus:border-transparent focus:outline-none focus:shadow-outline px-3 py-2"
                            name="amount" id="" type="number" value="{{ old('amount') }}">
                        @error('amount')
                            <div class="text-red-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="space-y-2 mb-2">
                        <label for="desc" class="block font-medium tracking-tight">Payment Description</label>
                        <textarea
                            class="w-full border border-gray-400 text-gray-800 placeholder-gray-400 rounded focus:border-transparent focus:outline-none focus:shadow-outline px-3 py-2"
                            name="desc" id="" value="{{ old('desc') }}"></textarea>
                        @error('desc')
                            <div class="text-red-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>
                    <button
                        class="px-4 py-2 mx-auto font-medium text-green-600 transition duration-500 ease-in-out transform bg-green-100 rounded-lg hover:bg-green-300 focus:shadow-outline focus:outline-none focus:ring-2 ring-offset-current ring-offset-2">
                        Pay</button>
                </form>
            </div>
        </div>
    </div>
@endsection
