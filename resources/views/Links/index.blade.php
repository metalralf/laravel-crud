@extends('Layouts.App')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Laravel 8 CRUD Example </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('links.create') }}" title="Create a link"> <i class="fas fa-plus-circle"></i>
                </a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered table-responsive-lg">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>URL</th>
            <th>description</th>
            <th>Date Created</th>
            <th>Actions</th>
        </tr>
        @foreach ($links as $link)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $link->name }}</td>
                <td>{{ $link->url }}</td>
                <td>{{ $link->description }}</td>
                <td>{{ date_format($link->created_at, 'jS M Y') }}</td>
                <td>
                    <form action="{{ route('links.destroy', $link->id) }}" method="POST">

                        <a href="{{ route('links.show', $link->id) }}" title="show">
                            <i class="fas fa-eye text-success fa-lg"></i>
                        </a>

                        <a href="{{ route('links.edit', $link->id) }}">
                            <i class="fas fa-edit fa-lg"></i>
                        </a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" title="delete" style="border: none; background-color:transparent;">
                            <i class="fas fa-trash fa-lg text-danger"></i>
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {!! $links->links() !!}

@endsection
