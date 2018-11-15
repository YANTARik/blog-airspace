<template>
    <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>Имяd</th>
            <th>Фамилия</th>
            <th>E-mail</th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="user in users">
            <td>{{ user.name }}</td>
            <td>{{ user.lastname }}</td>
            <td>{{ user.email }}</td>
        </tr>
        </tbody>        <tfoot></tfoot>
    </table>
</template>

<script>
    import axios from 'axios';
    export default {
        data() {
            return {
                loading: false,
                users: null, error: null,};
        },
        created() {
            this.fetchData();
        },
        methods: {
            fetchData() {
                this.error = this.users = null;
                this.loading = true;
                axios
                    .get('/api/admin/users')
                    .then(response => {
                        this.loading = false;
                        this.users = response.data;
                    }).catch(error => {
                    this.loading = false;
                    this.error = error.response.data.message || error.message;
                });
            }
        }
    }
</script>