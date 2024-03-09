<x-app-layout>

    <div class="flex flex-row">
        <!-- Component Start -->
        <div class="flex flex-col items-center w-60 text-gray-400 bg-gray-900 min-w-56 ">
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
                    @if(Auth::user()->role == 'Admin')
                    <a class="flex items-center w-full h-12 px-3 mt-2 rounded hover:bg-gray-700 hover:text-gray-300"
                        href="{{ route('category') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 stroke-current" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M7.885 10.23L12 3.463l4.115 6.769zm9.615 11q-1.567 0-2.65-1.08q-1.08-1.083-1.08-2.65t1.08-2.649q1.083-1.082 2.65-1.082t2.65 1.082q1.08 1.082 1.08 2.649t-1.081 2.65q-1.082 1.08-2.649 1.08m-13.73-.5v-6.46h6.46v6.46zm13.73-.5q1.146 0 1.938-.791q.793-.792.793-1.938q0-1.147-.792-1.94q-.792-.792-1.938-.792q-1.147 0-1.94.792q-.792.792-.792 1.938q0 1.147.792 1.94q.792.792 1.938.792m-12.73-.5h4.462v-4.462H4.769zm4.858-10.5h4.746L12 5.427zM17.5 17.5" />
                        </svg>
                        <span class="ml-2 text-sm font-medium">Manage Category</span>
                    </a>
                    @endif
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

        <!-- dispaly all details task -->
        <div class="flex flex-col  w-full border-l-2">
            <div class="border-b-2 p-2 min-h-64">
                <div class="text-gray-200">
                    <h1 class="flex justify-center text-gray-200 text-2xl items-center">#id {{$task_details->id}} TITLE:
                        {{$task_details->title}} </h1>
                    <p class="">Task Creator: {{$task_details->user_id}}</p>
                    <p>Assign to: {{$task_details->assign_to}}</p>
                    <p>Current status: {{$task_details->status}}</p>
                    <p class="">Category: {{$task_details->catagory}}</p>
                    <p>Uploaded docs:</p>
                    @if(is_null($task_details->attach_file))
                    <p>No! file attach with This task</p>
                    @else
                    <a href="{{ route('doc', ['task_id'=>$task_details->id]) }}">
                        <svg class="w-10 h-10 stroke-current" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 9V3.5L18.5 9M6 2c-1.11 0-2 .89-2 2v16a2 2 0 0 0 2 2h12a2
                        2 0 0 0 2-2V8l-6-6z" />
                        </svg>
                    </a>
                    <a href="{{ route('doc-download', ['task_id'=>$task_details->id]) }}">Download</a>
                    @endif
                </div>

                @foreach($assigne as $assign)
                @if(Auth::user()->name == $assign || Auth::user()->role == 'Admin' || Auth::user()->id ==
                $task_details->user_id)
                <a href="{{ route('task.edit', ['task_id'=> $task_details->id]) }}"><button type="button"
                        class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 shadow-lg shadow-green-500/50 dark:shadow-lg dark:shadow-green-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">UPDATE</button></a>
                <a href="{{ route('task.delete', ['task_id'=> $task_details->id]) }}"><button type="button"
                        class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 shadow-lg shadow-red-500/50 dark:shadow-lg dark:shadow-red-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">DELETE</button></a>
                @break
                @endif
                @endforeach
            </div>





            <!-- show commant -->
            @auth
            <div class="m-2 h-96 overflow-y-auto no-scrollbar">
                @foreach($chats as $chat)
                @if(Auth::user()->id == $chat->user_id)
                <div class="flex justify-end">
                    <div class="bg-blue-500 text-white rounded-lg p-3 mb-2 max-w-xs text-wrap">{{$chat->message}}</div>
                </div>
                @else
                <div class="flex justify-start">
                    <div class="bg-gray-300 text-gray-700 rounded-lg p-3 mb-2 max-w-xs text-wrap">{{$chat->message}}</div>
                </div>
                @endif
                @endforeach
            </div>
            @endauth
            <!-- end shoe commaents -->

            <!-- send commant -->
            @foreach($assigne as $assign)
            @if(Auth::user()->name == $assign || Auth::user()->role == 'Admin' || Auth::user()->id ==
            $task_details->user_id)
            <div class="sticky bottom-0 z-50">
                <form action="{{ route('chat.send', ['task_id'=> $task_details->id]) }}">
                    <label for="chat" class="sr-only">Your message</label>
                    <div class="flex items-center px-3 py-2 rounded-lg bg-gray-50 dark:bg-gray-700">
                        <!-- <button type="button" id="emoji-add"
                        class="p-2 text-gray-500 rounded-lg cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13.408 7.5h.01m-6.876 0h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0ZM4.6 11a5.5 5.5 0 0 0 10.81 0H4.6Z" />
                        </svg>
                        <span class="sr-only">Add emoji</span>
                    </button> -->
                        <textarea id="chat" rows="1" name="chat"
                            class="block mx-4 p-2.5 w-full text-sm text-gray-900 bg-white rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Your message..."></textarea>
                        <button type="submit"
                            class="inline-flex justify-center p-2 text-blue-600 rounded-full cursor-pointer hover:bg-blue-100 dark:text-blue-500 dark:hover:bg-gray-600">
                            <svg class="w-5 h-5 rotate-90 rtl:-rotate-90" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                                <path
                                    d="m17.914 18.594-8-18a1 1 0 0 0-1.828 0l-8 18a1 1 0 0 0 1.157 1.376L8 18.281V9a1 1 0 0 1 2 0v9.281l6.758 1.689a1 1 0 0 0 1.156-1.376Z" />
                            </svg>
                            <span class="sr-only">Send message</span>
                        </button>
                    </div>
                </form>
            </div>
            @break
            @endif
            @endforeach
        </div>
    </div>
</x-app-layout>

<style>
    .no-scrollbar{
         /* Hide the scrollbar for WebKit browsers */
    scrollbar-width: none;

    /* Hide the scrollbar for Firefox */
    scrollbar-color: transparent transparent;
}

/* Hide the scrollbar for WebKit browsers */
.no-scrollbar::-webkit-scrollbar {
    display: none;
}

/* Hide the scrollbar for Firefox */
.no-scrollbar::-moz-scrollbar {
    display:none;

    }
</style>