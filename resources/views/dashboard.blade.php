<x-app-layout>
    <!-- <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8"> -->
    <!-- <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div> -->
    <div class="flex flex-row">
        <!-- Component Start -->
        <div
            class="flex flex-col items-center w-60 overflow-hidden text-gray-400 bg-gray-900 border-r h-screen">
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



        <div class="flex flex-col m-2">
            <!-- Search Filter section -->
            <div>
                <form action="{{ route('task.filter-search') }}" method="GET">
                    <input type="text" name="keyword" placeholder="Search title and Description">
                    <button type="submit">Search</button>
                </form>
                <form action="">
                    <div>
                        <span>Filter by:</span>
                            <select name="catagory">
                                <option>Catagory</option>
                                @foreach($catagories as $catagory)
                                <option>{{ $catagory->catagory_name }}</option>
                                @endforeach
                            </select>
                        
                            <select name="status">
                                <option>status</option>
                                <option>Pending</option>
                                <option>In_progress</option>
                                <option>Completed</option>
                            </select>
                            <input type="date" name="due_data">
                            <button type="submit">filter</button>
                    </div>
                </form>











            </div>

            <!-- Task section -->
            <div class="flex flex-row flex-wrap">
                @foreach($allTasks as $task)
                <div class="m-1 p-4 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <div class="flex flex-row">
                        <svg class="w-7 h-7 text-gray-500 dark:text-gray-400 mb-3" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M8.5 2a1.5 1.5 0 0 0-1.415 1H5.5A1.5 1.5 0 0 0 4 4.5v12A1.5 1.5 0 0 0 5.5 18h9a1.5 1.5 0 0 0 1.5-1.5v-12A1.5 1.5 0 0 0 14.5 3h-1.585A1.5 1.5 0 0 0 11.5 2zM8 3.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5m4.854 6.354l-3.5 3.5a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L9 12.293l3.146-3.147a.5.5 0 0 1 .708.708" />
                        </svg>
                        <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">{{ $task->title }}</h5>
                    </div>
                    <p class="mb-3 font-normal text-gray-500 dark:text-gray-400">Created by: {{ $task->user_id}}</p>
                    <p class="mb-3 font-normal text-gray-500 dark:text-gray-400">Progress:{{ $task->status}}</p>
                    <p class="mb-3 font-normal text-gray-500 dark:text-gray-400">catagories:{{ $task->catagory }}</p>
                    <a href="{{ route('task.show', ['task_id'=> $task->id]) }}"
                        class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Read more
                        <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M1 5h12m0 0L9 1m4 4L9 9" />
                        </svg>
                    </a>
                </div>
                @endforeach
            </div>

        </div>
    </div>






</x-app-layout>