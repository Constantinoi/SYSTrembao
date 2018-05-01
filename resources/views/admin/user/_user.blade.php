

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="control-label col-md-3 col-sm-3 col-xs-12">Nome</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="name" type="text" class="form-control col-md-7 col-xs-12" name="name" value="{{ isset($user->name) ? $user->name :  old('name')  }}"  autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="control-label col-md-3 col-sm-3 col-xs-12">E-Mail</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="email" type="email" class="form-control col-md-7 col-xs-12" name="email"  value="{{ isset($user->email) ? $user->email : old('email') }}" >

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

 