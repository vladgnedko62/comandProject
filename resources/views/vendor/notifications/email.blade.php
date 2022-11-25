<table style='width:80%; '>
    <tr>
        <td><a href='#' target='_blank'><img src='https://i.postimg.cc/pdZ5H1cx/logoMail.png' border='0' alt='logoMail' /></a></td>
    </tr>
</table>
<table style='width:80%; '>
    <tr>
        <td>
            <h1 style=''>Verified Your Account</h1>
        </td>
    </tr>
</table>
<table style='width:80%; '>
    <tr>
        <td>
            <x-mail::button :url="$actionUrl" style='text-decoration: none;border: 1px solid black;border-radius: 7px;padding: 10px 30px;    background-color: rgb(56, 202, 56);       font-size: 1.5em; color: white;'>
                {{ $actionText }}
            </x-mail::button>
        </td>
    </tr>
</table>