<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Add Item') }}
        </h2>
    </x-slot>

    <section id="form-section">
        <form class="max-w-sm mx-auto" method="POST" action="{{ route('listings.store') }}">
            @csrf
            <div class="mb-5 form-group" style="margin-bottom: 10px;">
                <label for="name" style="margin-bottom: 10px;">Item Name</label>
                <input type="text" id="name" name='name' class="form-control" placeholder="Enter listing name" required />
            </div>
            <div class="mb-5" style="margin-bottom: 10px;">
                <label for="category" style="margin-bottom: 10px;">Category</label>
                <select id="category" name='category_id' class="form-control" >
                    <option selected>Choose a category</option>
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name}} </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-5" style="margin-bottom: 10px;">
                <label for="tag">Tag</label>
                <select id="tag" name='tag_id' class="form-control">
                    <option selected>Choose a tag</option>
                    @foreach ($tags as $tag)
                    <option value="{{ $tag->id }}">{{ $tag->name}} </option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn-my-primary" class="btn btn-success">Add Listing</button>
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
        padding: 10px 20px;
        border-radius: 20px;
        margin-top: 20px;
        font-size: 14px;
        color: white !important;
    }
</style>