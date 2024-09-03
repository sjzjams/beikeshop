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
            <h1>Sign in</h1>
            <el-form  ref="loginForm" :model="loginForm" :rules="loginRules" :inline-message="true">
                @hookwrapper('account.login.email')
                <el-form-item  prop="email">
                  <el-input @keyup.enter.native="checkedBtnLogin('loginForm')" v-model="loginForm.email" placeholder="{{ __('shop/login.email_address') }}" class="finput"></el-input>
                </el-form-item>
                @endhookwrapper
                <div class="password-container">
                    @hookwrapper('account.login.password')
                    <el-form-item  prop="password">
                      <el-input @keyup.enter.native="checkedBtnLogin('loginForm')" type="password" v-model="loginForm.password" placeholder="{{ __('shop/login.password') }}" class="finput"></el-input>
                    </el-form-item>
                    @endhookwrapper
                    <div class="forgot-password">
                        <a href="{{ shop_route('forgotten.index') }}" style="color: rgba(119, 126, 144, 1);">Forgot your password?</a>
                    </div>
                </div>
                
                <button type="button" @click="checkedBtnLogin('loginForm')">{{ __('shop/login.login') }}</button>
            </el-form>
            <div class="create-account">
                Don't have an account? <a href="{{ shop_route('register.index') }}" style="color: rgba(53, 57, 69, 1);text-decoration:underline;">Create one here</a>
            </div>
        </div>
    </main>
</div>
@endsection

@push('add-scripts')
  <script>
    var validatePass = (rule, value, callback) => {
      if (value === '') {
        callback(new Error('{{ __('shop/login.enter_password') }}'));
      } else {
        if (value !== '') {
          app.$refs.registerForm.validateField('password_confirmation');
        }
        callback();
      }
    };



    let app = new Vue({
      el: '#page-login',

      data: {
        loginForm: {
          email: '',
          password: '',
        },


        loginRules: {
          email: [
            {required: true, message: '{{ __('shop/login.enter_email') }}', trigger: 'change'},
            {type: 'email', message: '{{ __('shop/login.email_err') }}', trigger: 'change'},
          ],
          password: [
            {required: true, message: '{{ __('shop/login.enter_password')}}', trigger: 'change'}
          ]
        },

        @stack('login.vue.data')
      },

      beforeMount () {
      },

      methods: {
        checkedBtnLogin(form) {
          let _data = this.loginForm, url = '/login'


          this.$refs['loginForm'].clearValidate();

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
