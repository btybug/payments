{!! Form::open(['url'=>url('login')]) !!}
{!! Form::hidden('redirect_to','/check-out') !!}
<fieldset>
    <h2>Please Login</h2>
    <hr class="colorgraph">
    <div class="form-group">
        <input type="text" name="usernameOremail" id="email" class="form-control input-lg"
               placeholder="Username or Email">
    </div>
    <div class="form-group">
        <input type="password" name="password" id="password" class="form-control input-lg" placeholder="Password"
               value="">
    </div>

    <div class="checkbox">
        <label>
            <input name="remember" type="checkbox" value="Remember Me"> Remember Me
        </label>
        <a href="http://albumbugs.dev/forgot" class="btn btn-link pull-right">Forgot Password?</a>
    </div>
    <hr class="colorgraph">
</fieldset>
<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    <input type="submit" class="btn btn-success" value="Login">
</div>
{!! Form::close() !!}