<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Tag') }}
        </h2>
    </x-slot>

    <section id="form-section">
        <form class="max-w-sm mx-auto" method="POST" action="{{ route('listings.update', $listing->id) }}">
            @csrf
            @method('patch')
            <div class="mb-5" style="margin-bottom: 10px;">
                <label for="name" style="margin-bottom: 10px;" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tag Name</label>
                <input type="text" id="name" name='name' value='{{$listing->name}}' class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="Enter category name" required />
            </div>
            <div class="mb-5" style="margin-bottom: 10px;">
                <label for="category" style="margin-bottom: 10px;" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                <select id="category" name='category_id' class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected>Choose a category</option>
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}" @if ($listing->category_id==$category->id) selected @endif>
                        {{ $category->name }}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-5" style="margin-bottom: 10px;">
                <label for="tag" style="margin-bottom: 10px;" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tag</label>
                <select id="tag" name='tag_id' class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected>Choose a tag</option>
                    @foreach ($tags as $tag)
                    <option value="{{ $tag->id }}" @if ($listing->tag_id==$tag->id) selected @endif>{{ $tag->name}} </option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn-my-primary" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update</button>
        </form>
    </section>
</x-app-layout>
<style>
    #form-section {
        width: 50%;
        margin: auto;
        padding-top: 30px;
    }

    .btn-my-primary {
        background-color: green !important;
        padding: 8px;
        border-radius: 20px;
        margin-top: 20px;
        color: white !important;
    }
</style>