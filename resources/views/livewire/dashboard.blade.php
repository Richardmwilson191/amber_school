<div>
    <div>
        @if (Session::has('success'))
            <p class="bg-green-500">{{ Session::get('success') }}</p>
        @endif
    </div>
    <div>
        <x-elements.button wire:click="openModal('isOpenATModal')" class="">Add Teacher</x-elements.button>
    </div>

    <div class="w-full mb-12 xl:mb-0 px-4 mx-auto mt-12">
        <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded ">
            <div class="rounded-t mb-0 px-4 py-3 border-0">
                <div class="flex flex-wrap items-center">
                    <div class="relative w-full px-4 max-w-full flex-grow flex-1">
                        <h3 class="font-semibold text-base text-indigo-700">Students</h3>
                    </div>
                    <div class="flex items-center justify-center relative">
                        <input wire:model.debounce.500ms="searchVal"
                            class="border-2 border-gray-300 bg-white h-10 px-5 rounded-lg text-sm focus:outline-none"
                            type="search" placeholder="Search by last name">
                        <svg class="text-gray-600 h-4 w-4 fill-current absolute right-2"
                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1"
                            id="Capa_1" x="0px" y="0px" viewBox="0 0 56.966 56.966"
                            style="enable-background:new 0 0 56.966 56.966;" xml:space="preserve" width="512px"
                            height="512px">
                            <path
                                d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z" />
                        </svg>
                    </div>
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
                                class="px-4 bg-indigo-50 text-indigo-500 align-middle border border-solid border-indigo-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                Name
                            </th>
                            <th
                                class="px-4 bg-indigo-50 text-indigo-500 align-middle border border-solid border-indigo-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                Email
                            </th>
                            <th
                                class="px-4 bg-indigo-50 text-indigo-500 align-middle border border-solid border-indigo-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                Subject
                            </th>
                            <th
                                class="px-4 bg-indigo-50 text-indigo-500 align-middle border border-solid border-indigo-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                Options
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($teachers as $teacher)
                            <tr>
                                <td
                                    class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-md whitespace-nowrap p-4 text-left">
                                    {{ $teacher->name }}
                                </td>
                                <td
                                    class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-md whitespace-nowrap p-4 ">
                                    {{ $teacher->email }}
                                </td>
                                <td
                                    class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-md whitespace-nowrap p-4 ">
                                    @foreach ($teacher->subjects as $subject)
                                        {{ $subject->subject_nm }}
                                    @endforeach
                                </td>
                                <td>
                                    <div class="flex">
                                        <a wire:click="loadSubjects({{ $teacher->id }})"
                                            class="px-2 text-sm py-2 mx-auto font-medium text-indigo-600 transition duration-500 ease-in-out transform bg-indigo-100 rounded-lg hover:bg-indigo-300 focus:shadow-outline focus:outline-none focus:ring-2 ring-offset-current ring-offset-2">
                                            Assign</a>
                                        {{-- <a href="{{ route('teacher.show', $teacher->id) }}"
                                            class="px-2 text-sm py-2 mx-auto font-medium text-green-600 transition duration-500 ease-in-out transform bg-green-100 rounded-lg hover:bg-green-300 focus:shadow-outline focus:outline-none focus:ring-2 ring-offset-current ring-offset-2">
                                            <i class="fas fa-eye"></i></a>
                                        <a href="{{ route('teacher.edit', $teacher->id) }}"
                                            class="px-2 text-sm py-2 mx-auto font-medium text-blue-600 transition duration-500 ease-in-out transform bg-blue-100 rounded-lg hover:bg-blue-300 focus:shadow-outline focus:outline-none focus:ring-2 ring-offset-current ring-offset-2">
                                            <i class="fas fa-edit"></i></a>
                                        <form action="{{ route('teacher.destroy', $teacher->id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button
                                                class="px-2 text-sm py-2 mx-auto font-medium text-red-600 transition duration-500 ease-in-out transform bg-red-100 rounded-lg hover:bg-red-300 focus:shadow-outline focus:outline-none focus:ring-2 ring-offset-current ring-offset-2">
                                                <i class="fas fa-trash-alt"></i></button>
                                        </form> --}}
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $teachers->links() }}
            </div>
        </div>
    </div>

    @if ($isOpenATModal)
        <x-modal propName="isOpenATModal">
            <x-slot name="title">
                Add Teacher
            </x-slot>
            <x-slot name="content">
                <form wire:submit.prevent="addTeacher">
                    <div class="space-y-2 mb-2">
                        <label for="name" class="block font-medium tracking-tight">Name</label>
                        <input
                            class="w-full border border-gray-400 text-gray-800 placeholder-gray-400 rounded focus:border-transparent focus:outline-none focus:shadow-outline px-3 py-2"
                            wire:model="name" id="" type="text" value="{{ old('name') }}">
                        @error('name')
                            <div class="text-red-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="space-y-2 mb-2">
                        <label for="email" class="block font-medium tracking-tight">Email Address</label>
                        <input
                            class="w-full border border-gray-400 text-gray-800 placeholder-gray-400 rounded focus:border-transparent focus:outline-none focus:shadow-outline px-3 py-2"
                            wire:model="email" id="" type="email">
                        @error('email_addr')
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
            </x-slot>
        </x-modal>
    @endif

    @if ($isOpenASModal)
        <x-modal propName="isOpenASModal">
            <x-slot name="title">
                Assign Subject
            </x-slot>
            <x-slot name="content">
                <div>
                    <select
                        class="border border-gray-400 text-gray-800 placeholder-gray-400 rounded focus:border-transparent focus:outline-none focus:shadow-outline px-3 py-1"
                        wire:model="assignedSubject" id="">
                        <option value="">Select Subject</option>
                        @foreach ($subjects as $subject)
                            <option value="{{ $subject->id }}">{{ $subject->subject_nm }}</option>
                        @endforeach
                    </select>
                    <x-elements.button wire:click="assignSubject">Assign</x-elements.button>
                </div>
            </x-slot>
        </x-modal>
    @endif
</div>
