@extends('layouts.app')

@section('specials')
<link rel="stylesheet" type="text/css" href="https://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/1.0.7/css/responsive.dataTables.min.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/responsive/1.0.7/js/dataTables.responsive.min.js"></script>
    <script>
        $(document).ready(function(){
            $("#myTable").DataTable({
                "order": [[ 1, "asc" ]],
                responsive: true,
                columnDefs: [
                    { targets: [0, 1, 2, 3, 4, 5, 6], className: 'dt-body-nowrap' },
                    { targets: [-2], className: 'dt-body-right' },
                    { targets: [-4, -3], className: 'dt-body-center' },
                    { "orderable": false, "targets": [0] },
                    { "searchable": false, "targets": [0] }
                ]
            });
        });

        // delete from DB
        function deleteBook(id) {
            console.log('delete');
            if (confirm('Are you sure you want to Delete this book?')) {
                $.ajax({
                    url: '/book/'+id,
                    type: 'DELETE',
                    data: {
                        "_token": "{{ csrf_token() }}"
                    },
                    success: function(response) {
                        console.log(response);
                        location.reload();
                    }
                });
            } else {
                return false;
            }
        }

    </script>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <button type="button" class="btn btn-link pull-right" data-toggle="modal" data-target="#model-new-book">Add a book</button>

        <!-- Modal -->
        <div class="modal fade" id="model-new-book" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">New Book</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form role="form" action="/book" method="post" id="form-new-book">
                            {{ csrf_field() }}
                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <label for="title">Title</label>
                                    <input class="form-control" id="title" name="title" type="text" value="">
                                </div>
                                <div class="col-sm-6">
                                    <label for="isbn">ISBN</label>
                                    <input class="form-control" id="isbn" name="isbn" type="text" value="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <label for="author">Author</label>
                                    <input class="form-control" id="author" name="author" type="text" value="">
                                </div>
                                <div class="col-sm-6">
                                    <label for="price">Price</label>
                                    <input class="form-control" id="price" name="price" type="text" value="">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-10">
                                    <label for="genres">Genres</label>
                                    <select id="genres" multiple size=15 class="form-control" name="genres[]">
                                        @if($genres != null)
                                            @foreach($genres as $g)
                                                <option value="{{ $g['name'] }}">{{ $g['name'] }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label for="description">Description</label>
                                    <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <div class"col-sm-10">
                                        &nbsp;
                                    </div>
                                    <div class"col-sm-2">
                                        <button type="submit" class="btn btn-default" onclick="event.preventDefault(); document.getElementById('form-new-book').submit();">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br />
    <div class="row">
        <table id="myTable" class="display responsive" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th></th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Genres</th>
                    <th>Price</th>
                    <th>ISBN</th>
                    <th>Last Update</th>
                    <th style="min-width:200px">Description</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th></th>
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

                @if($books != null)
                    @foreach ($books as $book)
                        <tr>
                            <td>
                                <button type="button" class="btn btn-link" data-toggle="modal" data-target="#model-{{ $book['id'] }}">
                                    <span class="glyphicon glyphicon-pencil"></span>
                                </button>
                                <button type="button" class="btn btn-link" onclick="deleteBook('{{ $book['id'] }}')">
                                    <span class="glyphicon glyphicon-remove"></span>
                                </button>
                            </td>
                            <td>{{ $book['title'] }}</td>
                            <td>{{ $book['author'] }}</td>
                            <td>{{ $book['genres'] }}</td>
                            <td>{{ $book['price'] }}</td>
                            <td>{{ $book['isbn'] }}</td>
                            <td>{{ $book['updated_at'] }}</td>
                            <td>{{ $book['description'] }}</td>
                        </tr>
                        <!-- Modal -->
                        <div class="modal fade" id="model-{{ $book['id'] }}" role="dialog">
                            <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">{{ $book['title'] }}</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        <form role="form" action="/book" method="post" id="form-{{ $book['id'] }}">
                                            {{ csrf_field() }}
                                            <input name="id" type="hidden" value="{{ $book['id'] }}"/>
                                            <div class="form-group row">
                                                <div class="col-sm-6">
                                                    <label for="title">Title</label>
                                                    <input class="form-control" id="title" name="title" type="text" value="{{ $book['title'] }}">
                                                </div>
                                                <div class="col-sm-6">
                                                    <label for="isbn">ISBN</label>
                                                    <input class="form-control" id="isbn" name="isbn" type="text" value="{{ $book['isbn'] }}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-6">
                                                    <label for="author">Author</label>
                                                    <input class="form-control" id="author" name="author" type="text" value="{{ $book['author'] }}">
                                                </div>
                                                <div class="col-sm-6">
                                                    <label for="price">Price</label>
                                                    <input class="form-control" id="price" name="price" type="text" value="{{ $book['price'] }}">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                @php
                                                    $book['genres'] = empty($book['genres']) ? [] : explode(',', $book['genres']);
                                                @endphp

                                                <div class="col-sm-10">
                                                    <label for="genres">Genres</label>
                                                    <select id="genres" multiple size=15 class="form-control" name="genres[]">
                                                        @if($genres != null)
                                                            @foreach($genres as $g)
                                                                @if( !empty( $book['genres'] ) && in_array($g['name'], $book['genres']) )
                                                                    <option value="{{ $g['name'] }}" selected="selected">{{ $g['name'] }}</option>
                                                                @else
                                                                    <option value="{{ $g['name'] }}">{{ $g['name'] }}</option>
                                                                @endif
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <label for="description">Description</label>
                                                    <textarea class="form-control" id="description" name="description" rows="3">{{ $book['description'] }}</textarea>
                                                </div>
                                            </div>
                                            <hr>

                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <div class"col-sm-10">
                                                        &nbsp;
                                                    </div>
                                                    <div class"col-sm-2">
                                                        <button type="submit" class="btn btn-default" onclick="event.preventDefault(); document.getElementById('form-{{ $book['id'] }}').submit();">Submit</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
</div>
@endsection
