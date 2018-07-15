@extends('layouts.app_noregister')

@section('specials')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/1.0.7/css/responsive.dataTables.min.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/responsive/1.0.7/js/dataTables.responsive.min.js"></script>
    <script>
        $(document).ready(function(){
            $("#myTable").DataTable({
                responsive: true,
                columnDefs: [
                    { targets: [0, 1, 2, 3, 4, 5], className: 'dt-body-nowrap' }
                ]
            });
        });
    </script>
@endsection

@section('content')
<div class="container">
    @if($books != null)
        <table id="myTable" class="display responsive" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Genres</th>
                    <th>Price</th>
                    <th>ISBN</th>
                    <th>Last Update</th>
                    <th>Description</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Genres</th>
                    <th>Price</th>
                    <th>ISBN</th>
                    <th>Last Update</th>
                    <th>Description</th>
                </tr>
            </tfoot>
            <tbody>

                @foreach ($books as $book)
                    <tr>
                        <td>{{ $book['title'] }}</td>
                        <td>{{ $book['author'] }}</td>
                        <td>{{ $book['genres'] }}</td>
                        <td>{{ $book['price'] }}</td>
                        <td>{{ $book['isbn'] }}</td>
                        <td>{{ $book['updated_at'] }}</td>
                        <td>{{ $book['description'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
