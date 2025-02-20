<!DOCTYPE html>
<html lang="en">

<head>
    <title>Laravel Mongo Roles & Permissions</title>
</head>

<body>
    @if(auth()->user()->hasPermission('view'))
    <p>Has view permission</p>
    @endif

    @if(auth()->user()->hasPermission('create'))
    <p>Has create permission</p>
    @endif

    @if(auth()->user()->hasPermission('edit'))
    <p>Has edit permission</p>
    @endif

    @if(!auth()->user()->hasPermission('creates'))
    <p>Does not has creates permission</p>
    @endif
</body>

</html>
