<div>
    <div>
        @if (Session::has('success'))
            <p class="bg-green-500">{{ Session::get('success') }}</p>
        @endif
    </div>
    <div>
        <x-elements.button wire:click="openModal('isOpenATModal')" class="">Add Teacher</x-elements.button>
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
        <x-modal>
            <x-slot name="title">
                Assign Subject
            </x-slot>
            <x-slot name="content">
                @foreach ($students as $student)
                    {{ $student }}
                @endforeach
            </x-slot>
        </x-modal>
    @endif
</div>
