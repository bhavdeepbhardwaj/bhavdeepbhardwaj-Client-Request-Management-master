<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Comment Ticket</title>
</head>

<body>
    <p>
        {!! $comment->comment !!}
    </p>

    ---
    <p>Replied by: {{ $user->name }}</p>

    <p>Title: {{ $ticket->title }}</p>
    <p>Ticket ID: {{ $ticket->job }}</p>
    <p>Status: <?php $statuss = \App\Models\Status::where('id', $ticket->status)->first(); ?>
        {{ $statuss->name }}</p>

    <p>
        You can view the ticket at any time at {{ route('user.ticket.details_ticket', [$ticket->id]) }}
    </p>

</body>

</html>
