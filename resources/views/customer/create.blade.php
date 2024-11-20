<x-app-layout>

    <div class="d-flex justify-content-center row">
        <div class="col-7">
            <h1 class="h3 mt-3 text-center">New customer</h1>
            <hr>

            @include('shared._flash')

            <form action="{{ route('customer.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @include('customer.partials._form')

                <button class="btn btn-primary btn-sm" type="submit">Add</button>

            </form>
        </div>
    </div>


</x-app-layout>