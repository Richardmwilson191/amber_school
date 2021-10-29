@extends('layouts.app')
@section('content')
    <div class="w-full mb-12 xl:mb-0 px-4 mx-auto mt-12">
        <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded ">
            <div class="block w-full overflow-x-auto">
                {{ dataTable($students) }}
            </div>
        </div>
    </div>
    {{ dynamicDataTable($students, ['First Name' => 'frst_nm', 'Class' => 'class', 'Phone Number' => 'phone_nbr', 'Gender' => 'gender']) }}
    {{ dataTable($subjects) }}
    {{ dynamicDataTable($subjects, ['Subject Name' => 'subject_nm', 'Cost' => 'cost_amt', 'Date Created' => 'created_at']) }}
@endsection
