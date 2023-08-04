<div class="modal fade" id="auth" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Авторизация</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/auth" class="form" id="auth" method="POST">
                @csrf
                <div class="modal-body">
                        <div class="col-md-12 mb-3">
                                <input type="text" class="form-control" name="auth_login" id="auth_loginInput" placeholder="Логин">
                                <div class="invalid-feedback" id="auth_loginError">                      
                                </div>
                              </div>
              
                              <div class="col-md-12 mb-3">
                                <input type="password" class="form-control" name="auth_password" id="auth_passwordInput" placeholder="Введите пароль">
                                <div class="invalid-feedback" id="auth_passwordError">                      
                                </div>
                              </div>

                             
                              <div class="invalid-feedback" id="authError">  
                                Неверная пара логин или пароль                  
                              </div>
                      </div>
                      <div class="modal-footer">                      
                        <button type="submit" class="btn btn-primary">Авторизоваться</button>
                      </div>                      
            </form>
            <button  class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#password_reset">Восстановить пароль</button>
          </div>
        </div>
      </div>

      <div class="modal fade" id="password_reset" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Сброс пароля</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/forgot_password" class="form" id="forgot_password" method="POST">
                @csrf
                <div class="modal-body">
                        <div class="col-md-12 mb-3">
                                <input type="text" class="form-control" name="email_password" id="email_passwordInput" placeholder="Электронная почта">
                                <div class="invalid-feedback" id="email_passwordError">                      
                                </div>
                                <div class="valid-feedback"  id="email_passwordSuccess">
                                       Письмо было отправленно по указанному адресу электронной почты!
                                      </div>
                                      <div class="invalid-feedback" id="forgotError">  
                                        Пользователя с такой почтой не существует!!                 
                                      </div>
                              </div>   
                        </div>   
                        <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Восстановить</button>
                      </div>       
                            
                      
               
            </form>
           
          </div>
        </div>
      </div>

      <div class="modal fade" id="reg" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Регистрация</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/reg" class="form" id="reg" method="POST">
                @csrf
                <div class="modal-body">
                        <div class="col-md-12 mb-3">
                                <input type="text" class="form-control" name="login" id="loginInput" placeholder="Имя">
                                <div class="invalid-feedback" id="loginError">                      
                                </div>
                              </div>

                              <div class="col-md-12 mb-3">
                                <input type="text" class="form-control" name="email" id="emailInput" placeholder="Электронная почта">
                                <div class="invalid-feedback" id="emailError">                      
                                </div>
                              </div>

                              <div class="col-md-12 mb-3">
                                <input type="password" class="form-control" name="password" id="passwordInput" placeholder="Введите пароль">
                                <div class="invalid-feedback" id="passwordError">                      
                                </div>
                              </div>
            
                              <div class="col-md-12 mb-3">
                                <input type="password" class="form-control" name="password_repeat" id="password_repeatInput" placeholder="Повторите пароль">
                                <div class="invalid-feedback" id="password_repeatError">                      
                                </div>
                              </div>

                      </div>
                      <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Зарегистрироваться</button>
                      </div>
            </form>
            
          </div>
        </div>
      </div>