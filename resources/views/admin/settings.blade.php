@extends('layouts.aside')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
    $(document).on('click', '.delete',function() {
        $(this.closest('div')).remove();
    });
</script>

@section('content')
<div class="content">
    <h1>Settings</h1>
    @if ($success == true)
        <div class="notification is-primary">
            <button class="delete"></button>
            Information Updated Successfully
        </div>
    @else
    @endif
<div class="tile column is-ancestor settings-col">
    <div class="tile is-parent">
        <div class="tile is-child is-12 box">
            <p class="title">Account Information</p>
            <form action="settings" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="action" value="1">
                <div class="field">
                    <label class="label">Email</label>
                    <p class="control has-icons-left has-icons-right">
                        <input class="input" type="text" name="email" placeholder="Email address" value="{{$user->email}}">
                    <span class="icon is-small is-left">
                        <i class="fa fa-envelope"></i>
                    </span>
                </div>
                <div class="field">
                    <label class="label">Password</label>
                    <p class="control has-icons-left has-icons-right">
                        <input class="input" type="text" name="password" placeholder="New Password" value="">
                        <span class="icon is-small is-left">
                            <i class="fa fa-user"></i>
                        </span>
                    </p>
                </div>
                <button class="button" type="submit">Update Information</button>
            </form>
        </div>
    </div>
    <div class="tile is-parent">
        <div class="tile is-child box">
            <p class="title">Tenant Information</p>
            <form action="settings" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="action" value="2">
                <div class="field">
                    <label class="label">Expected Move Out Date</label>
                    <p class="control has-icons-left has-icons-right">
                        <input name="move_out_date" class="input" type="date" placeholder="Date" value="{{$tenant->move_out_date}}">
                    <span class="icon is-small is-left">
                        <i class="fa fa-home"></i>
                    </span>
                </div>
                <button class="button" type="submit">Update Information</button>
            </form>
         </div>
    </div>
</div>
</div>

@endsection