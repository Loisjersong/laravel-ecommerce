@extends('admin.layouts.app')

@section("content")
<div class="flex justify-center items-center">
    <div class="w-full max-w-md">
        <div class="rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">

            <div class="border-b border-stroke px-6.5 py-4 dark:border-strokedark">
                <h3 class="font-medium text-black dark:text-white">
                    Add Category
                </h3>
            </div>

            <form action="{{ route('category.store') }}" method="POST">
                @csrf
                <div class="p-6.5">
                    <div class="mb-4.5">
                        <x-form-label> Category Name </x-form-label>
                        <x-form-input type="text" name="category_name" required/>
                        <x-input-error :messages="$errors->get('category_name')" ></x-input-error>
                    </div>

                    <x-button> Submit </x-button>

                </div>
            </form>

        </div>
    </div>
</div>
@endsection
