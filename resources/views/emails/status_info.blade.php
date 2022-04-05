<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>SRN Status Information</title>
</head>

<body>

    <p>
        Hi, The Request has been closed. Kindly, find the details below:
    <p><strong>Created On:</strong>{{ date('d-m-Y h:i:s A', strtotime($ticket->created_at)) }}</p>
    <p><strong>Brand:</strong> <?php $brands = \App\Models\Brand::where('id', $ticket->brand)->first(); ?>
        {{ $brands->name }}</p>
    <p><strong>Title:</strong> {{ ucfirst($ticket->title) }}</p>
    <p><strong>Category:</strong> <?php $categorys = \App\Models\Category::where('id', $ticket->category)->first(); ?>
        {{ $categorys->name }}</p>
    <p><strong>Summary:</strong> {!! $ticket->summary !!}</p>
    <p><strong>Priority:</strong> <?php $prioritys = \App\Models\Priority::where('id', $ticket->priority)->first(); ?>
        {{ $prioritys->name }}</p>
    <p><strong>Closed On:</strong> {{ date('d-m-Y h:i:s A') }}</p>

    </p>



</body>

</html>
