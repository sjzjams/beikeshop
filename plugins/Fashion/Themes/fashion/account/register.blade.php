@extends('layout.master')

@section('body-class', 'page-login')

@push('header')
  <script src="{{ asset('vendor/vue/2.7/vue' . (!config('app.debug') ? '.min' : '') . '.js') }}"></script>
  <script src="{{ asset('vendor/element-ui/index.js') }}"></script>
  <link rel="stylesheet" href="{{ asset('vendor/element-ui/index.css') }}">
  <style lang="scss" scoped>
    main {
            flex-grow: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 140px 96px 84px 96px;
        }
        .sign-in-card {
            background-color: rgba(255, 255, 255);
            padding: 72px 96px 72px 96px;
            border-radius: 8px;
            width: 544px;
            max-width: 544px;
        }
        h1 {
            text-align: center;
            margin-bottom: 1.5rem;
        }
        form {
            display: flex;
            flex-direction: column;
            gap: 32px;
        }
        input {
            width: 325px;
            height: 48px;
            padding: 0.5rem;
            border: 1px solid #ccc;
            border-radius: 90px !important;
        }
        ::v-deep .finput .el-input__inner {
            width: 325px;
            height: 48px;
            padding: 0.5rem;
            border: 1px solid #ccc;
            border-radius: 90px !important;
        }
        .finput /deep/ input {
          width: 325px;
            height: 48px;
            padding: 0.5rem;
            border: 1px solid #ccc;
            border-radius: 90px !important;
        }
        .el-input /deep/ .el-input__inner {
            width: 325px;
            height: 48px;
            padding: 0.5rem;
            border: 1px solid #ccc;
            border-radius: 90px !important;
        }

        .password-container {
            position: relative;
        }
        .password-toggle {
            position: absolute;
            right: 0.5rem;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            cursor: pointer;
        }
        .forgot-password {
            text-align: right;
            font-size: 0.9rem;
            padding-top: 9px;
            margin-right: 30px;
        }
        button {
            background-color: #333;
            height: 48px;
            color: white;
            padding: 0.75rem;
            border: none;
            border-radius: 90px;
            cursor: pointer;
            width: 329px;
        }
        .create-account {
            text-align: center;
            margin-top: 1rem;
            font-size: 0.9rem;
        }
        @media (max-width: 768px) {
          .sign-in-card {
              padding: 72px 20px 72px 20px;
          }
        }
  </style>
@endpush


@section('content')

<div id="page-login" style="background-image: url('/catalog/llbj.png');" v-cloak>
    <main>
        <div class="sign-in-card">
            <h1>Join the crew!</h1>
            <el-form  ref="registerForm" :model="registerForm" :rules="registeRules" :inline-message="true">
              @hookwrapper('account.login.new.email')
              <el-form-item  prop="email">
                <el-input @keyup.enter.native="checkedBtnLogin('registerForm')" v-model="registerForm.email" placeholder="{{ __('shop/login.email_address') }}"></el-input>
              </el-form-item>
              @endhookwrapper

              @hookwrapper('account.login.new.password')
              <el-form-item  prop="password">
                <el-input @keyup.enter.native="checkedBtnLogin('registerForm')" type="password" v-model="registerForm.password" placeholder="{{ __('shop/login.password') }}"></el-input>
              </el-form-item>
              @endhookwrapper

              
                <div class="password-container">
                  @hookwrapper('account.login.new.confirm_password')
                  <el-form-item  prop="password_confirmation">
                    <el-input @keyup.enter.native="checkedBtnLogin('registerForm')" type="password" v-model="registerForm.password_confirmation" placeholder="{{ __('shop/login.confirm_password') }}"></el-input>
                  </el-form-item>
                  @endhookwrapper
                  @hook('account.login.new.confirm_password.bottom')
                    
                </div>
                
                <button type="button"@click="checkedBtnLogin('registerForm')">{{ __('shop/login.login') }}</button>
            </el-form>
            <div class="create-account">
              Already have an account? <a href="{{ shop_route('login.index') }}" style="color: rgba(53, 57, 69, 1);">Sign in</a>
            </div>
        </div>
    </main>
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
