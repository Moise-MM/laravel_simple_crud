<x-app-layout>

    <div class="d-flex justify-content-center row">
        <div class="col-7">
            <h1 class="h3 mt-3 text-center">Edit customer</h1>
            <hr>

            @include('shared._flash')

            <form action="{{ route('customer.update', ['customer' => $customer]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                @include('customer.partials._form')

                <button class="btn btn-primary btn-sm" type="submit">Edit</button>

            </form>
        </div>
    </div>


</x-app-layout>