@extends('layouts.aside')

@section('content')
<div class="content column is-10">
    <div class="title is-2">Upload Bill</div>
<div class="column">
    <div class="field">
        <label class="label">Useless</label>
        <p class="control has-icons-left has-icons-right">
            <input class="input is-success fc-state-disabled" type="text" placeholder="Text input" value="bulma">
    <span class="icon is-small is-left">
      <i class="fa fa-dollar"></i>
    </span>
    <span class="icon is-small is-right">
      <i class="fa fa-check"></i>
    </span>
        </p>
        <p class="help is-success">This username is available</p>
    </div>
    <div class="columns">
        <div class="field column">
            <label class="label">Bill Date</label>
            <p class="control has-icons-left has-icons-right">
                <input class="input is-success" type="date" placeholder="Text input" value="bulma">
            <span class="icon is-small is-left">
              <i class="fa fa-dollar"></i>
            </span>
            <span class="icon is-small is-right">
              <i class="fa fa-check"></i>
            </span>
            </p>
            <p class="help is-success">This username is available</p>
        </div>
        <div class="field column">
            <label class="label">Due Date</label>
            <p class="control has-icons-left has-icons-right">
                <input class="input is-success" type="date" placeholder="Text input" value="bulma">
            <span class="icon is-small is-left">
              <i class="fa fa-dollar"></i>
            </span>
            <span class="icon is-small is-right">
              <i class="fa fa-check"></i>
            </span>
            </p>
            <p class="help is-success">This username is available</p>
        </div>
    </div>
<div class="columns">
    <div class="field column">
        <label class="label">Amount</label>
        <p class="control has-icons-left has-icons-right">
            <input class="input" type="text" placeholder="Email input" value="123.45">
        <span class="icon is-small is-left">
          <i class="fa fa-dollar"></i>
        </span>
        <span class="icon is-small is-right">
          <i class="fa fa-check"></i>
        </span>
        </p>
    </div>

    <div class="field column">
        <label class="label">Utility</label>
        <p class="control">
        <span class="select">
          <select>
              <option>Select dropdown</option>
              <option>With options</option>
          </select>
        </span>
        </p>
    </div>
</div>

<div class="field">
    <label class="label">Notes</label>
    <p class="control">
        <textarea class="textarea" placeholder="Textarea"></textarea>
    </p>
</div>

<div class="field">
    <p class="control">
        <label class="checkbox">
            <input type="checkbox">
            I agree to the <a href="#">terms and conditions</a>
        </label>
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

@endsection