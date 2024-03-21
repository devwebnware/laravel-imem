<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Import Listings') }}
        </h2>
    </x-slot>

    <section id="form-section">
        <form class="max-w-sm mx-auto" method="POST" action="{{ route('listings.data.handel.import') }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-5 form-group" style="margin-bottom: 10px;">
                <label for="name" style="margin-bottom: 10px;">Select file</label>
                <input type="file" id="file" name='data' class="form-control" required />
            </div>
            <button type="submit" class="btn-my-primary" class="btn btn-success">Upload</button>
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