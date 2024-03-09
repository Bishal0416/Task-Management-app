<x-app-layout>

    
    <div class="mx-10 px-10">
        <form action="{{ route('category.demo') }}" method="POST">
            @csrf
            <div class="p-4 bg-gray-500 rounded-lg mt-5 flex gap-4">
                <input type="text" name="cate" class=" bg-gray-900 w-full p-2 border border-gray-400 rounded-lg "
                    placeholder="Add Category">
                <button class="px-10 bg-blue-500 text-white rounded-lg hover:bg-blue-700">Add</button>
            </div>
        </form>
        <div class="border-white">
            @foreach($all as $category)
            <div class="p-4 mt-4 bg-gray-500 rounded-lg flex justify-between">
                <p class="text-lg font-semibold">{{ $category->catagory_name }}</p>
                <a href="{{ route('category.delete', ['id'=>$category->id]) }}" class=" inline-block">
                    <button class="p-2 bg-red-500 text-white rounded-lg hover:bg-red-700">Delete</button>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</x-app-layout>