<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Order Placed!</title>
</head>


<body>
    <article
        style="background: white;
    border-radius: 8px;
    margin: 4rem 2rem;
    padding: 3rem;
    border:1px solid lightgray;
    ">
        <div
            style="background:whitesmoke;border-radius:8px;display: flex;flex-direction:column:gap:3rem;align-items:center;justify-content:center;padding:4rem 0;">
            <h1 style="text-align:center">
                Thank You For Shopping At Genius Cart
            </h1>
            <div style="text-align: center">
                <span style="font-size: 15px">We Are Happy To Share That Your Order Has Been Placed! Your Order ID Is
                    {{ $order_id }}</span>
            </div>
            @if ($receipt_url)
                <div style="text-align: center;margin:3rem;">
                    <a href="{{ $receipt_url }}"
                        style="text-decoration:none;background-color:red;color:white;border-radius:8px;padding:1rem;font-size:1rem;font-weight:700">View
                        Invoice</a>
                </div>

                <p style="text-align:center">If you’re having trouble clicking the "View Invoice" button, copy
                    and
                    paste
                    the URL below
                    into your web browser:
                    <a href="{{ $receipt_url }}" style="color:blue">{{ $receipt_url }}</a>
                </p>
            @endif


        </div>
    </article>
</body>

</html>
