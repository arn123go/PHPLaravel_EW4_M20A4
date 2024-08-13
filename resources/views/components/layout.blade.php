<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://matcha.mizu.sh/matcha.css">
    <title>Document</title>
<style>
    a:hover {
        text-decoration:none;
    }
    .flex-container {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    .contact-card, .contact-card-mini {
        border: 1px solid rgba(192,192,192,0.3);
        border-radius: 10px;
        padding:10px;
    }
    .contact-card-mini:hover {
        border: 1px solid rgba(192,192,192,1);
    }

    .datetime-mini {
        font-size: 75%;
    }
    #deleteButton {
        border: 1px solid rgba(255,0,0, 0.3);
        color: red;
    }
    #deleteButton:hover {
        background-color: rgba(255,0,0, 0.5);
        color:white;
    }
    button.selected{
        border: 2px solid rgba(0,0,255, 0.5);
    }

</style>
</head>

<body>

    <h1>Contact Management Application</h1>

    <div>
        {{ $slot }}
    </div>

</body>
</html>
