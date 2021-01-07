<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit usercategory
        </h2>
    </x-slot>

    <div>
        <div class="max-w-4xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="mt-5 md:mt-0 md:col-span-2">
                <form method="post" action="{{ route('usercategory.update', $edit_cat->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="name" class="block font-medium text-sm text-gray-700">usercategory </label>
                            <input type="text" name="cat_name" id="cat_name" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                value="{{ old('cat_name', $edit_cat->cat_name) }}" />

                        </div>
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="details" class="block font-medium text-sm text-gray-700">Details </label>
                            <textarea type="text" name="details" id="details" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                value="{{ old('details',
                                $edit_cat->details) }}">{{ old('details',
                                $edit_cat->details) }} </textarea>

                        </div>


                        <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">
                            <button class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                                Edit
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>