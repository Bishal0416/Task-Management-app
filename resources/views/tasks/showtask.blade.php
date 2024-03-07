
<x-app-layout>

    <!-- dispaly all details task -->
    <div class="flex flex-col h-screen">
        <div class="sticky top-0 z-50 border-b-2">
            <div class='text-white'>
                <p>ID:</p>{{$task_details->id}}
                <p>User_id how initilize tas:</p>{{$task_details->user_id}}
                <br>
                <p>Catagory:</p>{{$task_details->catagory}}
                <p>Current status:</p>{{$task_details->status}}
                <br>
                <p>Assign to:</p>{{$task_details->assign_to}}
            </div>
            <a href="{{ route('task.edit', ['task_id'=> $task_details->id]) }}"><button type="button" class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 shadow-lg shadow-green-500/50 dark:shadow-lg dark:shadow-green-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">UPDATE</button></a>

            <a href="{{ route('task.delete', ['task_id'=> $task_details->id]) }}"><button type="button" class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 shadow-lg shadow-red-500/50 dark:shadow-lg dark:shadow-red-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">DELETE</button></a>
        </div>





<!-- show commant -->
@auth
        <div class="grow m-2 overflow-y-scroll">
            @foreach($chats as $chat)
            @if(Auth::user()->id == $chat->user_id)
            <div class="flex justify-end">
                <div class="bg-blue-500 text-white rounded-lg p-3 mb-2 max-w-xs">{{$chat->message}}</div>
            </div>
            @else
            <div class="flex justify-start">
                <div class="bg-gray-300 text-gray-700 rounded-lg p-3 mb-2 max-w-xs">{{$chat->message}}</div>
            </div>
            @endif
            @endforeach
        </div>
@endauth
<!-- end shoe commaents -->

<!-- send commant -->
@foreach($assigne as $assign)
    @if(Auth::user()->name == $assign || Auth::user()->role == 'Admin' )
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
</x-app-layout>