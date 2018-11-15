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