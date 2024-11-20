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
                <td>{{ $customer->first_name }} {{ $customer->last_name }}</td>
                <td>{{ $customer->email }}</td>
                <td>{{ $customer->phone }}</td>
                <td class="d-flex">
                    <a href="" class="text-success me-2"><i class="bi bi-pencil-square"></i></a>
                    <form action="" >
                        <button style="background-color:transparent" class=" border-0 shadow-none text-danger"><i class="bi bi-trash"></i></button>
                    </form>
                </td>
              </tr>
          @endforeach
        </tbody>
      </table>

</x-app-layout>