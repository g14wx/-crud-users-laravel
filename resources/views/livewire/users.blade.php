<div>
    <div class="col-md-8 mb-2">
        @if(session()->has('success'))
            <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md" role="alert">
                <div class="flex">
                    <div class="py-1"><svg class="fill-current h-6 w-6 text-teal-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
                    <div>
                        <p class="font-bold">Done!</p>
                        <p class="text-sm">{{ session()->get('success') }}</p>
                    </div>
                </div>
            </div>
            <div class="alert alert-success" role="alert">
            </div>
        @endif
        @if(session()->has('error'))
            <div class="alert alert-danger" role="alert">
                {{ session()->get('error') }}
            </div>
        @endif
        @if($addUser)
            @include('livewire.createUser')
        @endif
        @if($updateUser)
            @include('livewire.updateUser')
        @endif
    </div>


    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        @if(!$addUser)

            <button type="submit" wire:click="addUser()" class="flex px-4 py-2 bg-gray-100 text-gray-900 cursor-pointer hover:bg-blue-200 focus:text-blue-700 focus:bg-blue-200 focus:outline-none focus:ring-blue-600"> Add new user
            </button>
        @endif
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    User name
                </th>
                <th scope="col" class="px-6 py-3">
                    Age
                </th>
                <th scope="col" class="px-6 py-3">
                    Email
                </th>
                <th scope="col" class="px-6 py-3">
                    Created at
                </th>
                <th scope="col" class="px-6 py-3">
                    <span class="sr-only">Edit</span>
                </th>

                <th scope="col" class="px-6 py-3">
                    <span class="sr-only">Delete</span>
                </th>
            </tr>
            </thead>
            <tbody>
            @if (count($users) > 0)
                @foreach ($users as $User)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-600">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$User->name}}
                        </td>
                        <td class="px-6 py-4">
                            {{$User->age ?? 'No data'}}
                        </td>
                        <td class="px-6 py-4">
                            {{$User->email}}
                        </td>
                        <td class="px-6 py-4">
                            {{$User->created_at}}
                        </td>

                        <td class="px-6 py-4 text-right">
                            <button wire:click="editUser({{$User->id}})"
                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit
                            </button>
                        </td>

                        <td class="px-6 py-4 text-right">
                            <button wire:click="deleteUser({{$User->id}})"
                                    class="bg-red hover:bg-red text-white font-bold py-2 px-4 rounded">delete
                            </button>
                        </td>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="6" align="center">
                        No Users Found.
                    </td>
                </tr>
            @endif

            </tbody>
        </table>
    </div>

</div>
