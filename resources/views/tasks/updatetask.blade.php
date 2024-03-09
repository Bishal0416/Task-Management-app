
<x-app-layout>

    <div class="flex flex-row">

        <!-- Component Start -->
        <div
            class="flex flex-col items-center w-60 overflow-hidden text-gray-400 bg-gray-900 ">
            <div class="w-full px-2">
                <div class="flex flex-col items-center w-full mt-3  border-gray-700">
                    <a class="flex items-center justify-center w-full h-16 mt-auto bg-gray-800 hover:bg-gray-700 hover:text-gray-300"
                        href={{route('profile.edit')}}>
                        <svg class="w-6 h-6 stroke-current" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span class="ml-2 text-sm font-medium">Account</span>
                    </a>
                    <a class="flex items-center w-full h-12 px-3 mt-2 rounded hover:bg-gray-700 hover:text-gray-300"
                        href={{route('dashboard')}}>
                        <svg class="w-6 h-6 stroke-current" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                        </svg>
                        <span class="ml-2 text-sm font-medium">Dasboard</span>
                    </a>
                    <a class="flex items-center w-full h-12 px-3 mt-2 rounded hover:bg-gray-700 hover:text-gray-300"
                        href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 stroke-current" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0-8 0M6 21v-2a4 4 0 0 1 4-4h4a4 4 0 0 1 4 4v2" />
                        </svg>
                        <span class="ml-2 text-sm font-medium">Users</span>
                    </a>
                    <a class="flex items-center w-full h-12 px-3 mt-2 rounded hover:bg-gray-700 hover:text-gray-300"
                        href={{route('task.create')}}>
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 stroke-current" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m10.95 16.865l4.958-4.957l-.72-.72l-4.244 4.245l-2.138-2.139l-.714.714zM6.615 21q-.69 0-1.152-.462Q5 20.075 5 19.385V4.615q0-.69.463-1.152Q5.925 3 6.615 3H14.5L19 7.5v11.885q0 .69-.462 1.152q-.463.463-1.153.463zM14 8V4H6.615q-.23 0-.423.192Q6 4.385 6 4.615v14.77q0 .23.192.423q.193.192.423.192h10.77q.23 0 .423-.192q.192-.193.192-.423V8zM6 4v4zv16z" />
                        </svg>
                        <span class="ml-2 text-sm font-medium">Assign Task</span>
                    </a>
                </div>
            </div>
        </div>
        <!-- Component End  -->

        <div class="flex w-full flex-col border-l-2">
            <h1 class='text-slate-200 text-3xl text-center'>Update Task</h1>
            <form action="{{ route('task.update',['task_id'=> $current_task->id]) }}" method="POST" class="m-2" enctype="multipart/form-data">
                @csrf
                @method('patch')
                <!-- task title -->
                <div class='m-2'>
                    <div class="mb-5">
                        <label for="task_title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Task Title</label>
                        <input name="task_title" type="text" id="task_title" value='{{ $current_task->title }}'
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <x-input-error class="mt-2" :messages="$errors->get('title')" />
                    </div>
                </div>
                <!-- task description -->
                <div class='m-2'>
                    <label for="desc" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Describe task</label>
                    <textarea id="desc" rows="4" name="desc"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Describe task....">{{ $current_task->description }}
                    </textarea>
                    <x-input-error class="mt-2" :messages="$errors->get('desc')" />
                </div>
                <!-- due date -->
                <div class=" m-2">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="due_date">Due Date</label>
                    <input
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        type="date" id="due_date" name="due_date">
                        <x-input-error class="mt-2" :messages="$errors->get('due_date')" />

                </div>
                <!-- status -->
                <div class="m-2">
                    <label for="status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select Status</label>
                    <select id="status" name="status"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option>Pending</option>
                        <option>In_progress</option>
                        <option>Completed</option>
                    </select>
                    <x-input-error class="mt-2" :messages="$errors->get('status')" />
                </div>
                <!-- assign user -->
                <div class="m-2">
                    <label for="assign[]" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select Users</label>
                    <select id="assign[]" multiple="multiple" name="assign[]"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <!-- <option>Pending</option>
                        <option>In progress</option>
                        <option>Completed</option> -->
                        @foreach($user_name as $user)
                        @if(!($user->role == 'Admin'))
                        <option>{{$user->name}}</option>
                        @endif
                        @endforeach
                    </select>
                    <x-input-error class="mt-2" :messages="$errors->get('assign[]')" />
                </div>
                <!-- catagories -->
                <div class="m-2">
                    <label for="catagory[]" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select Catagories</label>
                    <select id="catagory[]" multiple="multiple" name="catagory[]"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <!-- <option>Web Devopment</option>
                        <option>Android</option> -->
                        @foreach($catagories as $catagory)
                        <option>{{$catagory->catagory_name}}</option>
                        @endforeach

                    </select>
                    <x-input-error class="mt-2" :messages="$errors->get('catagory[]')" />

                </div>
                <!-- file upload -->
                <div class='m-2'>
                    @if(Auth::user()->id == $current_task->user_id || Auth::user()->role == 'Admin')
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="task_file">Upload file</label>
                    <input id="task_file" name="task_file"
                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                        aria-describedby="user_avatar_help" type="file">
                    <x-input-error class="mt-2" :messages="$errors->get('task_file')" />
                    @else
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="task_file">Upload file</label>
                    <input id="task_file" name="task_file" disabled
                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                        aria-describedby="user_avatar_help" type="file">
                    <x-input-error class="mt-2" :messages="$errors->get('task_file')" />
                    @endif
                </div>
                <!-- create button -->
                <div class="mt-8 ">
                    <x-danger-button class="ml-3">
                        Update
                    </x-danger-button>
                </div>
            </form>
        </div>

    </div>

</x-app-layout>