<x-app-layout>
    <form action="{{ route('category.demo') }}" method="POST">
        @csrf
        <input type="text" name="cate">
        <button>
            add
        </button>
    </form>
    @foreach($all as $category)
    <div>
        <p>{{ $category->catagory_name }}</p>
        <a href="{{ route('category.delete', ['id'=>$category->id]) }}">
        <button>delete</button>
        </a>
    </div>
    @endforeach
</x-app-layout>
