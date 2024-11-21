<x-app-layout>

    <h1 class="h3 mt-3">Customer list</h1>
    <hr>
    <div class="d-flex justify-content-end">
        <a href="{{ route('customer.create') }}" class="btn btn-primary btn-sm">Add new customer</a>
    </div>
    <hr>
    <table class="table">
        <thead>
          <tr>
            <th>#</th>
            <th>Image</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody class="table-group-divider">
          @foreach ($customers as $customer )
              <tr>
                <td>{{ $loop->index + 1 }}</td>
                <td><img src="{{ $customer->image ? asset('storage/' . $customer->image) : asset('assets/img/default.png') }}" width="50" height="50" class="img-thumbnail rounded-circle"></td>
                <td>{{ $customer->first_name }} {{ $customer->last_name }}</td>
                <td>{{ $customer->email }}</td>
                <td>{{ $customer->phone }}</td>
                <td class="d-flex">
                    <a href="{{ route('customer.edit', ['customer' => $customer]) }}" class="text-success me-2"><i class="bi bi-pencil-square"></i></a>
                    <form action="{{ route('customer.destroy', ['customer' => $customer]) }}" method="POST"
                            onsubmit="confirm('Are you sure you want to delete this customer ?')">
                        @csrf
                        @method("DELETE")
                        <button style="background-color:transparent" class=" border-0 shadow-none text-danger"><i class="bi bi-trash"></i></button>
                    </form>
                </td>
              </tr>
          @endforeach
        </tbody>
      </table>
      <div class="d-flex justify-content-end">
        {{ $customers->links() }}
      </div>

</x-app-layout>