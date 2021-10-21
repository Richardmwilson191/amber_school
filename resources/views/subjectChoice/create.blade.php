@extends('layouts.app')
@section('content')
    <div>
        <a href="{{ url()->previous() }}" class="text-red-500">
            <<< back</a>
    </div>
    <section>
        <div class="py-12">
            <h1 class="bold text-3xl text-gray-800 w-4/6 m-auto">Add Student</h1>
        </div>
        <div class="w-4/6 m-auto bg-white p-12">
            <form action="{{ route('subjectchoice.store') }}" method="post">
                @csrf
                <div>
                    <input type="hidden" name="student_id" value="{{ $student_id }}">
                </div>
                <div class="space-y-2 mb-2">
                    <label for="frst_nm" class="block font-medium tracking-tight">Subject</label>
                    <select name="subject_id" id=""
                        class="w-full border border-gray-400 text-gray-800 placeholder-gray-400 rounded focus:border-transparent focus:outline-none focus:shadow-outline px-3 py-2">
                        <option value="">Select Subject</option>
                        @foreach ($subjects as $subject)
                            <option value="{{ $subject->id }}">{{ $subject->subject_nm }}</option>
                        @endforeach
                    </select>
                    @error('subject_id')
                        <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                </div>
                <div class="space-y-2 mb-2">
                    <label for="status" class="block font-medium tracking-tight">Application Status</label>
                    <select
                        class="w-full border border-gray-400 text-gray-800 placeholder-gray-400 rounded focus:border-transparent focus:outline-none focus:shadow-outline px-3 py-2"
                        name="status" id="">
                        <option value="0">Rejected</option>
                        <option value="1">Approved</option>
                    </select>
                    @error('status')
                        <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                </div>
                <div class="space-y-2 mb-2">
                    <label for="year_of_exam" class="block font-medium tracking-tight">Year of Exam</label>
                    <input
                        class="w-full border border-gray-400 text-gray-800 placeholder-gray-400 rounded focus:border-transparent focus:outline-none focus:shadow-outline px-3 py-2"
                        name="year_of_exam" id="" type="number" value="{{ old('date') }}">
                    @error('year_of_exam')
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

    {{-- Subject choice section --}}
    <section>
        <x-subject-choice-table :studentId="$student_id" />
    </section>
@endsection
