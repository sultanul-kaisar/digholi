@component('mail::message')
    <h1 style="text-align:center;">New Contact Email</h1>

    <h3>Contact person:</h3>

    <div class="contact-details">

    </div>
    <table border="1px solid #718096" style="width:100%!important;">
        <tr>
            <th style="text-align: left;">Name:</th>
            <td>{{ $data['name']}}</td>
        </tr>
        <tr>
            <th style="text-align: left;">Subject:</th>
            <td>{{ $data['subject']}}</td>
        </tr>
        <tr>
            <th style="text-align: left;">Email:</th>
            <td>
                <a href="mailto:{{ $data['email']}}">{{ $data['email']}}</a>
            </td>
        </tr>
    </table>

    <h3 style="margin-top:10px!important;">Message:</h3>
    <p style="text-align:justify;">
        {{ $data['message']}}
    </p>

    Thanks,<br>
    {{ $data['name']}}
@endcomponent
