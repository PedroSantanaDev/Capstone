@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-8  col-lg-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading ">Edit Employee</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('employee/update/'.$employee->id) }}">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">First Name</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ $employee->name }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                            <label for="last_name" class="col-md-4 control-label">Last Name</label>

                            <div class="col-md-6">
                                <input id="lastName" type="text" class="form-control" name="last_name" value="{{ $employee->last_name }}" required autofocus>

                                @if ($errors->has('last_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('street') ? ' has-error' : '' }}">
                            <label for="street" class="col-md-4 control-label">Street Address</label>

                            <div class="col-md-6">
                                <input id="street" type="text" class="form-control" name="street" value="{{ $employee->street }}" required autofocus>

                                @if ($errors->has('street'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('street') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                            <label for="city" class="col-md-4 control-label">City</label>

                            <div class="col-md-6">
                                <input id="city" type="text" class="form-control" name="city" value="{{ $employee->city }}" required autofocus>

                                @if ($errors->has('city'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('province') ? ' has-error' : '' }}">
                            <label for="title" class="col-md-4 control-label">Province</label>
                            <div class="col-md-6">
                                <select  class="form-control" name="province" id="province" required autofocus>
                                    <option value="Ontario">Ontario</option>
                                    <option value="Nunavut">Nunavut</option>
                                    <option value="Quebec">Quebec</option>
                                    <option value="Northwest Territories">Northwest Territories</option>
                                    <option value="British Columbia">British Columbia</option>
                                    <option value="Alberta">Alberta</option>
                                    <option value="Saskatchewan">Saskatchewan</option>
                                    <option value="Manitoba">Manitoba</option>
                                    <option value="Yukon">Yukon</option>
                                    <option value="Newfoundland and Labrador">Newfoundland and Labrador</option>
                                    <option value="New Brunswick">New Brunswick</option>
                                    <option value="Nova Scotia">Nova Scotia</option>
                                    <option value="Prince Edward Island">Prince Edward Island</option>
                                </select>

                                @if ($errors->has('province'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('province') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('postal_code') ? ' has-error' : '' }}">
                            <label for="postal_code" class="col-md-4 control-label">Postal Code</label>
                            <div class="col-md-6">
                                <input id="postalCode"  type="text" class="form-control" name="postal_code" value="{{ $employee->postal_code }}" required autofocus>

                                @if ($errors->has('postal_code'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('postal_code') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('home_phone_no') ? ' has-error' : '' }}">
                            <label for="home_phone_no" class="col-md-4 control-label">Home Phone</label>
                            <div class="col-md-6">
                                <input id="home_phone_no" name="home_phone_no" class="form-control" type="tel" value="{{ $employee->home_phone_no }}" required autofocus>

                                @if ($errors->has('home_phone_no'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('home_phone_no') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('cellphone_no') ? ' has-error' : '' }}">
                            <label for="cellphone_no" class="col-md-4 control-label">Cellphone</label>
                            <div class="col-md-6">
                                <input id="cellphone_no" name="cellphone_no"  class="form-control" type="tel" value="{{ $employee->cellphone_no }}"  autofocus>

                                @if ($errors->has('cellphone_no'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('cellphone_no') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('employee_title') ? ' has-error' : '' }}">
                            <label for="employee_title" class="col-md-4 control-label">Title</label>
                            <div class="col-md-6">
                                <select  class="form-control" id="employeeTitle" name="employee_title" value="{{ $employee->title }}" autofocus>
                                    <option value="General Manager">General Manager</option>
                                    <option value="Supervisor">Supervisor</option>
                                    <option value="Financial Control Officer">Financial Control Officer</option>
                                    <option value="President">President</option>
                                    <option value="Secretary">Secretary</option>
                                    <option value="Chief sales officer">Chief sales officer</option>
                                    <option value="Manager">Manager</option>
                                    <option value="Of Counsel">Of Counsel</option>
                                </select>

                                @if ($errors->has('employee_title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('employee_title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                                                                                       
                        <div class="form-group">
                            <div class="col-md-6  col-md-offset-4">
                                <button type="submit" class="btn btn-success">
                                    Save
                                </button>
                                <a href="{{ URL::previous() }}">
                                    <button type="button" class="btn btn-danger">
                                        Cancel
                                    </button>
                                </a>
                            </div>             
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<footer class="footer">
  @include('layouts.footer')
</footer>
@endsection

