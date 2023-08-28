
  <div id="registrationModal" class="modal">
    <div class="modal-content">
  <div class="row container">
    <div class="input-field col s12 m6">
      <input id="Name" type="text" class="validate" v-model="name" />
      <label for="Name">Name</label>
    </div>

    <div class="input-field col s12 m6">
      <label for="phone">Telefone</label>
      <input type="tel" id="phone" class="validate" v-model="phoneNumber" v-mask="'(##) #####-####' || '(##) ####-####'"/>
    </div>
    
    <div class="input-field col s12 m6">
      <input id="email" type="email" class="validate" v-model="email" />
      <label for="email">Email</label>
    </div>
    <div class="col s12 m6">
      <label for="">Data de Nascimento</label>
      <input type="date" class="align-left"  v-model="birthDate" >
    </div>
    <div class="right-align">
    <button class="btn waves-effect waves-light red " @click="doRegister()">
      Cadastrar
      <i class="material-icons right">send</i>
    </button>
    </div>
  </div>
</div>
<div class="modal-footer">
  <a href="#!" class="modal-close waves-effect waves-green btn-flat">Fechar</a>
</div>
</div>




<div id="updateModal" class="modal">
  <div class="modal-content">
<div class="row container">
  <div class="col s6 m6">
        <label for="Name">Name</label>
    <input id="Name" class="validate" type="text" v-model="chooseUser.name" />
  </div>

  <div class="col s6 m6">
    <label for="phone">Telefone</label>
    <input type="tel" id="phone" class="validate" v-model="chooseUser.phoneNumber" v-mask="'(##) #####-####' || '(##) ####-####'"/>
  </div>
  
  <div class="col s6 m6">
        <label for="email">Email</label>
    <input type="text" class="form-control" name="email" v-model="chooseUser.email">

  </div>
  <div class="col s6 m6">
    <label for="">Data de Nascimento</label>
    <input  type="date" class="align-left" v-model="chooseUser.birthDate">
  </div>
  <div class="right-align">
  <button class="btn waves-effect waves-light red " @click="doUpdate()">
    Atualizar
    <i class="material-icons right">send</i>
  </button>
  </div>
</div>
</div>
<div class="modal-footer">
<a href="#!" class="modal-close waves-effect waves-green btn-flat">Fechar</a>
</div>
</div>