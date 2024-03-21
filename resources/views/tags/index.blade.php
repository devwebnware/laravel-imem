<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tag List') }}
        </h2>
    </x-slot>

    <section id="table-section">
        <div id="button-div"><a href="{{route('tags.create')}}" type="button" id="add-tags" class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add Tag</a></div>
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 pt-3 pb-3 py-3">
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
                @foreach ($tags as $tag)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                        {{ $tag->name }}
                    </th>
                    <td class="px-6 py-4 text-center">
                        {{ $tag->updated_at }}
                    </td>
                    <td class="px-6 py-4 text-center">
                        {{ $tag->user->name }}
                    </td>
                    <td class="px-6 py-4 text-center">
                        <a style="color: green; font-size: 16px" href="{{ route('tags.edit', ['tag' => $tag->id]) }}">Edit</a>
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

    #add-tags {
        background-color: green !important;
        padding: 10px 15px;
        font-size: 12px;
    }

    #button-div {
        margin-bottom: 20px;
        text-align: end;
    }
</style>