@extends('layout.master')

@section('body-class', 'page-login')

@push('header')
  <script src="{{ asset('vendor/vue/2.7/vue' . (!config('app.debug') ? '.min' : '') . '.js') }}"></script>
  <script src="{{ asset('vendor/element-ui/index.js') }}"></script>
  <link rel="stylesheet" href="{{ asset('vendor/element-ui/index.css') }}">
@endpush


@section('content')


  <div  id="page-login" style="background-image: url(&quot;https://amymhaddad.s3.amazonaws.com/morocco-blue.png&quot;);" v-cloak>
    
    <div class="login-wrap" style="padding-top: 111px;padding-bottom: 49px;">
      <div class="card" style="border-radius: 10px;">
        <div class="login-item-header card-header" style="border-radius: 10px;">
          <h6 class="text-uppercase mb-0">Join the crew!</h6>
        </div>
        <div class="card-body px-md-5">
            <el-form ref="registerForm" :model="registerForm" :rules="registeRules" style="padding-top: 36px;">
              @hookwrapper('account.login.new.email')
              <el-form-item label="{{ __('shop/login.email') }}" prop="email">
                <el-input @keyup.enter.native="checkedBtnLogin('registerForm')" v-model="registerForm.email" placeholder="{{ __('shop/login.email_address') }}"></el-input>
              </el-form-item>
              @endhookwrapper

              @hookwrapper('account.login.new.password')
              <el-form-item label="{{ __('shop/login.password') }}" prop="password">
                <el-input @keyup.enter.native="checkedBtnLogin('registerForm')" type="password" v-model="registerForm.password" placeholder="{{ __('shop/login.password') }}"></el-input>
              </el-form-item>
              @endhookwrapper

              @hookwrapper('account.login.new.confirm_password')
              <el-form-item label="{{ __('shop/login.confirm_password') }}" prop="password_confirmation">
                <el-input @keyup.enter.native="checkedBtnLogin('registerForm')" type="password" v-model="registerForm.password_confirmation" placeholder="{{ __('shop/login.confirm_password') }}"></el-input>
              </el-form-item>
              @endhookwrapper

              @hook('account.login.new.confirm_password.bottom')

              <div class="mt-5 mb-3">
                <button type="button" @click="checkedBtnLogin('registerForm')" class="btn btn-dark btn-lg w-100 fw-bold"><i class="bi bi-person"></i> {{ __('shop/login.register') }}</button>
              </div>
              <a class="text-muted forgotten-link" href="{{ shop_route('register.index') }}"><i class="bi bi-question-circle"></i>Already have an account? Sign in</a>
            </el-form>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('add-scripts')
  <script>


    var validatePass2 = (rule, value, callback) => {
      if (value === '') {
        callback(new Error('{{ __('shop/login.please_confirm') }}'));
      } else if (value !== app.registerForm.password) {
        callback(new Error('{{ __('shop/login.password_err') }}'));
      } else {
        callback();
      }
    };

    let app = new Vue({
      el: '#page-login',

      data: {


        registerForm: {
          email: '',
          password: '',
          password_confirmation: '',
        },


        registeRules: {
          email: [
            {required: true, message: '{{ __('shop/login.enter_email') }}', trigger: 'change'},
            {type: 'email', message: '{{ __('shop/login.email_err') }}', trigger: 'change'},
          ],
          password: [
            {required: true, message: '{{ __('shop/login.enter_password')}}', trigger: 'change'}
          ],
          password_confirmation: [
            {required: true, validator: validatePass2, trigger: 'change'}
          ]
        },
        @stack('login.vue.data')
      },

      beforeMount () {
      },

      methods: {
        checkedBtnLogin(form) {
          let _data = this.loginForm, url = '/login'

          if (form == 'registerForm') {
            _data = this.registerForm, url = '/register'
          }

          this.$refs['registerForm'].clearValidate();

          this.$refs[form].validate((valid) => {
            if (!valid) {
              layer.msg('{{ __('shop/login.check_form') }}', () => {})
              return;
            }

            $http.post(url, _data, {hmsg: true}).then((res) => {
              layer.msg(res.message)
              @if (!request('iframe'))
                location = "{{ shop_route('account.index') }}"
              @else
                var index = parent.layer.getFrameIndex(window.name); //先得到当前iframe层的索引
                setTimeout(() => {
                  parent.layer.close(index); //再执行关闭
                  parent.window.location.reload()
                }, 400);
              @endif
            }).catch((err) => {
              if (err.response.data.data && err.response.data.data.error == 'password') {
                layer.msg(err.response.data.message, ()=>{})
                return
              }

              layer.alert(err.response.data.message, {title: '{{ __('common.text_hint') }}', btn: ['{{ __('common.confirm') }}'], skin: 'login-alert'})
            })
          });
        },
        @stack('login.vue.method')
      }
    })

    @hook('account.login.form.js.after')

  </script>
@endpush
