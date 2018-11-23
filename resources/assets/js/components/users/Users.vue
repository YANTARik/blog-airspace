<template>
    <div>
        <div>
            <form action="#" >
                <div>
                   <div class="form-group col-md-6">
                        <label for="name">Name:</label>
                        <input v-model="newUser.name"
                               v-validate="'required|alpha'"
                               :class="{'input': true, 'is-danger': errors.has('name') }"
                               type="text" id="name" name="name" class="form-control">
                        <i v-show="errors.has('name')" class="fa fa-warning"></i>
                        <span v-show="errors.has('name')" class="help is-danger">{{ errors.first('name') }}</span>
                   </div>

                    <div class="form-group col-md-6">
                        <label for="lastname">Lastname:</label>
                        <input v-model="newUser.lastname"
                               v-validate="'required|alpha'"
                               :class="{'input': true, 'is-danger': errors.has('name') }"
                               type="text" id="lastname" name="lastname" class="form-control">
                        <i v-show="errors.has('lastname')" class="fa fa-warning"></i>
                        <span v-show="errors.has('lastname')" class="help is-danger">{{ errors.first('lastname') }}</span>
                    </div>
                </div>
                <div>
                    <div class="form-group col-md-6">
                        <label for="email">Email:</label>
                        <input v-model="newUser.email" type="text" id="email" name="email" class="form-control"
                               v-validate="'required|email'"
                               :class="{'input': true, 'is-danger': errors.has('email') }">
                        <i v-show="errors.has('email')" class="fa fa-warning"></i>
                        <span v-show="errors.has('email')" class="help is-danger">{{ errors.first('email') }}</span>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="avatar">Avatar:</label>
                        <div class="form-inline">
                            <!--<avatar username="newUser.name"></avatar>-->
                            <input type="file" id="avatar" name="avatar" class="form-control sr-only" style="position: relative !important;"
                                   v-on:change="onFileSelected">
                            <!--v-model="newUser.avatar">-->
                            <div class="form-group mb-2">
                                    <button @click="onUpload" class="btn btn-info mb-2">Upload</button>
                            </div>
                        </div>
                    </div>
                </div>
                    <div class="form-group flex-center position-ref col-md-12" @click.prevent="createUser()">
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

            </form>
        </div>
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
                    <!--<div>-->
                        <!--<i v-show="errors.has('u_name')" class="fa fa-warning"></i>-->
                        <!--<span v-show="errors.has('u_name')" class="help is-danger">{{ errors.first('u_name') }}</span>-->
                    <!--</div>-->
                Email: <input type="email" class="form-control" id="u_email" name="email"
                            required email  :value="this.u_email">
                <!--avatar: <input type="file" class="form-control" id="u_avatar" name="avatar"-->
                               <!--@change="onFileSelected"-->
                               <!--:value="this.u_avatar">-->


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
                selectedFile: null,
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
                this.validateBeforeSubmit();
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
                    //event.target.reset();
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
                //console.log(event.target.files[0])
                this.selectedFile = event.target.files[0]
            },

            validateBeforeSubmit() {
                this.$validator.validateAll().then((result) => {
                    if (result) {
                        // eslint-disable-next-line
                        this.hasError = false
                        return;
                    }

                    this.hasError = true
                });
            },

            onUpload() {
                    const fd = new FormData();
                    console.log(this.selectedFile);
                    fd.append('avatar', this.selectedFile);
                    fd.append('_method', 'put');
                axios
                    .post('/uploads',
                        fd)
                        .then(response => {
                            console.log(response)
                        })
                        .catch(function(){
                            console.log(response)
                            console.log('FAILURE!!');
                        });
            }


        },

        mounted() {
            console.log('Component users is mounted ')
        }
    }
</script>