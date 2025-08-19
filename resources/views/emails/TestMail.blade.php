@component('mail::message')
# Order Shipped

Your order has been shipped!

@component('mail::button', ['url' => '','color' => 'success'])
View Order
@endcomponent
@component('mail::table')
| Laravel       | Table         | Example  |
| ------------- |:-------------:| --------:|
| Col 4 is      | Centered      | $10      |
| Col 3 is      | Right-Aligned | $20      |
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent