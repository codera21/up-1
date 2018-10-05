@extends('emails.template')

@section('content')

<table border="0" cellspacing="0" cellpadding="0" width="100%" background="#fff" style="font-family: 'Trebuchet MS', Verdana, Arial; color: #000; font-size: 12px"">
    <tbody>
            
            <tr>
                <td align="center">
                    <table border="0" cellspacing="0" cellpadding="0" width="700">
                        <tr>
                            <td align="left" valign="top" width="300" style="border-right: 1px solid gray; padding: 0 20px 0 0;">
                                <h3>Welcome!</h3>
                                <p>Your account has been set-up and is now active.</p>
                                <p>Best regards,</p>
                            </td>
                            <td align="left" valign="top" width="300" style="padding: 0 0 0 20px;">
                                <h3>Bookmark Our Site:</h3>
                                <p>To help ensure that you receive all Email messages consistently in your inbox, please add this Email address to your address book or contacts list:</p>
                                <ul>
                                    <li><a href="{{ url('/')}}">{{ config('settings.sitename') }}</a></li>                            
                                    <li><a href="">Help & Support Desk</a></li>
                                    <li><a href="">Frequent Ask Questions</a></li>
                                </ul>
                                
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>            
    </tbody>
</table>


@endsection
