<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Create userdetails
        </h2>
    </x-slot>
    @php
    $cat = DB::table('usercategorys')->get();
     $group = DB::table('groups')->get();
    $departm = DB::table('departments')->get();
    @endphp

    <div>
        <div class="max-w-4xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="mt-5 md:mt-0 md:col-span-2">
                <form method="post" action="{{ route('userdetails.store') }}">
                    @csrf
                    <div class="shadow overflow-hidden sm:rounded-md">

                        <div class="px-4 py-3 bg-white sm:p-6">
                            <label for="name" class="block font-medium text-sm text-gray-700">Name</label>
                            <input type="text" name="name" id="name"  class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('name', Auth::user()->name) }}" />
                        </div>
                         <div class="px-4 py-2 bg-white sm:p-6">
                            <label for="email" class="block font-medium text-sm text-gray-700">Email</label>

                            <input type="text" name="email" id="email"  class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('email', Auth::user()->email) }}"/>
                        </div>
                         <div class="px-4 py-2 bg-white sm:p-6">
                            <label for="category" class="block font-medium text-sm text-gray-700">User Category</label>

                            <select name="category" id="category" class="form-select rounded-md shadow-sm mt-1 block w-full">
                               <option disabled="" selected="">Select....</option>
                                  @foreach( $cat as $cate)
                                      <option value="{{$cate->id}}">{{$cate->cat_name}}</option>
                                  @endforeach
                                  </select>
                        </div>

                         <div class="px-4 py-2 bg-white sm:p-6">
                            <label for="department" class="block font-medium text-sm text-gray-700">Department</label>

                            <select name="department" id="department" class="form-select rounded-md shadow-sm mt-1 block w-full">
                               <option disabled="" selected="">Select....</option>
                                  @foreach( $departm as $depart)
                                      <option value="{{$depart->id}}">{{$depart->name}}</option>
                                  @endforeach
                                  </select>
                        </div>


                         <div class="px-4 py-2 bg-white sm:p-6">
                            <label for="group" class="block font-medium text-sm text-gray-700">Group</label>

                            <select name="group" id="group" class="form-select rounded-md shadow-sm mt-1 block w-full">
                               <option disabled="" selected="">Select....</option>
                                  @foreach( $group as $gro)
                                      <option value="{{$gro->id}}">{{$gro->grp_name}}</option>
                                  @endforeach
                                  </select>
                        </div>

                        <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">
                            <button class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                                Create
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>