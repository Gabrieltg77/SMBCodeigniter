
  
  <router-view/>
    <div id="app">
    <nav>
    <div class="nav-wrapper red">
       <ul class="left hide-on-med-and-down"><a class="btn-flat" @click="openRegistrationModal()">Cadastrar</a></ul>
       </div>
  </nav>
        <div class="row container">
    <div class="input-field col m12">
      <label for="search">Nome ou Email</label> <input type="search" placeholder="Buscar por nome ou email." name="search" v-model="search.text" @keyup="searchUser"/>
          </div>
      <div class="col m12 right-align">
      </button>
    </div>
    <div class="col s6">
      <label for="dataInicio" >Data de Nascimento Inicial:</label>
  <input type="date" id="dataInicio" v-model="search.inicio" />
    </div>
    <div class="col s6">
  <label for="dataFim">Data de Nascimento Final:</label>
  <input type="date" id="dataFim" v-model="search.fim" />
</div>
<div class="col m12">
  <button @click="buscarDados" class="waves-effect waves-light btn  col m12 red">Buscar por data</button>
  </div>
    <table>
        <thead>
          <tr>
              <th>Nome</th>
              <th>Email</th>
              <th>Número de telefone</th>
              <th>Data de Nascimento</th>
              <th>Editar</th>
              <th>Excluir</th>
          </tr>
        </thead>

        <tbody v-for="(usuario, index) in usuarios" :key="index">
          <tr>
            <td> {{ usuario.name }}</td>
            <td> {{ usuario.email }}</td>
            <td>{{ usuario.phoneNumber }}</td>
            <td>{{ new Date(usuario.birthDate).getDate() }}/{{
          new Date(usuario.birthDate).getMonth() + 1
        }}/{{ new Date(usuario.birthDate).getFullYear()
        }}</td>
            <td><a class="btn-flat" @click="selectUser(usuario)"><i class="small material-icons">create</i></a></td>
            <td><button @click="deletarDados(usuario)" class="btn-flat"><i class="small material-icons">delete_forever</i></button></td>
          </tr>
        </tbody>
      </table>


      <?php include 'modal.php';  header('Access-Control-Allow-Origin: *');?>
  </div>