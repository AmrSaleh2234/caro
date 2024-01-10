{!! Form::open(array('route' => 'login', 'method' => 'post', 'id' => 'contactForm', 'class' => 'contact-panel__form')) !!}
    <div class="row">
      <div class="col-sm-12">
        <h4 class="contact-panel__title">Sign-in  </h4>

      </div>

      <div class="col-sm-12 col-md-12 col-lg-12">
        <div class="form-group">
          <i class="icon-user form-group-icon"></i>
          {!! Form::text('email', null, array('required', 'placeholder'=>'E-mail', 'class'=>'form-control', 'id'=>'contact-email')) !!}

          @error('email')
            <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>
      </div>
      <div class="col-sm-12 col-md-12 col-lg-12">
        <div class="form-group">
          <i class="icon-eye  form-group-icon"></i>
          {!! Form::password('password', ['required', 'class' => 'form-control', 'placeholder' => 'Password', 'id' => 'contact-password']) !!}

          @error('password')
            <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>
      </div><!-- /.col-lg-12 -->

      <div class="col-12">
        <button type="submit" class="btn btn__secondary btn__rounded btn__block btn__xhight mt-10">
          <span>Sign-in </span> <i class="icon-arrow-right"></i>
        </button>
        <div class="contact-result"></div>
      </div><!-- /.col-lg-12 -->
    </div><!-- /.row -->
@include('admin.layouts.forms.close')
