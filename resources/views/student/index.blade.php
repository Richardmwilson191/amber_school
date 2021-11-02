@extends('layouts.app')
@section('content')
    <!-- component -->
    <section class="py-1 bg-indigo-50">
        <livewire:student-table-live />
        {{-- <div class="py-12">
            <h1 class="bold text-3xl text-gray-800 w-4/6 m-auto">Student</h1>
        </div> --}}
        {{-- <div class="w-full mb-12 xl:mb-0 px-4 mx-auto mt-12">
            <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded ">
                <div class="rounded-t mb-0 px-4 py-3 border-0">
                    <div class="flex flex-wrap items-center">
                        <div class="relative w-full px-4 max-w-full flex-grow flex-1">
                            <a href="{{ route('student.index') }}"
                                class="bg-indigo-500 text-white active:bg-indigo-600 text-xs font-bold uppercase px-3 py-2 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150">Students</a>
                        </div>
                        <!-- Search component -->
                        <div class="relative w-full px-4 max-w-full flex-grow flex-1">
                            <div class="pt-2 relative mx-auto text-gray-600">
                                @livewire('student-search')
                            </div>
                        </div>
                        <!-- End search component -->
                        <div class="relative w-full px-4 max-w-full flex-grow flex-1 text-right">
                            <a href="{{ route('student.create') }}"
                                class="bg-indigo-500 text-white active:bg-indigo-600 text-xs font-bold uppercase px-3 py-2 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                                type="button">Add Student</a>
                        </div>
                    </div>
                </div>

                <div class="block w-full overflow-x-auto">
                    <table class="items-center bg-transparent w-full border-collapse ">
                        <thead>
                            <tr>
                                <th
                                    class="px-6 bg-indigo-50 text-indigo-500 align-middle border border-solid border-indigo-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                    First Name
                                </th>
                                <th
                                    class="px-6 bg-indigo-50 text-indigo-500 align-middle border border-solid border-indigo-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                    Last Name
                                </th>
                                <th
                                    class="px-6 bg-indigo-50 text-indigo-500 align-middle border border-solid border-indigo-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                    DOB
                                </th>
                                <th
                                    class="px-6 bg-indigo-50 text-indigo-500 align-middle border border-solid border-indigo-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                    Class
                                </th>
                                <th
                                    class="px-6 bg-indigo-50 text-indigo-500 align-middle border border-solid border-indigo-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                    Phone
                                </th>
                                <th
                                    class="px-6 bg-indigo-50 text-indigo-500 align-middle border border-solid border-indigo-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                    Email
                                </th>
                                <th
                                    class="px-6 bg-indigo-50 text-indigo-500 align-middle border border-solid border-indigo-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                    Gender
                                </th>
                                <th
                                    class="px-6 bg-indigo-50 text-indigo-500 align-middle border border-solid border-indigo-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                    Options
                                </th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($students as $student)
                                <tr>
                                    <td
                                        class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-md whitespace-nowrap p-4 text-left">
                                        {{ $student->frst_nm }}
                                    </td>
                                    <td
                                        class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-md whitespace-nowrap p-4 ">
                                        {{ $student->last_nm }}
                                    </td>
                                    <td
                                        class="border-t-0 px-6 align-center border-l-0 border-r-0 text-md whitespace-nowrap p-4">
                                        {{ $student->dob }}
                                    </td>
                                    <td
                                        class="border-t-0 px-6 align-center border-l-0 border-r-0 text-md whitespace-nowrap p-4">
                                        {{ $student->class }}
                                    </td>
                                    <td
                                        class="border-t-0 px-6 align-center border-l-0 border-r-0 text-md whitespace-nowrap p-4">
                                        {{ $student->phone_nbr }}
                                    </td>
                                    <td
                                        class="border-t-0 px-6 align-center border-l-0 border-r-0 text-md whitespace-nowrap p-4">
                                        {{ $student->email_addr }}
                                    </td>
                                    <td
                                        class="border-t-0 px-6 align-center border-l-0 border-r-0 text-md whitespace-nowrap p-4">
                                        {{ $student->gender }}
                                    </td>
                                    <td>
                                        <div class="flex">
                                            <a href="{{ route('subjectchoice.create', $student->id) }}"
                                                class="px-2 text-sm py-2 mx-auto font-medium text-indigo-600 transition duration-500 ease-in-out transform bg-indigo-100 rounded-lg hover:bg-indigo-300 focus:shadow-outline focus:outline-none focus:ring-2 ring-offset-current ring-offset-2">
                                                Add Subject</a>
                                            <a href="{{ route('student.show', $student->id) }}"
                                                class="px-2 text-sm py-2 mx-auto font-medium text-green-600 transition duration-500 ease-in-out transform bg-green-100 rounded-lg hover:bg-green-300 focus:shadow-outline focus:outline-none focus:ring-2 ring-offset-current ring-offset-2">
                                                View</a>
                                            <a href="{{ route('student.edit', $student->id) }}"
                                                class="px-2 text-sm py-2 mx-auto font-medium text-blue-600 transition duration-500 ease-in-out transform bg-blue-100 rounded-lg hover:bg-blue-300 focus:shadow-outline focus:outline-none focus:ring-2 ring-offset-current ring-offset-2">
                                                Edit</a>
                                            <form action="{{ route('student.destroy', $student->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button
                                                    class="px-2 text-sm py-2 mx-auto font-medium text-red-600 transition duration-500 ease-in-out transform bg-red-100 rounded-lg hover:bg-red-300 focus:shadow-outline focus:outline-none focus:ring-2 ring-offset-current ring-offset-2">
                                                    Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>

                    </table>
                    <div class="mt-4 pl-4">{{ $students->links() }}</div>
                </div>
            </div>
        </div> --}}
    </section>
@endsection
