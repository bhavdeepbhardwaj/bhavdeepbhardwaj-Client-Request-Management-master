<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SRN Information</title>
</head>
<body>

    <p>
        Hi, A new service request has been generated by client. The details of the request are mentioned below:
    </p>

    <p><strong>Brand:</strong> <?php $brands = \App\Models\Brand::where('id', $ticket->brand)->first(); ?>
        {{ $brands->name }}</p>
    <p><strong>Title:</strong> {{ ucfirst($ticket->title) }}</p>
    <p><strong>Category:</strong> <?php $categorys = \App\Models\Category::where('id', $ticket->category)->first(); ?>
        {{ $categorys->name }}</p>
    <p><strong>Summary:</strong> {!! $ticket->summary !!}</p>
    <p><strong>Priority:</strong> <?php $prioritys = \App\Models\Priority::where('id', $ticket->priority)->first(); ?>
        {{ $prioritys->name }}</p>
</body>
</html>
