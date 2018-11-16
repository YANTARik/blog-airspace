<template>

    <!--<div class="form-group">-->
        <!--<a class="btn btn-success" data-toggle="modal" data-target="#modal">Добавить</a>-->
    <!--</div>-->

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

                    <!--<a href="{{route('users.edit', user->id)}}" class="fa fa-pencil"></a>-->
                    <!--{{Form::open(['route'=>['users.destroy', user->id], 'method'=>'delete'])}}-->
                    <!--&lt;!&ndash;<button onclick="return confirm('are you sure?')" type="submit" class="delete">&ndash;&gt;-->
                        <!--&lt;!&ndash;<i class="fa fa-remove"></i>&ndash;&gt;-->
                    <!--&lt;!&ndash;</button>&ndash;&gt;-->
                    <!--<a href="{{route('users.destroy', user->id)}}" class="fa fa-remove"></a>-->
                    <!--{{Form::close()}}-->
                    <router-link :to="`/users/edit/${user.id}`" class="fa fa-pencil">

                    </router-link>
                    <router-link :to="`/users/destroy/${user.id}`" class="fa fa-remove">

                    </router-link>
                    <!--<button class="btn btn__danger" @click="$emit('delete-user', user)" >Delete</button>-->
                </td>
            </tr>
        </tbody>
        <tfoot></tfoot>
        <!-- Modal -->
        <!--<div id="modal" class="modal fade" tabindex="-1" role="dialog">-->
            <!--<div class="modal-dialog modal-sm">-->
                <!--<div class="modal-content">-->
                    <!--<div class="modal-body">-->
                        <!--<form class="form-horizontal" >-->
                            <!--<div class="form-group">-->
                                <!--<div class="col-sm-10">-->
                                    <!--<input type="text" class="form-control" id="lastname" placeholder="Lastname" v-model="user.lastname">-->
                                <!--</div>-->
                            <!--</div>-->
                            <!--<div class="form-group">-->
                                <!--<div class="col-sm-10">-->
                                    <!--<input type="text" class="form-control" id="name" placeholder="Name" v-model="user.name">-->
                                <!--</div>-->
                            <!--</div>-->
                            <!--<div class="form-group">-->
                                <!--<div class="col-sm-10">-->
                                    <!--<input type="text" class="form-control" id="emali" placeholder="E-mail" v-model="user.email">-->
                                <!--</div>-->
                            <!--</div>-->
                            <!--<div class="form-group">-->
                                <!--<div class="col-sm-10">-->
                                    <!--<input type="text" class="form-control" id="password" placeholder="Password" v-model="user.password">-->
                                <!--</div>-->
                            <!--</div>-->
                            <!--<button type="submit" class="btn btn-primary">OK</button>-->
                            <!--&lt;!&ndash;<button type="button" class="btn btn-default" data-dismiss="modal" v-on="click: editCancel($index)">Отмена</button>&ndash;&gt;-->
                        <!--</form>-->
                    <!--</div>-->
                <!--</div>-->
            <!--</div>-->
        <!--</div>-->
    </table>
</template>
<script>
    import axios from 'axios';
    export default {
        data() {
            return {
                users: [],
            };
        },
        created() {
            this.error = this.users = null;
            axios
                .get('/api/admin/users')
                .then(response => {
                    this.users = response.data.users;
                })


        },
        methods: {
//            createUser(){
//                axios
//                    .post('/api/admin/users/',this.user).then(responce => {
//                        this.user.push(responce.data.user);
//                        this.user={name:'', lastname:'', email:'', password:''};
//                        if (this.errors)
//                        {
//                            this.errors=[];
//                        }
//                        console.log(response.data)
//                    }, response => {
//                        this.errors = response.data.errors;
//                    });
//            },

            deleteUser(user){
                axios
                    .delete('/api/admin/users/' + user.id).then(responce => {
                        let index = this.users.indexOf(user);
                        this.users.splice(index, 1);
                        console.log(response.data);
                    });
            }

        }
    }
</script>