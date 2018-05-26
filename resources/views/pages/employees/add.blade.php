@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-8  col-lg-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading ">Add Employee</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('add_employee/save') }}">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">First Name</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}"autofocus>

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
                                <input id="lastName" type="text" class="form-control" name="last_name" value="{{ old('last_name') }}" autofocus>

                                @if ($errors->has('last_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('birthdate') ? ' has-error' : '' }}">
                            <label for="birthdate" class="col-md-4 control-label">Birthdate</label>
                            <div class="col-md-6">
                                <div class='input-group date' data-provide="datepicker">
                                    <input id="birthdate" name="birthdate" class="datepicker form-control"  value="{{ old('hire_date') }}" autofocus>
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                                @if ($errors->has('birthdate'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('birthdate') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('street') ? ' has-error' : '' }}">
                            <label for="street" class="col-md-4 control-label">Street Address</label>

                            <div class="col-md-6">
                                <input id="street" type="text" class="form-control" name="street" value="{{ old('street') }}" autofocus>

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
                                <input id="city" type="text" class="form-control" name="city" value="{{ old('city') }}" autofocus>

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
                                <select  class="form-control" name="province" id="employeeTitle" autofocus>
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
                                <input id="postalCode"  type="text" class="form-control" name="postal_code" value="{{ old('postal_code') }}" autofocus>

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
                                <input id="home_phone_no" name="home_phone_no" class="form-control" type="tel" value="{{ old('home_phone_no') }}" autofocus>

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
                                <input id="cellphone_no" name="cellphone_no"  class="form-control" type="tel" value="{{ old('cellphone_no') }}"  autofocus>

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
                                <select  class="form-control" id="employeeTitle" name="employee_title" value="{{ old('employee_title') }}" autofocus>
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

                        <div class="form-group{{ $errors->has('hire_date') ? ' has-error' : '' }}">
                            <label for="hire_date" class="col-md-4 control-label">Hire date</label>

                            <div class="col-md-6">
                                <div class='input-group date' id='datetimepicker1'>
                                    <input id="hire_date"name="hire_date" class="datepicker form-control"  value="{{ old('hire_date') }}" autofocus>
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                                @if ($errors->has('hire_date'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('hire_date') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('security_question') ? ' has-error' : '' }}">
                            <label for="security_question" class="col-md-4 control-label">Security Question</label>

                            <div class="col-md-6">
                                <select  class="form-control" id="selectSecurityQuestion" name="security_question"  value="{{ old('security_question') }}" autofocus>
                                    <option value="What is the last name of the teacher who gave you your first failing grade?">What is the last name of the teacher who gave you your first failing grade?</option>
                                    <option value="What was the name of your elementary / primary school?">What was the name of your elementary / primary school?</option>
                                    <option value="In what city or town does your nearest sibling live?">In what city or town does your nearest sibling live?</option>
                                    <option value="What is the name of the street where you grew up?">What is the name of the street where you grew up?</option>
                                    <option value="In which city were you born?">In which city were you born?</option>
                                    <option value="What was your favorite place to visit as a child?">What was your favorite place to visit as a child?</option>
                                </select>

                                @if ($errors->has('security_question'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('security_question') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('security_question_answer') ? ' has-error' : '' }}">
                            <label for="security_question_answer" class="col-md-4 control-label">Security Question Answer</label>

                            <div class="col-md-6">
                                <input id="securityQuestionAnswer" type="text" class="form-control" name="security_question_answer" value="{{ old('security_question_answer') }}" autofocus>

                                @if ($errors->has('security_question_answer'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('security_question_answer') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" >

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('user_name') ? ' has-error' : '' }}">
                            <label for="user_name" class="col-md-4 control-label">User Name</label>

                            <div class="col-md-6">
                                <input id="userName" type="text" class="form-control" name="user_name" value="{{ old('user_name') }}" autofocus>

                                @if ($errors->has('user_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('user_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('user_role') ? ' has-error' : '' }}">
                            <label for="user_role" class="col-md-4 control-label">User Role</label>

                            <div class="col-md-6">
                                <select  class="form-control" id="userRole" name="user_role" value="{{ old('user_role') }}" autofocus>
                                    <option value="1">Admin</option>
                                    <option value="0">User</option>
                                </select>

                                @if ($errors->has('user_role'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('user_role') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation">

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
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

