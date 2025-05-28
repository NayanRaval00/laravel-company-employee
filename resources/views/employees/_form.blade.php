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
    <label>First Name</label>
    <input type="text" name="first_name" value="{{ old('first_name', $employee->first_name ?? '') }}" class="form-control" required>
</div>
<div class="form-group">
    <label>Last Name</label>
    <input type="text" name="last_name" value="{{ old('last_name', $employee->last_name ?? '') }}" class="form-control" required>
</div>
<div class="form-group">
    <label>Company</label>
    <select name="company_id" class="form-control" required>
        <option value="">Select a company</option>
        @foreach($companies as $company)
        <option value="{{ $company->id }}" {{ old('company_id', $employee->company_id ?? '') == $company->id ? 'selected' : '' }}>
            {{ $company->name }}
        </option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <label>Email</label>
    <input type="email" name="email" value="{{ old('email', $employee->email ?? '') }}" class="form-control">
</div>
<div class="form-group">
    <label>Phone</label>
    <input type="text" name="phone" value="{{ old('phone', $employee->phone ?? '') }}" class="form-control">
</div>
<button class="btn btn-success">{{ $button ?? 'Save' }}</button>