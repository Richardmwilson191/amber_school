@extends('layouts.app')
@section('content')
    <section>
        <div class="py-12">
            <h1 class="bold text-3xl text-gray-800 w-4/6 m-auto">Add Student</h1>
        </div>
        <div class="w-4/6 m-auto bg-white p-12">
            <form action="{{ route('student.store') }}" method="post">
                @csrf
                <div class="space-y-2 mb-2">
                    <label for="frst_nm" class="block font-medium tracking-tight">First Name</label>
                    <input
                        class="w-full border border-gray-400 text-gray-800 placeholder-gray-400 rounded focus:border-transparent focus:outline-none focus:shadow-outline px-3 py-2"
                        name="frst_nm" id="" type="text" value="{{ old('frst_nm') }}">
                    @error('frst_nm')
                        <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                </div>
                <div class="space-y-2 mb-2">
                    <label for="last_nm" class="block font-medium tracking-tight">Last Name</label>
                    <input
                        class="w-full border border-gray-400 text-gray-800 placeholder-gray-400 rounded focus:border-transparent focus:outline-none focus:shadow-outline px-3 py-2"
                        name="last_nm" id="" type="text" value="{{ old('last_nm') }}">
                    @error('last_nm')
                        <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                </div>
                <div class="space-y-2 mb-2">
                    <label for="dob" class="block font-medium tracking-tight">Date of Birth</label>
                    <input
                        class="w-full border border-gray-400 text-gray-800 placeholder-gray-400 rounded focus:border-transparent focus:outline-none focus:shadow-outline px-3 py-2"
                        name="dob" id="" type="date" value="{{ old('date') }}">
                    @error('dob')
                        <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                </div>
                <div class="space-y-2 mb-2">
                    <label for="class" class="block font-medium tracking-tight">Class</label>
                    <input
                        class="w-full border border-gray-400 text-gray-800 placeholder-gray-400 rounded focus:border-transparent focus:outline-none focus:shadow-outline px-3 py-2"
                        name="class" id="" type="text" value="{{ old('class') }}">
                    @error('class')
                        <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                </div>
                <div class="space-y-2 mb-2">
                    <label for="phone_nbr" class="block font-medium tracking-tight">Phone Number</label>
                    <input
                        class="w-full border border-gray-400 text-gray-800 placeholder-gray-400 rounded focus:border-transparent focus:outline-none focus:shadow-outline px-3 py-2"
                        name="phone_nbr" id="" type="tel" value="{{ old('phone_nbr') }}">
                    @error('phone_nbr')
                        <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                </div>
                <div class="space-y-2 mb-2">
                    <label for="email_addr" class="block font-medium tracking-tight">Email Address</label>
                    <input
                        class="w-full border border-gray-400 text-gray-800 placeholder-gray-400 rounded focus:border-transparent focus:outline-none focus:shadow-outline px-3 py-2"
                        name="email_addr" id="" type="email" value="{{ old('email_addr') }}">
                    @error('email_addr')
                        <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                </div>
                <div class="space-y-2 mb-2">
                    <label for="gender" class="block font-medium tracking-tight">Gender</label>
                    <div class="block">
                        <input name="gender" id="" type="radio" value="m">
                        <span> Male</span>
                    </div>
                    <div class="block">
                        <input name="gender" id="" type="radio" value="f">
                        <span> Female</span>
                    </div>
                    @error('gender')
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
