<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Order Completed!</title>
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
                Order Completed!
            </h1>
            <div style="text-align: center">
                <span style="font-size: 15px">We Are Happy To Share That Your Order Of ID ({{ $order_id }}) Has Been
                    Delivered.</span>
            </div>
            <div style="text-align: center;margin:3rem;">
                <a href="http://localhost:8000/shop"
                    style="text-decoration:none;background-color:red;color:white;border-radius:8px;padding:1rem;font-size:1rem;font-weight:700">Leave
                    A Feedback</a>
            </div>

            <p style="text-align:center">If you’re having trouble clicking the "Leave A Feedback" button, copy
                and
                paste
                the URL below
                into your web browser:
                <a href="http://localhost:8000/shop" style="color:blue">http://localhost:8000/shop</a>
            </p>



        </div>
    </article>
</body>

</html>
