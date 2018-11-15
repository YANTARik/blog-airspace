import axios from 'axios'
export function get( ) {
    fetchData() {
        this.error = this.users = null;
        this.loading = true;
        axios
            .get('/api/admin/users')
            .then(response => {
            this.loading = false;
            console.log('hello')
        this.users = response.data;
            }).catch(error => {
                    this.loading = false;
                this.error = error.response.data.message || error.message;
            });
    }
}

