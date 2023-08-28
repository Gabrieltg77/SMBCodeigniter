

var v = new Vue({
  el: '#app',
  data:{
    url:'',
    name: "",
    email: "",
    birthDate: "",
    phoneNumber: "",
    dataInicio: "",
    dataFim: "",
    usuarios: [],
    formValidate:[],
    search: {text: '', inicio: '',fim: ''},
    chooseUser:{},
  },
  methods: {
    atualizar() {
      axios
        .get('/codeigniter/index.php/user/getuser')
        .then((res) => {
          console.log(res.data.user);
          this.usuarios = res.data.user;
        })
        .catch((error) => {
          console.log(error);
        });
    },
    searchUser(){
        var formData = v.formData(v.search);
          axios.post("/codeigniter/index.php/user/searchUser", formData).then((response) => {
                    v.usuarios = response.data;
                    console.log(response.data);
        })
    },
    buscarDados() {
        var formData = v.formData(v.search);
    axios
      .post("/codeigniter/index.php/user/search_by_date", formData)
      .then((res) => {
        v.usuarios = res.data;
      })
      .catch((error) => {
        console.log(error);
      });
  },
  deletarDados(user) {
    var formData = v.formData(user);
    console.log(formData);
    axios
      .post('/codeigniter/index.php/user/deletar', formData)
      .then(() => {
        this.atualizar();
      })
      .catch((error) => {
        console.log(error);
      });
  },
  formData(obj){
    var formData = new FormData();
      for ( var key in obj ) {
          formData.append(key, obj[key]);
      } 
      return formData;
    },
  redirectToUpdatePage(usuario) {
      this.$router.push({ name: 'update', params: { usuario: usuario } });
    },
    openRegistrationModal($user) {
        const modal = document.getElementById('registrationModal');
        const instance = M.Modal.init(modal);
        instance.open();
      },
      closeRegistrationModal() {
        const modal = document.getElementById('registrationModal');
        const instance = M.Modal.init(modal);
        instance.close();
      },
      openUpdateModal() {
        const modal = document.getElementById('updateModal');
        const instance = M.Modal.init(modal);
        instance.open();
      },
      closeUpdateModal() {
        const modal = document.getElementById('updateModal');
        const instance = M.Modal.init(modal);
        instance.close();
      },
      doUpdate(){
        
        var formData = v.formData(v.chooseUser);
          axios.post("/codeigniter/index.php/user/atualizar", formData,{
            
          }).then((response)=>{
            if(response.data.error){
                v.formValidate = response.data.msg;
            }else{
                  v.formValidate = response.data.success;
            }
          }).catch((error) => {
            console.error(error);
          });
          this.closeUpdateModal();
      },
      selectUser(user){
        v.openUpdateModal();
        v.chooseUser = user;
        console.log(v.chooseUser); 
    },
      doRegister() {
        var formData = v.formData({
        name: v.name,
        phoneNumber: v.phoneNumber,
        email: v.email,
        birthDate: v.birthDate
      });
      axios.post("/codeigniter/index.php/user/save", formData);
      this.closeRegistrationModal();
    }
  },
  created() {
    this.atualizar();
  },
  
});