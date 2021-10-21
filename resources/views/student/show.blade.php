@extends('layouts.app')
@section('content')
    {{-- Subject choice section --}}
    <section>
        <x-subject-choice-table :studentId="$student_id" />
    </section>

    <section>
        <div class="w-full mb-12 xl:mb-0 px-4 mx-auto mt-12">
            <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded ">
                <div class="rounded-t mb-0 px-4 py-3 border-0">
                    <div class="flex flex-wrap items-center">
                        <div class="relative w-full px-4 max-w-full flex-grow flex-1">
                            <h3 class="font-semibold text-base text-indigo-700">Account Status</h3>
                        </div>
                    </div>
                </div>
                <div class="block w-full overflow-x-auto">
                    <table class="items-center bg-transparent w-full border-collapse ">
                        <thead>
                            <tr>
                                <th
                                    class="px-6 bg-indigo-50 text-indigo-500 align-middle border border-solid border-indigo-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                    Amount Due
                                </th>
                                <th
                                    class="px-6 bg-indigo-50 text-indigo-500 align-middle border border-solid border-indigo-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                    Amount Paid
                                </th>
                                <th
                                    class="px-6 bg-indigo-50 text-indigo-500 align-middle border border-solid border-indigo-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                    Balance
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($transactions as $transaction)
                                <tr>
                                    <td
                                        class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-md whitespace-nowrap p-4 text-left">
                                        {{ $transaction->amount_due }}
                                    </td>
                                    <td
                                        class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-md whitespace-nowrap p-4 ">
                                        {{ $transaction->amount_paid }}
                                    </td>

                                    <td
                                        class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-md whitespace-nowrap p-4 ">
                                        {{ $transaction->balance_amt }}
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>

                    </table>
                </div>
            </div>
        </div>

    </section>
@endsection
