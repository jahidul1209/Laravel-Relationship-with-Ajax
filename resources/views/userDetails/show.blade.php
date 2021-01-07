<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Show userdetails
        </h2>
    </x-slot>

        <div class="max-w-6xl mx-auto py-10 sm:px-6 lg:px-8">

<div class="flex flex-col">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200 w-full">
                    <tr class="border-b">
                        <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            ID
                        </th>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">
                            {{ $userDetail->id }}
                        </td>
                    </tr>
                    <tr class="border-b">
                        <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                           User Name
                        </th>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">
                            {{ $userDetail->name }}
                        </td>
                    </tr>
                    <tr class="border-b">
                        <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Email
                        </th>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">
                            {{ $userDetail->email }}
                        </td>
                    </tr>
                     <tr class="border-b">
                        <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Department Name
                        </th>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">
                            {{ $userDetail->department->name}}
                        </td>
                    </tr>
                     <tr class="border-b">
                        <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            User Category
                        </th>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">
                        {{ $userDetail->category->cat_name }}
                        </td>
                    </tr>
                    <tr class="border-b">
                        <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Category Details
                        </th>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">
                        {{ $userDetail->category->details }}
                        </td>
                    </tr>
                    <tr class="border-b">
                        <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Group Name
                        </th>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">
                        {{ $userDetail->group->grp_name }}
                        </td>
                    </tr>
                    <tr class="border-b">
                        <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                          Group Status
                        </th>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">
                        {{ $userDetail->group->status }}
                        </td>
                    </tr>
                    <tr class="border-b">
                        <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                          Group Detais
                        </th>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">
                        {{ $userDetail->group->details }}
                        </td>
                    </tr>

                </table>
            </div>
        </div>
    </div>
</div>
            <div class="block mt-8">
                <a href="{{ route('userdetails.index') }}" class="bg-gray-200 hover:bg-gray-300 text-black font-bold py-2 px-4 rounded">Back to list</a>
            </div>
        </div>
</x-app-layout>