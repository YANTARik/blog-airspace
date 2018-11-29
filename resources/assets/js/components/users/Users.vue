<template>
    <div>
        <div>
            <div class="card-tools">
                <button class="btn btn-success" @click="newModal">Add New <i class="btn btn-outline-info"></i></button>
            </div>
        </div>
        <div class="row"></div>
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

                    <a href="#" @click="editModal(user)">
                        <i class="fa fa-edit blue"></i>
                    </a>
                    /
                    <a href="#" @click="deleteUser(user.id)">
                        <i class="fa fa-trash red"></i>
                    </a>
                </td>
            </tr>

            </tbody>
            <tfoot></tfoot>
        </table>
        <div class="modal fade" id="addNew" tabindex="-1" role="dialog" aria-labelledby="addNewLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" v-show="!editmode" id="addNewLabel">Add New</h5>
                        <h5 class="modal-title" v-show="editmode" id="addNewLabel">Update User's Info to  {{this.form.name}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form @submit.prevent="editmode ? updateUser() : createUser()">
                        <div class="modal-body">
                            <div class="form-group">

                                <label class="control-label text-center">Profile Photo</label>

                                <div class="text-center" v-model="form.avatar">
                                    <output id="list" class="img-thumbnail"></output>
                                    <input @change="selectFile"
                                           type="file" name="avatar" class="form-input"
                                           v-validate="'image'">
                                    <i v-show="errors.has('avatar')" class="fa fa-warning"></i>
                                    <span v-show="errors.has('avatar')" class="help is-danger">{{ errors.first('avatar') }}</span>
                                </div>
                                <div class='row'>
                                    <div class='col-lg-8 col-lg-offset-2'>
                                        <hr>
                                    </div>
                                </div>

                            </div>
                            <div class="form-group">
                                <input v-model="form.lastname" type="text" name="lastname"
                                       placeholder="Lastname"
                                       class="form-control" v-validate="'required|alpha|min:3|max:255'" :class="{'input': true, 'is-danger': errors.has('lastname') }">
                                <i v-show="errors.has('lastname')" class="fa fa-warning"></i>
                                <span v-show="errors.has('lastname')" class="help is-danger">{{ errors.first('lastname') }}</span>
                            </div>
                            <div class="form-group">
                                <input v-model="form.name" type="text" name="name"
                                       placeholder="Name"
                                       class="form-control" v-validate="'required|alpha|min:3|max:255'" :class="{'input': true, 'is-danger': errors.has('name') }">

                                <i v-show="errors.has('name')" class="fa fa-warning"></i>
                                <span v-show="errors.has('name')" class="help is-danger">{{ errors.first('name') }}</span>

                            </div>

                            <div class="form-group">
                                <input v-model="form.email" type="email" name="email"
                                       placeholder="Email Address"
                                       class="form-control" v-validate="'required|url|min:3|max:255'" :class="{'input': true, 'is-danger': errors.has('email') }">
                                <i v-show="errors.has('email')" class="fa fa-warning"></i>
                                <span v-show="errors.has('email')" class="help is-danger">{{ errors.first('email') }}</span>


                            </div>



                            <div class="form-group">
                                <input v-model="form.password" type="password" autocomplete="current-password" name="password" id="password"
                                       class="form-control" v-validate="'required|min:3|max:255'" :class="{'input': true, 'is-danger': errors.has('password') }">
                                <i v-show="errors.has('password')" class="fa fa-warning"></i>
                                <span v-show="errors.has('password')" class="help is-danger">{{ errors.first('password') }}</span>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <button v-show="editmode" type="submit" class="btn btn-success">Update</button>
                            <button v-show="!editmode" type="submit" class="btn btn-primary">Create</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</template>


<script>


    import axios from 'axios';
    import objectToFormData from 'object-to-formdata';
    export default {
        data() {

            return {
                users: [],
                editmode: false,
                hasError: true,
                hasUpdated: true,
                hasDeleted: true,
                showModal: false,
                selectedFile: null,
                form: new Form ({
                    id: '',
                    lastname: '',
                    name: '',
                    email: '',
                    avatar: null,
                    password: ''
                }),
            }
        },

        created() {
            this.error = this.users = null;
            this.fetchUsers();
        },

        methods: {

            fetchUsers: function () {
                axios
                    .get('/api/users')
                    .then(response => {
                        this.users = response.data.users;
                    })
                    .catch(error => {
                        console.log(error)
                    });
            },

            deleteUser(id) {

                swal({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {

                    // Send request to the server
                    if (result.value) {
                        this.form.delete('/api/users/' + id)
                            .then(()=>{
                                swal(
                                    'Deleted!',
                                    'Your file has been deleted.',
                                    'success'
                                )
                                this.fetchUsers();
                            //
                        }).catch(()=> {
                            swal("Failed!", "There was something wronge.", "warning");
                        });
                    }
                })
            },

            updateUser(){
                this.$Progress.start();
                this.validateBeforeSubmit();
                let df = new FormData();
                df.append('avatar', this.selectedFile);
                df.append('lastname', this.form.lastname);
                df.append('name', this.form.name);
                df.append('email', this.form.email);
                df.append('password', this.form.password);
                console.log(this.form);

                axios
                    .post('/api/users/' + this.form.id, df, {
                        headers: {
                            'Content-Type': 'multipart/form-data'
                        }
                    })
                    .then(() => {
                        $('#addNew').modal('hide');
                        swal(
                            'Updated!',
                            'Information has been updated.',
                            'success',
                        )
                        this.$Progress.finish();
                        this.fetchUsers();
                    })
                    .catch(() => {
                        this.$Progress.fail();
                    });
            },

            editModal(user){
                this.editmode = true;
                this.form.reset();
                $('#addNew').modal('show');
                this.form.fill(user);
            },

            newModal(){
                this.editmode = false;
                this.form.reset();
                $('#addNew').modal('show');
            },

            selectFile (event) {
                this.selectedFile = event.target.files[0];
                let avatar = event.target.files[0];
                let reader = new FileReader();

                let limit = 1024 * 1024 * 2;
                if(avatar['size'] > limit){
                    swal({
                        type: 'error',
                        title: 'Oops...',
                        text: 'You are uploading a large file',
                    })
                    return false;
                }
                reader.onload = (function(avatar) {
                    return function(event) {
                        let span = document.createElement('span');
                        span.innerHTML = ['<img class="thumb" src="', event.target.result,
                            '" title="', escape(avatar.name), '"/>'].join('');
                        document.getElementById('list').insertBefore(span, null);
                    };
                })(avatar);

                reader.readAsDataURL(avatar);
            },

            createUser(){
                this.$Progress.start();
                this.validateBeforeSubmit();
                let fd = new FormData();
                fd.append('avatar', this.selectedFile);
                fd.append('name', this.form.name);
                fd.append('lastname', this.form.lastname);
                fd.append('email', this.form.email);
                fd.append('password', this.form.password);

                axios
                    .post('/api/users', fd, {
                        headers: {
                            'Content-Type': 'multipart/form-data'
                        }
                    })
                    .then(() => {
                        $('#addNew').modal('hide')
                        toast({
                            type: 'success',
                            title: 'User Created in successfully'

                        })
                        this.$Progress.finish();
                        this.fetchUsers();
                    })
                    .catch(() => {
                        this.$Progress.fail();
                    })
            },

            validateBeforeSubmit() {
                this.$validator.validateAll().then((result) => {
                    if (result) {
                        return;
                    }
                });
            }

        }
    }
</script>