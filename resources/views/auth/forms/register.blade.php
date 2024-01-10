{!! Form::open(array('route'=>'register', 'method'=>'post', 'id'=>'contactForm', 'class'=>'contact-panel__form')) !!}
    <div class="row">
      <div class="col-sm-12">
        <h4 class="contact-panel__title">Sign-up  </h4>
      </div>

      <div class="col-sm-6 col-md-6 col-lg-6">
        <div class="form-group">
          <i class="icon-user form-group-icon"></i>
          {!! Form::text('name_first', null, array('required', 'placeholder'=>'First Name', 'class'=>'form-control', 'id'=>'contact-Fristname')) !!}

          @error('name_first')
            <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>
      </div>
      <div class="col-sm-6 col-md-6 col-lg-6">
        <div class="form-group">
          <i class="icon-user form-group-icon"></i>
          {!! Form::text('name_last', null, array('required', 'placeholder'=>'Last Name', 'class'=>'form-control', 'id'=>'contact-lastname')) !!}

          @error('name_last')
            <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>
      </div>
      <div class="col-sm-6 col-md-6 col-lg-6">
        <div class="form-group">
          <i class="icon-email form-group-icon"></i>
          {!! Form::text('email', null, array('required', 'placeholder'=>'E-mail', 'class'=>'form-control', 'id'=>'contact-email')) !!}

          @error('email')
            <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>
      </div>
      <div class="col-sm-6 col-md-6 col-lg-6">
        <div class="form-group">
          <i class="icon-eye  form-group-icon"></i>
          {!! Form::password('password', ['required', 'class' => 'form-control', 'placeholder' => 'Password', 'id' => 'contact-password']) !!}

          @error('password')
            <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>
      </div>

      <div class="col-12">
        <button type="submit" class="btn btn__secondary btn__rounded btn__block btn__xhight mt-10">
          <span>Sign-up </span> <i class="icon-arrow-right"></i>
        </button>
        <div class="contact-result"></div>
      </div>
    </div>
@include('admin.layouts.forms.close')
