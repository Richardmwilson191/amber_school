@extends('layouts.app')
@section('content')
    <section>
        <div class="py-12">
            <h1 class="bold text-3xl text-gray-800 w-4/6 m-auto">Add Subject</h1>
        </div>
        <div class="w-4/6 m-auto  bg-white p-12">
            <form action="{{ route('subject.store') }}" method="post">
                @csrf
                <div class="space-y-2 mb-2">
                    <label for="subject_nm" class="block font-medium tracking-tight">Name</label>
                    <input
                        class="w-full border border-gray-400 text-gray-800 placeholder-gray-400 rounded focus:border-transparent focus:outline-none focus:shadow-outline px-3 py-2"
                        name="subject_nm" id="" placeholder="Mathematics" type="text" value="{{ old('subject_nm') }}">
                    @error('subject_nm')
                        <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                </div>
                <div class="space-y-2 mb-2">
                    <label for="cost_amt" class="block font-medium tracking-tight">Cost</label>
                    <input
                        class="w-full border border-gray-400 text-gray-800 placeholder-gray-400 rounded focus:border-transparent focus:outline-none focus:shadow-outline px-3 py-2"
                        name="cost_amt" id="" placeholder="5000" type="number" value="{{ old('cost_amt') }}">
                    @error('cost_amt')
                        <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                </div>
                <div class="flex justify-end">
                    <button type="submit"
                        class="inline-flex items-center text-white px-5 py-2 rounded-lg overflow-hidden focus:outline-none bg-indigo-500 hover:bg-indigo-600 font-semibold tracking-tight">
                        Submit
                    </button>
                </div>
            </form>
        </div>
    </section>
@endsection
