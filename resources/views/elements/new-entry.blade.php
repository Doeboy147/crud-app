<div class="card shadow-sm">
    <div class="card-header bg-info py-4">
        @if (empty($entry)) {{ __('Add new entry') }} @else {{ __('Edit Entry')}} @endif
    </div>
    <div class="card-body py-0 px-1">
        <form class="async" action="@if (empty($entry)){{ route('add-entry') }} @else {{ route('update-entry', ['id' => $entry->uuid]) }} @endif" method="POST">
            @csrf
            <div class="form-group row">
                <div class="col-md-6">
                    <label for="name"> First name</label>
                    <input id="name" @if (!empty($entry)) value="{{ $entry->name }}" @endif name="name" class="form-control">
                </div>
                <div class="col-md-6">
                    <label for="surname"> Last name</label>
                    <input id="surname" @if (!empty($entry)) value="{{ $entry->surname }}" @endif name="surname" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-12">
                    <label for="email"> Email Address</label>
                    <input id="email" @if (!empty($entry)) value="{{ $entry->email_address }}" @endif name="email_address" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-12">
                    <label for="mobile_number"> Mobile number</label>
                    <input id="mobile_number" @if (!empty($entry)) value="{{ $entry->mobile_number }}" @endif name="mobile_number" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-12">
                    <label for="id_number"> ID number</label>
                    <input id="id_number" @if (!empty($entry)) value="{{ $entry->id_number }}" @endif name="id_number" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-6">
                    <label for="dob"> Date of birth</label>
                    <input type="date" id="dob" @if (!empty($entry)) value="{{ $entry->date_of_birth }}" @endif name="date_of_birth" class="form-control">
                </div>
                <div class="col-md-6">
                    <label for="language"> Language</label>
                    <select id="language" name="language" class="form-control">
                        @foreach ($languages as $key => $language)
                        <option @if (!empty($entry) && $entry->language === $key) selected @endif value="{{ $key }}"> {{ $language }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-12">
                    <label for="interests">Interests <small class="text-muted"> hold CTRL to select multiple</small></label>
                    <select class="form-control" multiple name="hobbies[]">
                        @foreach ($interests as $key => $hobby)
                        <option value="{{ $key }}"> {{ $hobby }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-6">
                    <a href="{{ route('admin-home') }}" class="btn btn-danger btn-lg btn-block shadow-sm">Reset</a>
                </div>
                <div class="col-md-6">
                    <button type="submit" class="btn btn-info btn-lg btn-block shadow-sm">Add</button>
                </div>
            </div>
        </form>
    </div>
</div>
