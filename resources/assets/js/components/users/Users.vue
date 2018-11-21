<template>
    <div>
        <div>
        <!--<form action="#" v-on:submit.prevent="createUser" method="post">-->
            <div>
               <div class="form-group col-md-6">
                    <label for="name">Name:</label>
                    <input v-model="newUser.name" type="text" id="name" name="name" class="form-control">
               </div>

                <div class="form-group col-md-6">
                    <label for="lastname">Lastname:</label>
                    <input v-model="newUser.lastname" type="text" id="lastname" name="lastname" class="form-control">
                </div>
            </div>
            <div>
                <div class="form-group col-md-6">
                    <label for="email">Email:</label>
                    <input v-model="newUser.email" type="text" id="email" name="email" class="form-control">
                </div>
                <div class="form-group col-md-6">
                    <label for="avatar">Avatar:</label>
                    <input v-model="newUser.avatar" type="text" id="avatar" name="avatar" class="form-control">
                </div>
            </div>
                <div class="form-group flex-center position-ref " @click.prevent="createUser()" id="name" name="name">
                    <input type="submit" class="btn btn-outline-info" value="Create New User">
                </div>

            <div class="form-group col-md-12">
                <p class="text-center alert alert-danger"
                   v-bind:class="{ hidden: hasError }">Please fill all fields!</p>
                <!--{{ csrf_field() }}-->
                <p class="text-center alert alert-success"
                   v-bind:class="{ hidden: hasUpdated }">Updated Successfully!</p>
                <p class="text-center alert alert-success"
                   v-bind:class="{ hidden: hasDeleted }">Deleted Successfully!</p>
            </div>
        </div>
        <!--</form>-->

        <table  class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Имя</th>
                    <th>Фамилия</th>
                    <th>E-mail</th>
                    <th>Avatar</th>
                    <th>Действия</th>
                </tr>
            </thead>
            <tbody>

            <tr v-for="user in users">

                <td>{{ user.id }}</td>
                <td>{{ user.name }}</td>
                <td>{{ user.lastname }}</td>
                <td>{{ user.email }}</td>
                <td >
                    <img :src="`/uploads/${user.avatar}`" v-if="user.avatar" style="width: 75px; height: 75px;">
                </td>
                <td>
                    <a id="show-modal" @click="showModal=true; setVal(user.id, user.lastname,  user.name, user.email)"class="fa fa-pencil"></a>
                    <a class="fa fa-remove" @click.prevent="deleteUser(user)"></a>
                </td>
            </tr>

            </tbody>
            <tfoot></tfoot>
        </table>
        <modal v-if="showModal" @close="showModal=false">
            <h3 slot="header">Edit USER</h3>
            <div slot="body">

                <input type="hidden" disabled class="form-control" id="u_id" name="id"
                       required  :value="this.u_id">
                Lastname: <input type="text" class="form-control" id="u_lastname" name="lastname"
                             required  :value="this.u_lastname">
                Name: <input type="text" class="form-control" id="u_name" name="name"
                             required  :value="this.u_name">
                Email: <input type="email" class="form-control" id="u_email" name="email"
                            required  :value="this.u_email">
                avatar: <input type="file" class="form-control" id="u_avatar" name="avatar"
                               @change="onFileSelected"
                               :value="this.u_avatar">


            </div>
            <div slot="footer">
                <button class="btn btn-default" @click="showModal = false">
                    Cancel
                </button>

                <button class="btn btn-info" @click="editUser()">
                    Update
                </button>
            </div>
        </modal>
    </div>
</template>

<script>


    import axios from 'axios';
    export default {
        data() {

            return {
                users: [],
                hasError: true,
                hasUpdated: true,
                hasDeleted: true,
                showModal: false,
                u_lastname: '',
                u_name: '',
                u_id: '',
                u_email: '',
                u_avatar: '',
                newUser: { 'lastname': '','name': '','email': '','avatar': '' },

            }
        },


        created() {
            this.error = this.users = null;
            this.fetchUsers();
        },

        methods: {

            fetchUsers: function () {
                axios
                    .get('/api/admin/users')
                    .then(response => {
                        this.users = response.data.users;
                    })
                    .catch(error => {
                        console.log(error)
                    });
            },

            createUser() {
                axios
                    .post('/api/admin/users', this.newUser)
                    .then(response => {
                        this.user = response.data.user;
                        this.fetchUsers();
                        this.hasError = true
                        this.hasUpdated = false
                    })
                    .catch(error => {
                        this.hasError = false
                        console.log(error)
                    });
                    this.hasDeleted = true;
                },

            setVal(val_id, val_lastname, val_name, val_email) {
                     this.u_id = val_id;
                     this.u_lastname = val_lastname;
                     this.u_name = val_name;
                     this.u_email = val_email;
                     //this.u_avatar = val_avatar;
                 },

            editUser: function(){
                 let i_val_1 = document.getElementById('u_id');
                 let l_val_1 = document.getElementById('u_lastname');
                 let n_val_1 = document.getElementById('u_name');
                 let e_val_1 = document.getElementById('u_email');
                 //let a_val_1 = document.getElementById('u_avatar');

                 axios

                     .patch('/api/admin/users/' + i_val_1.value,
                         {
                             lastname: l_val_1.value,
                             name: n_val_1.value,
                             email: e_val_1.value
                             //val_4: a_val_1.value
                         })

                     .then(response => {
                         this.user = response.data.user;
                         this.fetchUsers();
                         this.hasUpdated = false
                         this.showModal=false
                         })
                     .catch(error => {
                         console.log(error)
                     });

                 this.hasUpdated = true;

            },
            deleteUser: function deleteUser(user) {
                //console.log(user.id);
                axios
                    .delete('/api/admin/users/' + user.id)
                    .then(response => {
                        this.fetchUsers();
                        this.hasError = true,
                        this.hasDeleted = false

                    })
                    .catch(error => {
                        console.log(error)
                    });
            },
            onFileSelected(event) {
                console.log(event)
            }

        },

        mounted() {
            console.log('Component users is mounted ')
        }
    }
</script>