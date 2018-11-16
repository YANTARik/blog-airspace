<template>
    <div>
        <button id="show-modal" @click="userModal = true">Show Modal</button>
        <!-- use the modal component, pass in the prop -->
        <modal v-if="userModal" @close="userModal = false">
            <h3 slot="header">custom header</h3>
        </modal>
    <userModal></userModal>

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
                    <!--<router-link :to="`/users/edit/${user.id}`" class="fa fa-pencil"></router-link>-->
                    <!--<router-link :to="`/users/destroy/${user.id}`" class="fa fa-remove">-->

                    <!--</router-link>-->
                    <!--<button class="btn btn__danger" @click="$emit('delete-user', user)" >Delete</button>-->
                </td>
            </tr>
        </tbody>
        <tfoot></tfoot>
    </table>
    </div>
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


        }
    }
</script>