@extends('admin.template')

@section('title', 'Add User')

@section('content-users')
    <h1 class="my-4">Add User</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Control panel</a></li>
            <li class="breadcrumb-item "><a href="{{ route('users') }}">Users</a></li>
            <li class="breadcrumb-item active">Create new user</li>
        </ol>
    </nav>
    <form action="{{ route('users.create') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3 p-4">
            <div class="custom-file">
                <div class="form-group col-md-6">

                    <div class="image-preview mb-4" id="img-preview">
                        <img id="photo-preview" src="/images/users/default.jpg" alt="img"
                            style="max-width: 200px; max-height: 200px; display:block;">
                    </div>

                    <div class="custom-file">
                        <input type="file" accept="image/*" class="custom-file-input" name="photo" id="customFile">
                        <label class="custom-file-label" for="customFile"> Choose file</label>
                    </div>
                </div>
            </div>

            <div class="form-row p-3">
                <div class="form-group col-md-3">
                    <label for="name">Name</label>
                    <input name="name" type="text" class="form-control @error('name') is-invalid @enderror"
                        id="name" placeholder="Your name" value="{{ old('name') }}">
                    @error('name')
                        <span class="text-danger small">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group col-md-3">
                    <label for="email">Email</label>
                    <input name="email" type="email" class="form-control @error('email') is-invalid @enderror"
                        id="email" placeholder="Email" value="{{ old('email') }}">
                    @error('email')
                        <span class="text-danger small">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="form-row p-3">
                <div class="form-group col-md-3">
                    <label for="phone">Phone</label>
                    <input name="phone" type="text" class="form-control @error('phone') is-invalid @enderror"
                        id="phone" placeholder="Phone number" value="{{ old('phone') }}">
                    @error('phone')
                        <span class="text-danger small">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group col-md-3">
                    <label for="address">Address</label>
                    <input name="address" type="text" class="form-control @error('address') is-invalid @enderror"
                        id="address" placeholder="Type your address.." value="{{ old('address') }}">
                    @error('address')
                        <span class="text-danger small">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="form-row p-3">
                <div class="form-group col-md-3">
                    <label for="role">Role</label>
                    <select name="role" id="id"
                        class="custom-select @error('role') is-invalid @enderror"value="{{ old('role') }}">
                        <option value="admin">Admin</option>
                        <option selected value="author">Author</option>
                        <option value="editor">Edithor</option>
                    </select>
                    @error('role')
                        <span class="text-danger small">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group col-md-3">
                    <label for="password">Password</label>
                    <input name="password" type="password" class="form-control @error('password') is-invalid @enderror"
                        id="password" placeholder="Password">
                    @error('password')
                        <span class="text-danger small">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group col-md-3">
                    <label for="password_confirmation">Confirm password</label>
                    <input name="password_confirmation" type="password"
                        class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation"
                        placeholder="Confirm your password">
                    @error('password')
                        <span class="text-danger small">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="form-group col-md-2">
                <div class="form-check ml-3 mt-3 p-2 text-info">
                    <input class="form-check-input" type="checkbox" value="1" id="defaultCheck1" name="verified">
                    <label class="form-check-label" for="defaultCheck1">
                        Email verificat
                    </label>
                </div>
            </div>

            <button type="submit" class="btn btn-info float-left ml-3 mb-5">Create user</button>
            <a href="{{ route('users') }}" type="submit" class="btn btn-secondary float-left ml-2">Cancel</a>
        </div>
    </form>
@endsection

@section('customJs')
    <script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.min.js"></script>

    <script>
        $(document).ready(function() {
            bsCustomFileInput.init() //https://www.npmjs.com/package/bs-custom-file-input
        })
    </script>

    <script>
        const chooseFile = document.getElementById("customFile");
        const imgPreview = document.getElementById("img-preview");

        chooseFile.addEventListener("change", function() {
            getImgData();
        });

        function getImgData() { //https://w3collective.com/preview-selected-img-file-input-js/
            const files = chooseFile.files[0];
            if (files) {
                const fileReader = new FileReader();
                fileReader.readAsDataURL(files);
                fileReader.addEventListener("load", function() {
                    imgPreview.style.display = "block";
                    imgPreview.innerHTML = '<img src="' + this.result +
                        '" style="max-width: 200px; max-height: 200px; display:block; border-radius: 50%;" class="photo-preview" />';
                });
            }
        }
    </script>
@endsection
