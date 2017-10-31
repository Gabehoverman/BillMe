@extends('layouts.aside')

@section('content')

    <div class="content column is-9 form-column">
        <div class="title is-2">Add New Tenant</div>
        <div class="column">
            @if ($success == 'True')
                <div class="notification is-primary">
                    <button class="delete"></button>
                    New Tenant has been successfully added!
                </div>
            @endif
            <form action="add_tenant" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="columns">
                    <div class="field column">
                        <label class="label">Tenant Name</label>
                        <p class="control has-icons-left has-icons-right">
                            <input name="name" class="input" placeholder="Name" value="">
                        </p>
                    </div>
                </div>
                <div class="columns">
                    <div class="field column">
                        <div class="field column">
                            <label class="label">Move in Date</label>
                            <p class="control has-icons-left has-icons-right">
                                <input name="move_in_date" class="input" type="date" placeholder="Text input" value="due_date">
                                <span class="icon is-small is-left">
                                <i class="fa fa-dollar"></i>
                            </span>
                                <span class="icon is-small is-right">
                                <i class="fa fa-check"></i>
                            </span>
                            </p>
                        </div>
                        <div class="field column">
                            <label class="label">Move in Date</label>
                            <p class="control has-icons-left has-icons-right">
                                <input name="move_out_date" class="input" type="date" placeholder="Text input" value="due_date">
                                <span class="icon is-small is-left">
                                <i class="fa fa-dollar"></i>
                            </span>
                                <span class="icon is-small is-right">
                                <i class="fa fa-check"></i>
                            </span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="field is-grouped">
                    <p class="control">
                        <button class="button is-primary">Submit</button>
                    </p>
                    <p class="control">
                        <button class="button is-link">Cancel</button>
                    </p>
                </div>
            </form>

@endsection