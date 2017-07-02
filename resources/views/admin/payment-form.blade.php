@extends('layouts.aside')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
    $(document).on('click', '.delete', function() {
        $(this.closest('div')).remove();
    });
</script>

@section('content')

    <div class="content column is-9 form-column">
        <div class="title is-2">Submit Payment</div>
        <div class="column">
            @if ($success == 'True')
                <div class="notification is-primary">
                    <button class="delete"></button>
                    Payment submitted successfully!
                </div>
            @endif
            <form action="add-payment" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="columns">
                    <div class="field column">
                        <label class="label">Payment Date</label>
                        <p class="control has-icons-left has-icons-right">
                            <input name="payment_date" class="input" type="date" placeholder="Text input" value="bill_date">
                    <span class="icon is-small is-left">
                      <i class="fa fa-dollar"></i>
                    </span>
                    <span class="icon is-small is-right">
                      <i class="fa fa-check"></i>
                    </span>
                        </p>
                    </div>
                </div>
                <div class="columns">
                    <div class="field column">
                        <label class="label">Amount</label>
                        <p class="control has-icons-left has-icons-right">
                            <input name="amount" class="input" type="text" placeholder="input" value="123.45">
        <span class="icon is-small is-left">
          <i class="fa fa-dollar"></i>
        </span>
        <span class="icon is-small is-right">
          <i class="fa fa-check"></i>
        </span>
                        </p>
                    </div>

                    <div class="field column is-one-quarter">
                        <label class="label">Utility</label>
                        <p class="control">
        <span class="select">
          <select name="recipient">
              @foreach ($utilities as $util)
                  <option name="recipient" value="{{$util->id}}">{{$util->name}}</option>
              @endforeach
          </select>
        </span>
                        </p>
                    </div>
                    <div class="field column is-one-quarter">
                        <label class="label">Month</label>
                        <p class="control">
        <span class="select">
          <select name="month">
              <option name="month" value="January">January</option>
              <option name="month" value="February">February</option>
              <option name="month" value="March">March</option>
              <option name="month" value="April">April</option>
              <option name="month" value="May">May</option>
              <option name="month" value="June">June</option>
              <option name="month" value="July">July</option>
              <option name="month" value="August">August</option>
              <option name="month" value="September">September</option>
              <option name="month" value="October">October</option>
              <option name="month" value="November">November</option>
              <option name="month" value="December">December</option>
          </select>
        </span>
                        </p>
                    </div>
                </div>

                <div class="field">
                    <label class="label">Notes</label>
                    <p class="control">
                        <textarea value="notes" name="notes" class="textarea" placeholder="Textarea"></textarea>
                    </p>
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