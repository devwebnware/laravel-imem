<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Listings') }}
        </h2>
    </x-slot>

    <section id="table-section">
        <div id="button-div">
            <a href="{{route('listings.data.import')}}" data-toggle="modal" data-target="#exampleModalCenter" style="background-color: teal !important;" type="button" class="add-tags">Import</a>&nbsp;
            <a href="{{route('listings.data.export')}}" style="background-color: purple !important;" class="add-tags">Export</a>&nbsp;
            <a href="{{route('listings.create')}}" style="background-color: green;" type="button" class="add-tags">Add Item</a>
        </div>
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 pt-3 pb-3 py-3">
                        Item Name
                    </th>
                    <th scope="col" class="px-6 pt-3 pb-3  py-3">
                        Category Name
                    </th>
                    <th scope="col" class="px-6 pt-3 pb-3  py-3">
                        Tag Name
                    </th>
                    <th scope="col" class="px-6 pt-3 pb-3  py-3">
                        Date
                    </th>
                    <th scope="col" class="px-6 pt-3 pb-3 py-3">
                        Created By
                    </th>
                    <th scope="col" class="px-6 pt-3 pb-3 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($listings as $item)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                        {{ $item->name }}
                    </td>
                    <td class="px-6 py-4 text-center">
                        {{ $item->category->name }}
                    </td>
                    <td class="px-6 py-4 text-center">
                        {{ $item->tag->name }}
                    </td>
                    <td class="px-6 py-4 text-center">
                        {{ $item->updated_at }}
                    </td>
                    <td class="px-6 py-4 text-center">
                        {{ $item->user->name }}
                    </td>
                    <td class="px-6 py-4 text-center">
                        <a style="color: red" onclick="deleteRequest('{{$item->name}}','{{$item->id}}')">Delete</a> &nbsp;
                        <a style="color: green; font-size: 16px" href="{{ route('listings.edit', ['listing' => $item->id]) }}">Edit</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </section>
</x-app-layout>
<style>
    #table-section {
        margin: auto;
        width: 50%;
        padding-top: 30px;
    }

    .add-tags {
        padding: 10px 15px;
        font-size: 12px;
        border-radius: 15px;
        color: white;
    }

    #button-div {
        margin-bottom: 20px;
        text-align: end;
    }
</style>
<form action="" method="post" id="delete_form">
    @method('delete')
    @csrf
</form>
<script>
    function deleteRequest(name, id) {
        event.preventDefault();
        if (confirm('Do you really want to delete ' + name + " category ?")) {
            $('#delete_form').attr('action', `/listings/${id}`);
            $('#delete_form').submit();
        }
    }
</script>