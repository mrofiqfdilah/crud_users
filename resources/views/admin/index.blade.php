<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>data user</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>

    <div class="container mt-5">
    <a href="{{ route('admin.create') }}" class="btn btn-primary mb-3">Tambah data</a>
    <div class="card">
        <div class="card-body">
            <table class="table">
                <thead>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Tanggal lahir</th>
                    <th>Gender</th>
                    <th>Level</th>
                    <th>Actions</th>
                </thead>
                @foreach ($users as $no => $item)
                    <tbody>
                        <td>{{ $no+1 }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->username }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->tgl_lahir }}</td>
                        <td>{{ $item->gender }}</td>
                        <td>{{ $item->level }}</td>
                        <td>
                            <div class="d-flex justify-content-center"> <!-- Edit button -->
                                <a href="{{ route('admin.edit', $item->id) }}" class="btn btn-primary">Edit</a>
                                <!-- Delete button -->
                                <form action="{{ route('admin.destroy', $item->id) }}" method="post" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" style="margin-left: 5px;">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tbody>
                @endforeach
            </table>
        </div>
    </div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>