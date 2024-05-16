
const api = "http://localhost/APIS-Webservices/API_users/apiv1";

const app = Vue.createApp({
    data() {
        return {
            message: 'USERS PHP + VUE',
            modalCreate: false,
            users:[]
        }
    },
    mounted(){
        this.getUsers()
    },
    methods: {
        getUsers() {
            axios.get(api + '?option=list')
            .then(response => {
                //console.log(response.data.users);
                app.users = response.data.users;
            })
        },
        insertUser() {
            let fd = new FormData();
            fd.append('name', document.getElementById('name').value);
            fd.append('email', document.getElementById('email').value);
            fd.append('image', document.getElementById('image').files[0]);

            axios.post(api + '?option=create', fd)
            .then(response => {
                console.log(response.data);
                app.getUsers();
            })
        }
    }
}).mount("#app");