<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company Create</title>
</head>

<body>
    <h2>New Company Created</h2>
    <p><strong>Name:</strong> {{ $company->name }}</p>
    <p><strong>Email:</strong> {{ $company->email ?? 'N/A' }}</p>
    <p><strong>Website:</strong> {{ $company->website ?? 'N/A' }}</p>

</body>

</html>