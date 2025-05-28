@csrf
@if ($errors->any())
<div class="alert alert-danger">
    <strong>There were some errors with your input.</strong>
    <ul class="mb-0">
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="form-group">
    <label>Name</label>
    <input type="text" name="name" value="{{ old('name', $company->name ?? '') }}" class="form-control" required>
</div>
<div class="form-group">
    <label>Email</label>
    <input type="email" name="email" value="{{ old('email', $company->email ?? '') }}" class="form-control">
</div>
<div class="form-group">
    <label>Website</label>
    <input type="text" name="website" value="{{ old('website', $company->website ?? '') }}" class="form-control">
</div>
<div class="form-group">
    <label>Logo</label>
    <input type="file" name="logo" class="form-control-file">
</div>
<button class="btn btn-success">{{ $button ?? 'Submit' }}</button>