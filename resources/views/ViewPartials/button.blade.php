<script
  src="https://code.jquery.com/jquery-3.2.1.slim.js"
  integrity="sha256-tA8y0XqiwnpwmOIl3SGAcFl2RvxHjA8qp0+1uCGmRmg="
  crossorigin="anonymous"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<!-- Button trigger modal -->
       <!-- Button trigger modal -->
       <button style="float: right; margin-top: -25px;" type="button" class="btn btn-secondary" data-toggle="modal" data-target="#exampleModal">
            Add Bill
          </button>
          
          <!-- Modal -->
          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h2 class="modal-title" id="exampleModalLabel">New Bill</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <div class="row">
                      <div class="col-md-12">

                        <form  action="/app/bills" method="POST">
                                <input id="invisible_id" name="type" type="hidden" value="bill">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="columns">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Password</label>
                                            <input name="bill_date" class="form-control" type="text" placeholder="Bill Date">
                                        </div>
                                    <div class="form-group">
                                        <label class="label">Bill Date</label>
                                        <input name="bill_date" class="form-control" type="date" placeholder="Text input" value="bill_date">
                                    </div>
                                    <div class="form-group">
                                        <label class="label">Due Date</label>
                                        <input name="due_date" class="form-control" type="date" placeholder="Text input" value="due_date">
                                    </div>
                                </div>
                            <div class="columns">
                                <div class="form-group">
                                    <label class="label">Amount</label>
                                    <input name="amount" class="form-control" type="text" placeholder="input" value="123.45">
                                </div>
                            
                                <div class="col-md-6 form-group">
                                    <label class="label">Utility</label>
                                    <p class="control">
                                    <span class="select">
                                      <select  class="form-control"name="recipient">
                                          @foreach ($utilities as $util)
                                          <option name="recipient" value="{{$util->id}}">{{$util->name}}</option>
                                          @endforeach
                                      </select>
                                    </span>
                                    </p>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label class="label">Month</label>
                                    <p class="control">
                                    <span class="select">
                                      <select class="form-control" name="month">
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
                            
                            <div class="form-group">
                                <label class="label">Notes</label>
                                <p class="control">
                                    <textarea value="notes" name="notes" class="form-control" placeholder="Textarea"></textarea>
                                </p>
                            </div>
                            
                            
                            <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-secondary" value="Submit">Submit</button>
                                  </div>
                            </form>
                        </div>
                    </div>

                
                </div>
            
              </div>
            </div>
          </div>