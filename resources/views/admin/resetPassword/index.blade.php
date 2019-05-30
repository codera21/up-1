@extends('layouts.backend.default')

@section('page_title')
    {{ trans('Reset Password') }}
@endsection
@section('content')
    <div class="formContainer">
        <h3 class="">Changed Users Password Here</h3>
        <form action="{{route("admin.user.changePassword",["post"=>$id])}}" method="POST" onsubmit="return validate()">
            {{ csrf_field() }}
            <div>
                <div class="">
                    <label for="exampleInputEmail1">User Email</label>
                </div>
                <div class="form-group row">
                    <div class="col-lg-4">
                        <input type="email" class="form-control" name="email" id="exampleInputEmail1"
                               aria-describedby="emailHelp" value="{{$getUser->email}}" readonly="readonly"
                               placeholder="Enter email">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <div class="form-group row">
                    <div class="col-lg-4">
                        <input type="text" class="form-control" name="password" id="password"
                               placeholder="Password">
                    </div>
                </div>
            </div>
            <input type="submit" class="btn btn-success" value="Change Password">
        </form>
        <div class="col-lg-1 generatePassword">
            <button class="btn btn-info btn-xs" onclick="getValue()" role="button">Generate Password</button>
        </div>
        <div class="col-lg-1 copyToClipboard">
            <button onclick="copyText()" type="button" data-toggle="tooltip" data-html="true" title=""
                    class="btn btn-default btn-sm"
                    onclick="myFunction()" data-original-title="copy to clipboard">
                <span class="glyphicon glyphicon-paperclip" aria-hidden="true" style="font-size: 2rem"></span>
            </button>
        </div>

    </div>
@endsection
<style>
    .formContainer {
        padding: 20px;
    }

    .generatePassword {
        margin-top: 10px;
        top: -100px;
        margin-left: 328px;
    }

    .copyToClipboard {
        margin-top: 10px;
        top: -105px;
        margin-left: 27px;
    }
</style>
<script>
    function makeid(length) {
        var result = '';
        var characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        var charactersLength = characters.length;
        for (var i = 0; i < length; i++) {
            result += characters.charAt(Math.floor(Math.random() * charactersLength));
        }
        return result;
    }

    function getValue() {
        document.getElementById("password").value = makeid(8);
    }

    function copyText() {
        var copyText = document.getElementById("password");
        copyText.select();
        document.execCommand("copy");
    }

    function validate() {
        var returnValue = true;
        var password = document.getElementById("password").value;
        console.log(password.length);
        if (password == "") {
            alert("Enter 8 digit password");
            returnValue = false;
        }
        if (password.length < 8) {
            returnValue = false;
        }
        return returnValue;
    }
</script>