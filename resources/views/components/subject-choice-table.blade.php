<div class="w-full mb-12 xl:mb-0 px-4 mx-auto mt-12">
    <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded ">
        <div class="rounded-t mb-0 px-4 py-3 border-0">
            <div class="flex flex-wrap items-center">
                <div class="relative w-full px-4 max-w-full flex-grow flex-1">
                    <h3 class="font-semibold text-base text-indigo-700">Subjects Choices</h3>
                </div>
                {{-- <div class="relative w-full px-4 max-w-full flex-grow flex-1 text-right">
                    <a href="{{ route('subject.create') }}"
                        class="bg-indigo-500 text-white active:bg-indigo-600 text-xs font-bold uppercase px-3 py-2 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                        type="button">Add Subject</a>
                </div> --}}
            </div>
        </div>
        <div class="block w-full overflow-x-auto">
            <table class="items-center bg-transparent w-full border-collapse ">
                <thead>
                    <tr>
                        <th
                            class="px-6 bg-indigo-50 text-indigo-500 align-middle border border-solid border-indigo-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                            Subject Name
                        </th>
                        <th
                            class="px-6 bg-indigo-50 text-indigo-500 align-middle border border-solid border-indigo-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                            Cost
                        </th>
                        <th
                            class="px-6 bg-indigo-50 text-indigo-500 align-middle border border-solid border-indigo-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                            Amount Paid
                        </th>
                        <th
                            class="px-6 bg-indigo-50 text-indigo-500 align-middle border border-solid border-indigo-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                            Exam Year
                        <th
                            class="px-6 bg-indigo-50 text-indigo-500 align-middle border border-solid border-indigo-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                            Status
                        </th>
                        <th
                            class="px-6 text-center bg-indigo-50 text-indigo-500 align-middle border border-solid border-indigo-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold">
                            Actions
                        </th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($subject_choices as $choice)
                        {{-- {{ dd($choice->student->payments[0]->amount_paid) }} --}}
                        <tr>
                            <td
                                class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-md whitespace-nowrap p-4 text-left">
                                {{ $choice->subject->subject_nm }}
                            </td>
                            <td
                                class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-md whitespace-nowrap p-4 ">
                                {{ $choice->subject->cost_amt }}
                            </td>
                            <td
                                class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-md whitespace-nowrap p-4 ">
                                @foreach ($choice->student->payments as $payment)
                                    @if ($payment->subject_id === $choice->subject_id)
                                        {{ $payment->amount_paid }}
                                    @endif
                                @endforeach
                            </td>
                            <td
                                class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-md whitespace-nowrap p-4 ">
                                {{ $choice->year_of_exam }}
                            </td>
                            <td
                                class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-md whitespace-nowrap p-4 ">
                                {{ $choice->status ? 'Approved' : 'Rejected' }}
                            </td>
                            <td>
                                <div class="flex">
                                    @if ($choice->status === 0)
                                        <form class="mx-auto"
                                            action="{{ route('subjectchoice.update', $choice->id) }}" method="post">
                                            @csrf
                                            @method('put')
                                            <input type="hidden" name="status" value="1">
                                            <button
                                                class="px-2 text-sm py-2 mx-auto font-medium text-green-600 transition duration-500 ease-in-out transform bg-green-100 rounded-lg hover:bg-green-300 focus:shadow-outline focus:outline-none focus:ring-2 ring-offset-current ring-offset-2">
                                                Approve</button>
                                        </form>
                                    @else
                                        <form class="mx-auto"
                                            action="{{ route('subjectchoice.update', $choice->id) }}" method="post">
                                            @csrf
                                            @method('put')
                                            <input type="hidden" name="status" value="0">
                                            <button
                                                class="px-2 text-sm py-2 mx-auto font-medium text-red-600 transition duration-500 ease-in-out transform bg-red-100 rounded-lg hover:bg-red-300 focus:shadow-outline focus:outline-none focus:ring-2 ring-offset-current ring-offset-2">
                                                Reject</button>
                                        </form>
                                    @endif
                                    @if ($choice->status)
                                        <a href="{{ route('payment.make', $choice) }}"
                                            class="px-2 text-sm py-2 mx-auto font-medium text-green-600 transition duration-500 ease-in-out transform bg-green-100 rounded-lg hover:bg-green-300 focus:shadow-outline focus:outline-none focus:ring-2 ring-offset-current ring-offset-2">
                                            Make Payment</a>
                                    @else
                                        <a href="{{ route('payment.make', $choice) }}"
                                            class="px-2 cursor-not-allowed text-sm py-2 mx-auto font-medium text-gray-600 transition duration-500 ease-in-out transform bg-gray-100 rounded-lg  focus:shadow-outline focus:outline-none focus:ring-2 ring-offset-current ring-offset-2">
                                            Make Payment</a>
                                    @endif
                                </div>
                                {{-- <div class="flex w-1/2 mx-auto">
                                    <a href="{{ route('subject.show', $subject->id) }}"
                                        class="px-2 text-sm py-2 mx-auto font-medium text-green-600 transition duration-500 ease-in-out transform bg-green-100 rounded-lg hover:bg-green-300 focus:shadow-outline focus:outline-none focus:ring-2 ring-offset-current ring-offset-2">
                                        View</a>
                                    <a href="{{ route('subject.edit', $subject->id) }}"
                                        class="px-2 text-sm py-2 mx-auto font-medium text-blue-600 transition duration-500 ease-in-out transform bg-blue-100 rounded-lg hover:bg-blue-300 focus:shadow-outline focus:outline-none focus:ring-2 ring-offset-current ring-offset-2">
                                        Edit</a>
                                    <form class="mx-auto"
                                        action="{{ route('subject.destroy', $subject->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button
                                            class="px-2 text-sm py-2 mx-auto font-medium text-red-600 transition duration-500 ease-in-out transform bg-red-100 rounded-lg hover:bg-red-300 focus:shadow-outline focus:outline-none focus:ring-2 ring-offset-current ring-offset-2">
                                            Delete</button>
                                    </form>
                                </div> --}}
                            </td>
                        </tr>
                    @endforeach

                </tbody>

            </table>
        </div>
    </div>
</div>
