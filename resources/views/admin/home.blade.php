@extends('layouts.app')

@section('content')
<div class="col-md-4 py-5">
    @include('elements.new-entry')
</div>
<div class="col-md-8 py-5">
    <div class="card shadow-sm">
        <div class="card-header bg-info py-4">{{ __('Entries') }}</div>
        <div class="card-body py-0 px-0">
            <div class="table-responsive">
                @if ($entries->count() > 0)
                <table class="table table-bordered">
                    <thead>
                        <tr class="table-active">
                            <th>Name</th>
                            <th>Surname</th>
                            <th>Id number</th>
                            <th>Email</th>
                            <th>Phone number</th>
                            <th>Language</th>
                            <th>Date of birth</th>
                            <th>Interests</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($entries as $entry)
                        <tr>
                            <td> {{ $entry->name }} </td>
                            <td> {{ $entry->surname }} </td>
                            <td> {{ $entry->id_number }} </td>
                            <td> {{ $entry->email_address }} </td>
                            <td> {{ $entry->mobile_number }} </td>
                            <td> {{ $entry->language }} </td>
                            <td> {{ $entry->date_of_birth }} </td>
                            <td>
                                @if (empty($entry->interests) === false)
                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#entry-interests-{{ $entry->uuid }}">
                                    View interests
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="entry-interests-{{ $entry->uuid }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">{{ $entry->name }} {{ $entry->surname }} 's Interests</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <ul>
                                                    @foreach (json_decode($entry->interests) as $hobby )
                                                    <li> {{ $hobby }} </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin-home', ['id' => $entry->uuid])}}" class="btn btn-sm btn-info">Edit</a>
                                <a href="{{ route('delete-entry', ['id' => $entry->uuid]) }}" class="btn btn-sm delete btn-danger">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="text-center">
                    {{ $entries->appends($_GET)->links()}}
                </div>
                @else
                <h5 class="alert alert-info text-center"> No data</h5>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
